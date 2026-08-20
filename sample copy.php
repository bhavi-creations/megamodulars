<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Material Cost Estimator & Quote Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Web3Forms Script for Email Integration -->
    <script src="https://web3forms.com/client/script.js" async defer></script>

    <style>
        .selectable-card {
            cursor: pointer;
            border: 2px solid #dee2e6;
            border-radius: 12px;
            transition: all 0.2s ease-in-out;
            position: relative;
            background-color: #ffffff;
            user-select: none;
        }

        .selectable-card:hover {
            border-color: #795548;
        }

        .selectable-card.active {
            border-color: #5d4037 !important;
            background-color: #fbe9e7 !important;
            box-shadow: 0 4px 10px rgba(93, 64, 55, 0.15);
        }

        .check-badge {
            display: none;
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #5d4037;
            color: #ffffff;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 12px;
            font-weight: bold;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .selectable-card.active .check-badge {
            display: flex;
        }

        .step-number {
            background-color: #5d4037;
            color: #ffffff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .custom-input-container {
            display: none;
        }

        #estimator-section {
            display: none;
        }

        @media print {

            #login-section,
            .btn-print,
            #quote-form,
            .step-number {
                display: none !important;
            }

            body {
                background: white !important;
                padding: 0 !important;
            }

            .container {
                box-shadow: none !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body class="bg-light p-3 p-md-5">

    <div class="container bg-white p-4 rounded-4 shadow-sm" style="max-width: 1000px;">

        <!-- LOGIN SECTION -->
        <div id="login-section" class="py-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4">
                        <h4 class="fw-bold text-center mb-3 text-dark">Estimator Portal Login</h4>
                        <p class="text-muted text-center small mb-4">Please login to access the Material Cost Estimator</p>

                        <div id="login-error" class="alert alert-danger d-none" role="alert">
                            Invalid Username or Password!
                        </div>

                        <form id="login-form">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-bold">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold" style="background-color: #5d4037; border: none;">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ESTIMATOR MAIN SECTION (Hidden by default) -->
        <div id="estimator-section">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-dark m-0">Kitchen Material Cost Estimator</h3>
                <button onclick="window.print()" class="btn btn-outline-secondary btn-sm btn-print"><i class="bi bi-printer"></i> Print Quote</button>
            </div>

            <!-- Step 1: Choose Kitchen Layout -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">1</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">CHOOSE KITCHEN LAYOUT</h5>
                        <small class="text-muted">Select your kitchen layout shape</small>
                    </div>
                </div>

                <div class="row g-3" id="layout-group">
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100 active" data-value="L-Shaped">
                            <div class="check-badge">✓</div>
                            <img src="./assets/img/lshape.png" alt="L-Shaped" class="img-fluid" style="width: 100px; height: auto;">
                            <div class="fw-bold text-dark mt-2">L-Shaped</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="U-Shaped">
                            <div class="check-badge">✓</div>
                            <img src="./assets/img/ushaped.png" alt="U-Shaped" class="img-fluid" style="width: 100px; height: auto;">
                            <div class="fw-bold text-dark mt-2">U-Shaped</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="Straight">
                            <div class="check-badge">✓</div>
                            <img src="./assets/img/straight.png" alt="Straight" class="img-fluid" style="width: 100px; height: auto;">
                            <div class="fw-bold text-dark mt-2">Straight</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="Parallel">
                            <div class="check-badge">✓</div>
                            <img src="./assets/img/parallel.png" alt="Parallel" class="img-fluid" style="width: 100px; height: auto;">
                            <div class="fw-bold text-dark mt-2">Parallel</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="Island">
                            <div class="check-badge">✓</div>
                            <img src="./assets/img/island.png" alt="Island" class="img-fluid" style="width: 100px; height: auto;">
                            <div class="fw-bold text-dark mt-2">Island</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <!-- Step 2: Surface Finish -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">2</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">CHOOSE SURFACE FINISH</h5>
                        <small class="text-muted">Select your finish material</small>
                    </div>
                </div>

                <div class="row g-3" id="finish-group">
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100 active" data-value="Laminate">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">Laminate</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="Acrylic">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">Acrylic</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="PVC">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">PVC</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="PU">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">PU</div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100" data-value="Aluminium" id="aluminium-card">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">Aluminium</div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 custom-input-container" id="aluminium-input-wrapper">
                    <div class="card p-3 bg-light border-0">
                        <label for="custom-aluminium-price" class="form-label fw-bold text-dark">Enter Custom Price for Aluminium (per Selected Unit):</label>
                        <div class="input-group" style="max-width: 300px;">
                            <span class="input-group-text fw-bold">₹</span>
                            <input type="number" class="form-control" id="custom-aluminium-price" placeholder="e.g. 1100" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <!-- Step 3: Core Material -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">3</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">CHOOSE CORE MATERIAL</h5>
                        <small class="text-muted">Select base material substrate</small>
                    </div>
                </div>

                <div class="row g-3" id="core-group">
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100 active" data-value="Plywood">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">Plywood</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100" data-value="HDHMR">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">HDHMR</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100" data-value="MDF">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">MDF</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100" data-value="Real Wood">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">Real Wood</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <!-- Step 4: Measurement Unit & Dimensions Calculator -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">4</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">MEASUREMENT & AREA CALCULATOR</h5>
                        <small class="text-muted">Select unit type and calculate approximate dimensions</small>
                    </div>
                </div>

                <div class="row g-3 mb-3" id="unit-group">
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100 active" data-value="sft">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">SFT</div>
                            <small class="text-muted">Square Feet</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="selectable-card p-3 text-center h-100" data-value="cft">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2">CFT</div>
                            <small class="text-muted">Cubic Feet</small>
                        </div>
                    </div>
                </div>

                <div class="card p-3 bg-light border-0">
                    <div class="row g-3">
                        <div class="col-6 col-md-4">
                            <label class="form-label fw-bold">Length (Ft)</label>
                            <input type="number" class="form-control" id="calc-length" placeholder="e.g. 10" min="0">
                        </div>
                        <div class="col-6 col-md-4">
                            <label class="form-label fw-bold">Height / Depth (Ft)</label>
                            <input type="number" class="form-control" id="calc-height" placeholder="e.g. 8" min="0">
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label fw-bold">Total Estimated Units</label>
                            <input type="number" class="form-control fw-bold text-primary" id="calc-total-units" placeholder="Total Area" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <!-- Step 5: Hardware Add-ons (Optional Extra Features) -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">5</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">HARDWARE & FITTINGS (OPTIONAL)</h5>
                        <small class="text-muted">Add premium fittings to your quotation</small>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-check card p-3 border">
                            <input class="form-check-input addon-checkbox ms-1" type="checkbox" value="150" id="addon-softclose">
                            <label class="form-check-label ms-3 fw-bold text-dark" for="addon-softclose">
                                Premium Soft-Close Hinges & Channels (+₹150/unit)
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check card p-3 border">
                            <input class="form-check-input addon-checkbox ms-1" type="checkbox" value="100" id="addon-profile">
                            <label class="form-check-label ms-3 fw-bold text-dark" for="addon-profile">
                                Gola / Profile Handles Finish (+₹100/unit)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selection Summary -->
            <div class="p-3 border rounded-3 bg-light mt-4">
                <h6 class="fw-bold text-uppercase border-bottom pb-2">Selected Summary</h6>
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <p class="mb-1"><strong>Selected Layout:</strong> <span id="summary-layout">L-Shaped</span></p>
                        <p class="mb-1"><strong>Selected Combination:</strong> <span id="summary-combination">Plywood + Laminate</span></p>
                        <p class="mb-1"><strong>Unit Type & Total Area:</strong> <span id="summary-unit">SFT</span> (<span id="summary-area-display">0</span> Units)</p>
                        <p class="mb-0 text-muted small"><strong>Rate / Unit:</strong> <span id="summary-rate">₹750</span></p>
                    </div>
                    <div class="col-md-5 text-md-end mt-3 mt-md-0">
                        <span class="text-muted d-block fw-bold">Estimated Grand Total</span>
                        <h2 class="fw-bold text-success mb-2" id="summary-total">₹0</h2>

                        <button type="button" id="whatsapp-share-btn" class="btn btn-outline-success btn-sm fw-bold">
                            <i class="bi bi-whatsapp"></i> Share Quote via WhatsApp
                        </button>
                    </div>
                </div>
            </div>

            <!-- EMAIL ENQUIRY FORM INTEGRATION -->
            <div class="p-4 border rounded-3 bg-light mt-4" id="quote-form">
                <h5 class="fw-bold text-dark mb-3">Request Official Quotation</h5>

                <form action="https://api.web3forms.com/submit" method="POST">
                    <!-- Web3Forms Access Key -->
                    <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
                    <input type="hidden" name="subject" value="New Kitchen Material Cost Estimation Request">

                    <!-- Hidden inputs dynamically synced with JavaScript -->
                    <input type="hidden" name="kitchen_layout" id="form-layout" value="L-Shaped">
                    <input type="hidden" name="core_material" id="form-core" value="Plywood">
                    <input type="hidden" name="surface_finish" id="form-finish" value="Laminate">
                    <input type="hidden" name="measurement_unit" id="form-unit" value="SFT">
                    <input type="hidden" name="calculated_rate_per_unit" id="form-price" value="₹750">
                    <input type="hidden" name="grand_total" id="form-grand-total" value="₹0">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="client-name" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" name="client_name" id="client-name" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="client-email" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" name="client_email" id="client-email" placeholder="Enter email address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="client-phone" class="form-label fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" name="client_phone" id="client-phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="client-area" class="form-label fw-bold">Estimated Area Size</label>
                            <input type="number" class="form-control" name="client_area" id="client-area" placeholder="Enter size (e.g. 150)" required>
                        </div>
                        <div class="col-12">
                            <label for="client-message" class="form-label fw-bold">Additional Requirements / Notes</label>
                            <textarea class="form-control" name="client_message" id="client-message" rows="3" placeholder="Enter any specific preferences..."></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success fw-bold px-4 py-2">Submit Request via Email</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <script>
        const AUTH_USER = "admin";
        const AUTH_PASS = "12345";

        const priceData = {
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
                }
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            // Login Handler
            const loginForm = document.getElementById('login-form');
            const loginSection = document.getElementById('login-section');
            const estimatorSection = document.getElementById('estimator-section');
            const loginError = document.getElementById('login-error');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const userVal = document.getElementById('username').value.trim();
                const passVal = document.getElementById('password').value.trim();

                if (userVal === AUTH_USER && passVal === AUTH_PASS) {
                    loginSection.style.display = 'none';
                    estimatorSection.style.display = 'block';
                } else {
                    loginError.classList.remove('d-none');
                }
            });

            // Card Selection Handler
            const cards = document.querySelectorAll('.selectable-card');
            const customAluminiumInput = document.getElementById('custom-aluminium-price');
            const aluminiumInputWrapper = document.getElementById('aluminium-input-wrapper');

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    const group = this.closest('.row');
                    group.querySelectorAll('.selectable-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const activeFinish = document.querySelector('#finish-group .selectable-card.active').getAttribute('data-value');
                    if (activeFinish === 'Aluminium') {
                        aluminiumInputWrapper.style.display = 'block';
                    } else {
                        aluminiumInputWrapper.style.display = 'none';
                    }

                    calculateTotal();
                });
            });

            // Dimension Calculator Inputs
            const lengthInput = document.getElementById('calc-length');
            const heightInput = document.getElementById('calc-height');
            const totalUnitsInput = document.getElementById('calc-total-units');
            const clientAreaInput = document.getElementById('client-area');
            const addonCheckboxes = document.querySelectorAll('.addon-checkbox');

            lengthInput.addEventListener('input', updateArea);
            heightInput.addEventListener('input', updateArea);
            customAluminiumInput.addEventListener('input', calculateTotal);
            addonCheckboxes.forEach(cb => cb.addEventListener('change', calculateTotal));

            function updateArea() {
                const l = parseFloat(lengthInput.value) || 0;
                const h = parseFloat(heightInput.value) || 0;
                const area = l * h;
                totalUnitsInput.value = area ? area : '';
                clientAreaInput.value = area ? area : '';
                calculateTotal();
            }

            clientAreaInput.addEventListener('input', function() {
                totalUnitsInput.value = this.value;
                calculateTotal();
            });

            function calculateTotal() {
                const activeLayout = document.querySelector('#layout-group .selectable-card.active').getAttribute('data-value');
                const activeFinish = document.querySelector('#finish-group .selectable-card.active').getAttribute('data-value');
                const activeCore = document.querySelector('#core-group .selectable-card.active').getAttribute('data-value');
                const activeUnit = document.querySelector('#unit-group .selectable-card.active').getAttribute('data-value');

                let rate = 0;

                if (activeFinish === 'Aluminium') {
                    const customVal = parseFloat(customAluminiumInput.value);
                    rate = !isNaN(customVal) && customVal >= 0 ? customVal : 0;
                } else if (priceData[activeCore] && priceData[activeCore][activeFinish]) {
                    rate = priceData[activeCore][activeFinish][activeUnit];
                }

                // Addons calculation
                let addonRate = 0;
                addonCheckboxes.forEach(cb => {
                    if (cb.checked) addonRate += parseFloat(cb.value);
                });

                const effectiveRate = rate + addonRate;
                const totalUnits = parseFloat(totalUnitsInput.value) || 0;
                const grandTotal = effectiveRate * totalUnits;

                const priceString = effectiveRate ? `₹${effectiveRate.toLocaleString('en-IN')}` : '₹0';
                const totalString = grandTotal ? `₹${grandTotal.toLocaleString('en-IN')}` : priceString;

                // Update UI Summary
                document.getElementById('summary-layout').textContent = activeLayout;
                document.getElementById('summary-combination').textContent = `${activeCore} + ${activeFinish}`;
                document.getElementById('summary-unit').textContent = activeUnit.toUpperCase();
                document.getElementById('summary-rate').textContent = priceString;
                document.getElementById('summary-area-display').textContent = totalUnits;
                document.getElementById('summary-total').textContent = totalString;

                // Sync Hidden Form Fields
                document.getElementById('form-layout').value = activeLayout;
                document.getElementById('form-core').value = activeCore;
                document.getElementById('form-finish').value = activeFinish;
                document.getElementById('form-unit').value = activeUnit.toUpperCase();
                document.getElementById('form-price').value = priceString;
                document.getElementById('form-grand-total').value = totalString;
            }

            // WhatsApp Share Handler
            document.getElementById('whatsapp-share-btn').addEventListener('click', function() {
                const layout = document.getElementById('summary-layout').textContent;
                const combo = document.getElementById('summary-combination').textContent;
                const rate = document.getElementById('summary-rate').textContent;
                const total = document.getElementById('summary-total').textContent;
                const area = document.getElementById('summary-area-display').textContent;

                const message = `Hello, I generated a Kitchen Estimate:\n\n*Layout:* ${layout}\n*Material:* ${combo}\n*Area:* ${area} Units\n*Rate/Unit:* ${rate}\n*Estimated Total:* ${total}\n\nPlease share more details.`;

                const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });
        });
    </script>

</body>

</html>