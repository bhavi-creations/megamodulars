<?php
session_start();

// Include Mail Integration Script
require_once __DIR__ . '/send-mailer.php';

$admin_email = 'reach.mmi26@gmail.com'; // Admin Email ID

$message_status = "";
$show_success_modal = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_SESSION['quotation_submitted'])) {
    $show_success_modal = true;
    unset($_SESSION['quotation_submitted']);
}

// Form Submission Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_string($_POST['full_name'] ?? null) || trim($_POST['full_name']) === '' ||
        !is_string($_POST['phone'] ?? null) || trim($_POST['phone']) === '' ||
        !is_string($_POST['email'] ?? null) || !filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $message_status = "<div class='alert alert-danger' role='alert'>Please enter your name, phone number and a valid email address.</div>";
    } else {
    // Sanitize input values
    $full_name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $layout = trim($_POST['selected_layout']);
        $surface = trim($_POST['selected_surface']);
        $core = trim($_POST['selected_core']);
        $unit_type = trim($_POST['selected_unit']);
        $notes = trim($_POST['notes']);
        $dynamic_data_json = $_POST['dynamic_items_json']; // Valid JSON string

        $applied_sft_rate = floatval($_POST['applied_sft_rate']);
        $applied_cft_rate = floatval($_POST['applied_cft_rate']);

        $total_panel_cft = floatval($_POST['total_panel_cft']);
        $total_frame_sft = floatval($_POST['total_frame_sft']);
        $total_panel_cost = floatval($_POST['total_panel_cost']);
        $total_frame_cost = floatval($_POST['total_frame_cost']);
        $grand_total_amount = floatval($_POST['grand_total_amount']);

    // Build dynamic items table for email
            $decoded_items = json_decode($dynamic_data_json, true);
            $items_html = "";
            $escape_item = static function ($value) {
                return htmlspecialchars(is_scalar($value) ? (string) $value : '', ENT_QUOTES, 'UTF-8');
            };

            if (!empty($decoded_items['panels'])) {
                $items_html .= "<tr><th colspan='4' style='background:#e9ecef;'>Panels Detailed Breakdown</th></tr>";
                foreach ($decoded_items['panels'] as $idx => $p) {
                    $num = $idx + 1;
                    $p = array_map($escape_item, $p);
                    $items_html .= "<tr><td>Panel #{$num}</td><td>L: {$p['length']} | W: {$p['width']} | H: {$p['height']}</td><td colspan='2'>{$p['cft']}</td></tr>";
                    $remark = $p['remark'] ?? '';
                    $item_surface = $p['surface'] ?? '';
                    $item_core = $p['core'] ?? '';
                    $item_rate = $p['rate'] ?? '';
                    $items_html .= "<tr><td colspan='4'><strong>Remark:</strong> {$remark}<br><strong>Surface Finish:</strong> {$item_surface} | <strong>Core Material:</strong> {$item_core}<br><strong>Rate per CFT:</strong> {$item_rate}</td></tr>";
                }
            }

            if (!empty($decoded_items['frames'])) {
                $items_html .= "<tr><th colspan='4' style='background:#e9ecef;'>Frames Detailed Breakdown</th></tr>";
                foreach ($decoded_items['frames'] as $idx => $f) {
                    $num = $idx + 1;
                    $f = array_map($escape_item, $f);
                    $items_html .= "<tr><td>Frame #{$num}</td><td>L: {$f['length']} | B: {$f['breadth']}</td><td colspan='2'>{$f['sft']}</td></tr>";
                    $remark = $f['remark'] ?? '';
                    $item_surface = $f['surface'] ?? '';
                    $item_core = $f['core'] ?? '';
                    $item_rate = $f['rate'] ?? '';
                    $items_html .= "<tr><td colspan='4'><strong>Remark:</strong> {$remark}<br><strong>Surface Finish:</strong> {$item_surface} | <strong>Core Material:</strong> {$item_core}<br><strong>Rate per SFT:</strong> {$item_rate}</td></tr>";
                }
            }

            // Construct Email Body HTML
            $safe_name = htmlspecialchars($full_name);
            $safe_email = htmlspecialchars($email);
            $safe_phone = htmlspecialchars($phone);
            $safe_layout = htmlspecialchars($layout);
            $safe_surface = htmlspecialchars($surface);
            $safe_core = htmlspecialchars($core);
            $safe_notes = nl2br(htmlspecialchars($notes));

            $email_body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; }
                    .container { width: 100%; max-width: 650px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
                    .header { background: #8b4513; color: #fff; padding: 15px; text-align: center; border-radius: 6px 6px 0 0; }
                    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                    table, th, td { border: 1px solid #ccc; }
                    th, td { padding: 9px; text-align: left; font-size: 14px; }
                    th { background: #f4f4f4; }
                    .total-box { background: #fdf8f5; font-weight: bold; padding: 12px; margin-top: 15px; border: 1px solid #8b4513; text-align: right; font-size: 16px; color: #8b4513; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2 style='margin:0;'>Quotation Confirmation - Mega Modulars</h2>
                    </div>
                    <!-- CLIENT_ONLY_START -->
                    <p>Dear <strong>{$safe_name}</strong>,</p>
                    <p>Your appointment request has been submitted successfully. Our team will contact you to confirm the appointment date and time. Here are your quotation selection details:</p>
                    <!-- CLIENT_ONLY_END -->
                    
                    <table>
                        <tr><th>Customer Name</th><td>{$safe_name}</td></tr>
                        <tr><th>Email</th><td>{$safe_email}</td></tr>
                        <tr><th>Phone</th><td>{$safe_phone}</td></tr>
                        <tr><th>Selected Layout</th><td>{$safe_layout}</td></tr>
                        <tr><th>Materials &amp; Rates</th><td>See the selection and rate for each panel and frame below.</td></tr>
                    </table>

                    <h4>Calculated Area & Cost Breakdown</h4>
                    <table>
                        <tr>
                            <th>Item Type</th>
                            <th>Total Volume / Dimension</th>
                            <th colspan='2'>Calculated Amount</th>
                        </tr>
                        <tr>
                            <td>Panels (Cubic)</td>
                            <td>{$total_panel_cft} CFT</td>
                            <td colspan='2'>₹ " . number_format($total_panel_cost, 2) . "</td>
                        </tr>
                        <tr>
                            <td>Frames (Square)</td>
                            <td>{$total_frame_sft} SFT</td>
                            <td colspan='2'>₹ " . number_format($total_frame_cost, 2) . "</td>
                        </tr>
                        {$items_html}
                    </table>

                    <div class='total-box'>
                        Grand Total Estimated Amount: ₹ " . number_format($grand_total_amount, 2) . "
                    </div>

                    <!-- CLIENT_ONLY_START -->
                    <p style='margin-top: 15px;'><strong>MEASSAGE :</strong><br>{$safe_notes}</p>
                    <p>We will review your detailed measurements and get back to you shortly.</p>

                    <p style='margin-top: 15px;'><strong> Terms & Conditions:</strong></p>
                    
            <p>1. Above quotation is given for approximate measurements </p>
            <p>2. Measurements may vary according to customer requirement</p>
            <p>3. 50% payment for order confirmation.</p>
            <p>4. 30% Patment after material reached at site</p>
<p>5. 10% Finnishing time</p>
<p>6. 10% Final payment</p>





             <p style='margin-top: 15px;'><strong> NOTE: </strong></p>
            <p>Any additions/alteration will be charged extra GST 18% Extra tax applicable Power and water should be supply by the customer Kitchen baskets not incuded</p>
        


<p style='margin-top: 15px;'><strong> Transport extra </strong></p>
<p>Materials unloding charges extra 1st, 2nd, 3rd…..., floors</p>


            <p>Transport extra</p>
                    <!-- CLIENT_ONLY_END -->
                </div>
            </body>
            </html>";

            // Send the quotation to both the client and the configured mail recipient.
            $admin_email_body = preg_replace('/<!-- CLIENT_ONLY_START -->.*?<!-- CLIENT_ONLY_END -->/s', '', $email_body);
            $clientMail = dispatchQuotationMail($email, $full_name, "Appointment Request Confirmation - Mega Modulars", $email_body);
            $adminMail  = dispatchQuotationMail($admin_email, "Admin", "New Quotation Received - " . $full_name, $admin_email_body);

            if ($clientMail && $adminMail) {
                $show_success_modal = true;
                $_SESSION['quotation_submitted'] = true;
                $message_status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Quotation details sent by email.
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                </div>";
            } else {
                $message_status = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Email failed!</strong> One or both emails could not be sent. Please check SMTP settings.
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                </div>";
            }
    }
}

// Redirect after a successful POST so browser refresh cannot submit the form again.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $show_success_modal) {
    header('Location: testing.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Layout & Quotation Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .selectable-card {
            cursor: pointer;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
        }

        .selectable-card:hover {
            border-color: #8b4513;
        }

        .selectable-card.active {
            border-color: #8b4513;
            background-color: #fdf8f5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .badge-step {
            background: #8b4513;
            color: #fff;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-right: 6px;
        }

        .dynamic-box {
            border: 1px dashed #bbb;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 12px;
            background: #fafafa;
            position: relative;
        }
    </style>
</head>

<body class="bg-light py-4">

    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 920px;">
        <?= $message_status ?>

        <form id="quotationForm" method="POST" action="testing.php" onsubmit="prepareJSON()">
            <!-- Hidden Inputs for Form State -->
            <input type="hidden" name="selected_layout" id="input_layout" value="Kitchen">
            <input type="hidden" name="selected_surface" id="input_surface" value="Laminate">
            <input type="hidden" name="selected_core" id="input_core" value="Plywood">
            <input type="hidden" name="selected_unit" id="input_unit" value="SFT">
            <input type="hidden" name="dynamic_items_json" id="input_dynamic_json">

            <!-- Rates and Calculated Amounts -->
            <input type="hidden" name="applied_sft_rate" id="hid_sft_rate" value="0">
            <input type="hidden" name="applied_cft_rate" id="hid_cft_rate" value="0">
            <input type="hidden" name="total_panel_cft" id="hid_total_panel_cft" value="0">
            <input type="hidden" name="total_frame_sft" id="hid_total_frame_sft" value="0">
            <input type="hidden" name="total_panel_cost" id="hid_total_panel_cost" value="0">
            <input type="hidden" name="total_frame_cost" id="hid_total_frame_cost" value="0">
            <input type="hidden" name="grand_total_amount" id="hid_grand_total_amount" value="0">

            <!-- 1. CHOOSE LAYOUT -->
            <div class="mb-4">
                <h5 class="fw-bold d-flex align-items-center"><span class="badge-step">1</span> CHOOSE LAYOUT</h5>
                <div class="row row-cols-2 row-cols-md-6 g-2 mt-1">
                    <?php
                    $layouts = ['Kitchen', 'Wardrobe', 'TV Point', 'Krokary', 'Paneling', 'Extra Items'];
                    foreach ($layouts as $idx => $item):
                    ?>
                        <div class="col">
                            <div class="selectable-card p-3 text-center layout-card <?= $idx === 0 ? 'active' : '' ?>" onclick="selectLayout('<?= $item ?>', this)">
                                <div class="fw-semibold small"><?= $item ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Dynamic Inputs Section based on Layout -->
            <div class="mb-4 border p-3 rounded bg-body">
                <h6 class="fw-bold border-bottom pb-2">DIMENSION DETAILS (<span id="activeLayoutTitle" class="text-primary">Kitchen</span>)</h6>

                <div id="extraItemTitleContainer" class="mb-3 d-none">
                    <label class="form-label fw-semibold">Custom Item Name:</label>
                    <input type="text" id="extra_item_name" class="form-control" placeholder="e.g. Shoe Rack, Study Table">
                </div>

                <!-- Panel Container -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-secondary">Panels (Cubic Area Calculation)</span>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPanel()">+ Add Panel</button>
                    </div>
                    <div id="panelContainer"></div>
                </div>

                <!-- Frame Container -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-secondary">Frames (Square Area Calculation)</span>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addFrame()">+ Add Frame</button>
                    </div>
                    <div id="frameContainer"></div>
                </div>
            </div>

            <!-- SUMMARY PANEL -->
            <div class="bg-light p-3 rounded mb-4 border d-none">
                <h6 class="fw-bold text-uppercase border-bottom pb-2">Selected Summary</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div><strong>Selected Layout:</strong> <span id="sum_layout" class="text-primary fw-bold">Kitchen</span></div>
                        <div><strong>Surface Finish:</strong> <span id="sum_surface">Laminate</span></div>
                        <div><strong>Core Material:</strong> <span id="sum_core">Plywood</span></div>
                        <div class="text-muted small mt-1">Applied SFT Rate: ₹ <span id="sum_rate_sft">0</span> | CFT Rate: ₹ <span id="sum_rate_cft">0</span></div>
                    </div>
                    <div class="col-md-6 border-start-md">
                        <div><strong>Panel Cubic Vol:</strong> <span id="sum_panel_area">0.00</span> CFT</div>
                        <div class="text-muted small">Panel Cost: ₹ <span id="sum_panel_cost">0.00</span></div>

                        <div class="mt-2"><strong>Frame Area Vol:</strong> <span id="sum_frame_area">0.00</span> SFT</div>
                        <div class="text-muted small">Frame Cost: ₹ <span id="sum_frame_cost">0.00</span></div>

                        <hr class="my-2">
                        <div class="fw-bold text-success fs-5">Estimated Total: ₹ <span id="sum_grand_total">0.00</span></div>
                    </div>
                </div>
            </div>

            <!-- FORM SUBMISSION -->
            <div class="border p-3 rounded">
                <h6 class="fw-bold mb-3">Request Official Quotation</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="full_name" id="form_full_name" class="form-control" required placeholder="Enter full name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="form_email" class="form-control" required placeholder="Enter email address">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" name="phone" id="form_phone" class="form-control" required placeholder="Enter phone number">
                    </div>
                    <div class="col-md-6 d-none">
                        <label class="form-label">Total Estimated Summary</label>
                        <input type="text" id="total_area_display" class="form-control bg-light" readonly placeholder="Auto Calculated">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Additional Requirements / Notes</label>
                        <textarea name="notes" id="form_notes" class="form-control" rows="2" placeholder="Mention special requirements or preferences..."></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" name="submit_quotation" class="btn btn-success px-4">Submit Request</button>
                    </div>
                </div>
            </div>

            <!-- POPUP REVIEW MODAL -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title">Quotation Request Submitted</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-success">Your appointment request was submitted and your quotation details were emailed successfully. Our team will contact you to confirm the appointment date and time.</div>
                            <div class="row g-3 d-none">
                                <div class="col-md-6">
                                    <h6><strong>Customer Details:</strong></h6>
                                    <p class="mb-1"><strong>Name:</strong> <span id="pop_name"></span></p>
                                    <p class="mb-1"><strong>Email:</strong> <span id="pop_email"></span></p>
                                    <p class="mb-1"><strong>Phone:</strong> <span id="pop_phone"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <h6><strong>Selected Material Options:</strong></h6>
                                    <p class="mb-1"><strong>Layout:</strong> <span id="pop_layout"></span></p>
                                    <p class="mb-1"><strong>Surface Finish:</strong> <span id="pop_surface"></span></p>
                                    <p class="mb-1"><strong>Core Material:</strong> <span id="pop_core"></span></p>
                                    <p class="mb-1 text-muted small"><strong>Applied Rates:</strong> SFT: ₹<span id="pop_sft_rate"></span> | CFT: ₹<span id="pop_cft_rate"></span></p>
                                </div>
                            </div>
                            <hr class="d-none">
                            <h6 class="d-none"><strong>Calculated Measurements & Pricing Breakdown:</strong></h6>
                            <table class="table table-bordered table-sm text-center d-none">
                                <thead class="table-light">
                                    <tr>
                                        <th>Category</th>
                                        <th>Total Volume / Area</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Panels (CFT)</td>
                                        <td><span id="pop_cft"></span> CFT</td>
                                        <td>₹ <span id="pop_cft_cost"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Frames (SFT)</td>
                                        <td><span id="pop_sft"></span> SFT</td>
                                        <td>₹ <span id="pop_sft_cost"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="alert alert-info text-end fw-bold mb-0 d-none">
                                Grand Total Amount: ₹ <span id="pop_grand_total"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Pricing Matrix Configuration
        const PRICE_MATRIX = {
            "Plywood": {
                "Laminate": {
                    sft: 750,
                    cft: 1200
                },
                "Acrylic": {
                    sft: 850,
                    cft: 1500
                },
                "PVC": {
                    sft: 700,
                    cft: 1300
                },
                "PU": {
                    sft: 850,
                    cft: 1500
                },
                "Aluminium": {
                    sft: 900,
                    cft: 1600
                }
            },
            "HDHMR": {
                "Laminate": {
                    sft: 700,
                    cft: 1100
                },
                "Acrylic": {
                    sft: 800,
                    cft: 1400
                },
                "PVC": {
                    sft: 650,
                    cft: 1200
                },
                "PU": {
                    sft: 850,
                    cft: 1700
                },
                "Aluminium": {
                    sft: 880,
                    cft: 1650
                }
            },
            "MDF": {
                "Laminate": {
                    sft: 650,
                    cft: 1000
                },
                "Acrylic": {
                    sft: 750,
                    cft: 1300
                },
                "PVC": {
                    sft: 600,
                    cft: 1100
                },
                "PU": {
                    sft: 800,
                    cft: 1600
                },
                "Aluminium": {
                    sft: 820,
                    cft: 1500
                }
            },
            "Real Wood": {
                "Laminate": {
                    sft: 850,
                    cft: 1400
                },
                "Acrylic": {
                    sft: 950,
                    cft: 1700
                },
                "PVC": {
                    sft: 800,
                    cft: 1500
                },
                "PU": {
                    sft: 1000,
                    cft: 2000
                },
                "Aluminium": {
                    sft: 1050,
                    cft: 2100
                }
            }
        };







        let panelCount = 0;
        let frameCount = 0;

        function getRates(box = null) {
            let selectedCore = box ? box.querySelector('.item-core').value : 'Plywood';
            let selectedSurface = box ? box.querySelector('.item-surface').value : 'Laminate';

            if (PRICE_MATRIX[selectedCore] && PRICE_MATRIX[selectedCore][selectedSurface]) {
                return PRICE_MATRIX[selectedCore][selectedSurface];
            }
            return {
                sft: 700,
                cft: 1200
            };
        }

        function selectOption(inputId, val, elem, className) {
            document.getElementById(inputId).value = val;
            document.querySelectorAll('.' + className).forEach(el => el.classList.remove('active'));
            elem.classList.add('active');

            if (className === 'surface-card') {
                document.getElementById('sum_surface').innerText = val;
            } else if (className === 'core-card') {
                document.getElementById('sum_core').innerText = val;
            }
            calculateAreas();
        }

        function selectLayout(layout, elem) {
            selectOption('input_layout', layout, elem, 'layout-card');
            document.getElementById('sum_layout').innerText = layout;
            document.getElementById('activeLayoutTitle').innerText = layout;

            if (layout === 'Extra Items') {
                document.getElementById('extraItemTitleContainer').classList.remove('d-none');
            } else {
                document.getElementById('extraItemTitleContainer').classList.add('d-none');
            }
        }

        function itemMaterials(id) {
            return `<div class="row g-2 mt-2">
                <div class="col-md-6">
                    <label for="${id}_surface" class="form-label fw-semibold small">CHOOSE SURFACE FINISH</label>
                    <select id="${id}_surface" class="form-select form-select-sm item-surface" onchange="calculateAreas()">
                        ${Object.keys(PRICE_MATRIX.Plywood).map(value => '<option>' + value + '</option>').join('')}
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="${id}_core" class="form-label fw-semibold small">CHOOSE CORE MATERIAL</label>
                    <select id="${id}_core" class="form-select form-select-sm item-core" onchange="calculateAreas()">
                        ${Object.keys(PRICE_MATRIX).map(value => '<option>' + value + '</option>').join('')}
                    </select>
                </div>
            </div>`;
        }

        function addPanel() {
            panelCount++;
            const html = `
    <div class="dynamic-box" id="panel_row_${panelCount}">
        <div class="d-flex justify-content-between mb-2">
            <strong>Panel #${panelCount}</strong>
            <button type="button" class="btn-close btn-sm" onclick="removeElement('panel_row_${panelCount}')"></button>
        </div>
        <div class="row g-2">
            <div class="col-md-2"><input type="number" step="any" min="0" class="form-control form-control-sm p-len" placeholder="Length" oninput="calculateAreas()"></div>
            <div class="col-md-2"><input type="number" step="any" min="0" class="form-control form-control-sm p-width" placeholder="Width" oninput="calculateAreas()"></div>
            <div class="col-md-2"><input type="number" step="any" min="0" class="form-control form-control-sm p-height" placeholder="Height" oninput="calculateAreas()"></div>
            <div class="col-md-2"><input type="text" class="form-control form-control-sm p-area bg-light" readonly placeholder="Area (CFT)"></div>
            <div class="col-md-4"><input type="text" class="form-control form-control-sm item-remark" aria-label="Panel remark" placeholder="Remark (e.g. Kitchen cabinet)"></div>
        </div>
        ${itemMaterials('panel_' + panelCount)}
    </div>`;
            document.getElementById('panelContainer').insertAdjacentHTML('beforeend', html);
        }

        function addFrame() {
            frameCount++;
            const html = `
    <div class="dynamic-box" id="frame_row_${frameCount}">
        <div class="d-flex justify-content-between mb-2">
            <strong>Frame #${frameCount}</strong>
            <button type="button" class="btn-close btn-sm" onclick="removeElement('frame_row_${frameCount}')"></button>
        </div>
        <div class="row g-2">
            <div class="col-md-3"><input type="number" step="any" min="0" class="form-control form-control-sm f-len" placeholder="Length" oninput="calculateAreas()"></div>
            <div class="col-md-3"><input type="number" step="any" min="0" class="form-control form-control-sm f-breadth" placeholder="Breadth" oninput="calculateAreas()"></div>
            <div class="col-md-3"><input type="text" class="form-control form-control-sm f-area bg-light" readonly placeholder="Area (SFT)"></div>
            <div class="col-md-3"><input type="text" class="form-control form-control-sm item-remark" aria-label="Frame remark" placeholder="Remark (e.g. Door frame)"></div>
        </div>
        ${itemMaterials('frame_' + frameCount)}
    </div>`;
            document.getElementById('frameContainer').insertAdjacentHTML('beforeend', html);
        }

        function removeElement(id) {
            document.getElementById(id).remove();
            calculateAreas();
        }

        function calculateAreas() {
            let rates = getRates();


            let panelCost = 0;
            let frameCost = 0;
            let totalPanelCFT = 0;
            document.querySelectorAll('#panelContainer .dynamic-box').forEach(box => {
                let l = parseFloat(box.querySelector('.p-len').value) || 0;
                let w = parseFloat(box.querySelector('.p-width').value) || 0;
                let h = parseFloat(box.querySelector('.p-height').value) || 0;
                let cft = l * w * h;
                box.querySelector('.p-area').value = cft > 0 ? cft.toFixed(2) + ' CFT' : '';
                totalPanelCFT += cft;
                panelCost += cft * getRates(box).cft;
            });

            let totalFrameSFT = 0;
            document.querySelectorAll('#frameContainer .dynamic-box').forEach(box => {
                let l = parseFloat(box.querySelector('.f-len').value) || 0;
                let b = parseFloat(box.querySelector('.f-breadth').value) || 0;
                let sft = l * b;
                box.querySelector('.f-area').value = sft > 0 ? sft.toFixed(2) + ' SFT' : '';
                totalFrameSFT += sft;
                frameCost += sft * getRates(box).sft;
            });

            let grandTotal = panelCost + frameCost;

            document.getElementById('sum_rate_sft').innerText = rates.sft;
            document.getElementById('sum_rate_cft').innerText = rates.cft;

            document.getElementById('sum_panel_area').innerText = totalPanelCFT.toFixed(2);
            document.getElementById('sum_panel_cost').innerText = panelCost.toFixed(2);

            document.getElementById('sum_frame_area').innerText = totalFrameSFT.toFixed(2);
            document.getElementById('sum_frame_cost').innerText = frameCost.toFixed(2);

            document.getElementById('sum_grand_total').innerText = grandTotal.toFixed(2);

            document.getElementById('total_area_display').value = `${totalPanelCFT.toFixed(2)} CFT | ${totalFrameSFT.toFixed(2)} SFT | Est: ₹ ${grandTotal.toFixed(2)}`;

            document.getElementById('hid_sft_rate').value = rates.sft;
            document.getElementById('hid_cft_rate').value = rates.cft;
            document.getElementById('hid_total_panel_cft').value = totalPanelCFT.toFixed(2);
            document.getElementById('hid_total_frame_sft').value = totalFrameSFT.toFixed(2);
            document.getElementById('hid_total_panel_cost').value = panelCost.toFixed(2);
            document.getElementById('hid_total_frame_cost').value = frameCost.toFixed(2);
            document.getElementById('hid_grand_total_amount').value = grandTotal.toFixed(2);
        }

        function prepareJSON() {
            calculateAreas();
            let payload = {
                extra_item_title: document.getElementById('extra_item_name').value,
                panels: [],
                frames: []
            };

            document.querySelectorAll('#panelContainer .dynamic-box').forEach(box => {
                payload.panels.push({
                    remark: box.querySelector('.item-remark').value.trim(),
                    surface: box.querySelector('.item-surface').value,
                    core: box.querySelector('.item-core').value,
                    rate: getRates(box).cft,
                    length: box.querySelector('.p-len').value || '0',
                    width: box.querySelector('.p-width').value || '0',
                    height: box.querySelector('.p-height').value || '0',
                    cft: box.querySelector('.p-area').value || '0 CFT'
                });
            });

            document.querySelectorAll('#frameContainer .dynamic-box').forEach(box => {
                payload.frames.push({
                    remark: box.querySelector('.item-remark').value.trim(),
                    surface: box.querySelector('.item-surface').value,
                    core: box.querySelector('.item-core').value,
                    rate: getRates(box).sft,
                    length: box.querySelector('.f-len').value || '0',
                    breadth: box.querySelector('.f-breadth').value || '0',
                    sft: box.querySelector('.f-area').value || '0 SFT'
                });
            });

            document.getElementById('input_dynamic_json').value = JSON.stringify(payload);
        }

        <?php if ($show_success_modal): ?>
        document.addEventListener('DOMContentLoaded', function() {
            new bootstrap.Modal(document.getElementById('successModal')).show();
        });
        <?php endif; ?>

        // Initial Setup
        addPanel();
        addFrame();
        calculateAreas();
    </script>
</body>

</html>
