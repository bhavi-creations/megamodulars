<?php include 'header.php'; ?>
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

        .dynamic-box {
            border: 1px dashed #a1887f;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 12px;
            background-color: #fafafa;
        }
    </style>
</head>

<body class="bg-light p-3 p-md-5">

    <div class="container bg-white p-4 rounded-4 shadow-sm" style="max-width: 1000px;">

        <!-- ESTIMATOR MAIN SECTION -->
        <div id="estimator-section">

            <!-- Step 1: Choose Layout -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">1</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">CHOOSE LAYOUT</h5>
                        <small class="text-muted">Select layout category</small>
                    </div>
                </div>

                <div class="row g-3" id="layout-group">
                    <?php 
                    $layouts = [
                        'Kitchen', 
                        'Wardrobe', 
                        'TV Point', 
                        'Krokary', 
                        'Paneling', 
                        'Extra Items'
                    ];
                    foreach($layouts as $index => $layout): 
                    ?>
                    <div class="col-6 col-sm-4 col-md">
                        <div class="selectable-card p-3 text-center h-100 <?= $index === 0 ? 'active' : '' ?>" data-value="<?= $layout ?>">
                            <div class="check-badge">✓</div>
                            <div class="fw-bold text-dark mt-2"><?= $layout ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- DYNAMIC PANELS & FRAMES DIMENSION CALCULATOR -->
            <div class="mb-4 p-3 border rounded-3 bg-white">
                <h6 class="fw-bold text-dark mb-3">DYNAMIC DIMENSIONS (<span id="active-layout-title">Kitchen</span>)</h6>
                
                <div id="extra-item-title-wrapper" class="mb-3 custom-input-container">
                    <label class="form-label fw-bold text-dark">Extra Item Name:</label>
                    <input type="text" id="extra-item-title-input" class="form-control" placeholder="Enter custom item title">
                </div>

                <!-- Panels Section -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark">Panels (Cubic Area - CFT)</span>
                        <button type="button" class="btn btn-sm btn-outline-dark fw-bold" onclick="addPanelRow()">+ Add Panel</button>
                    </div>
                    <div id="panels-container"></div>
                </div>

                <!-- Frames Section -->
                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold text-dark">Frames (Square Area - SFT)</span>
                        <button type="button" class="btn btn-sm btn-outline-dark fw-bold" onclick="addFrameRow()">+ Add Frame</button>
                    </div>
                    <div id="frames-container"></div>
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
                        <label for="custom-aluminium-price" class="form-label fw-bold text-dark">Enter Custom Price for Aluminium:</label>
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

            <!-- Step 4: Unit Selection -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">4</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">MEASUREMENT UNIT & QUANTITY</h5>
                        <small class="text-muted">Select unit type for summary rate calculation</small>
                    </div>
                </div>

                <div class="row g-3 align-items-center" id="unit-group">
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
            </div>

            <!-- Selection Summary -->
            <div class="p-3 border rounded-3 bg-light mt-4">
                <h6 class="fw-bold text-uppercase border-bottom pb-2">Selected Summary</h6>
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <p class="mb-1"><strong>Selected Layout:</strong> <span id="summary-layout">Kitchen</span></p>
                        <p class="mb-1"><strong>Selected Combination:</strong> <span id="summary-combination">Plywood + Laminate</span></p>
                        <p class="mb-1"><strong>Calculated Panel Volume:</strong> <span id="summary-panel-vol">0</span> CFT</p>
                        <p class="mb-1"><strong>Calculated Frame Area:</strong> <span id="summary-frame-vol">0</span> SFT</p>
                        <p class="mb-0"><strong>Price / Unit:</strong> <span id="summary-rate" class="fw-bold text-dark">₹750</span></p>
                    </div>
                    <div class="col-md-5 text-md-end mt-3 mt-md-0">
                        <span class="text-muted d-block">Total Estimated Cost</span>
                        <h3 class="fw-bold text-success mb-0" id="summary-total">₹0</h3>
                    </div>
                </div>
            </div>

            <!-- EMAIL ENQUIRY FORM INTEGRATION -->
            <div class="p-4 border rounded-3 bg-light mt-4">
                <h5 class="fw-bold text-dark mb-3">Request Official Quotation</h5>

                <form action="https://api.web3forms.com/submit" method="POST" id="quote-form">
                    <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
                    <input type="hidden" name="subject" value="New Layout Material Estimation Request">

                    <input type="hidden" name="layout" id="form-layout" value="Kitchen">
                    <input type="hidden" name="core_material" id="form-core" value="Plywood">
                    <input type="hidden" name="surface_finish" id="form-finish" value="Laminate">
                    <input type="hidden" name="measurement_unit" id="form-unit" value="SFT">
                    <input type="hidden" name="rate_per_unit" id="form-rate" value="₹750">
                    <input type="hidden" name="calculated_total_price" id="form-price" value="₹0">
                    <input type="hidden" name="dynamic_dimensions_json" id="form-dimensions-json" value="">

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
                            <label for="client-area" class="form-label fw-bold">Calculated Total Area Summary</label>
                            <input type="text" class="form-control" name="client_area" id="client-area" readonly placeholder="Auto-calculated">
                        </div>
                        <div class="col-12">
                            <label for="client-message" class="form-label fw-bold">Additional Requirements / Notes</label>
                            <textarea class="form-control" name="client_message" id="client-message" rows="3" placeholder="Enter any specific preferences..."></textarea>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success fw-bold px-4 py-2" onclick="prepareFormData()">Submit Request via Email</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <script>
        const priceData = {
            "Plywood": { "Laminate": { sft: 750, cft: 1200 }, "Acrylic": { sft: 850, cft: 1500 }, "PVC": { sft: 700, cft: 1300 }, "PU": { sft: 850, cft: 1500 } },
            "HDHMR": { "Laminate": { sft: 700, cft: 1100 }, "Acrylic": { sft: 800, cft: 1400 }, "PVC": { sft: 650, cft: 1200 }, "PU": { sft: 850, cft: 1700 } },
            "MDF": { "Laminate": { sft: 650, cft: 1000 }, "Acrylic": { sft: 750, cft: 1300 }, "PVC": { sft: 600, cft: 1100 }, "PU": { sft: 800, cft: 1600 } },
            "Real Wood": { "Laminate": { sft: 850, cft: 1400 }, "Acrylic": { sft: 950, cft: 1700 }, "PVC": { sft: 800, cft: 1500 }, "PU": { sft: 1000, cft: 2000 } }
        };

        let panelCounter = 0;
        let frameCounter = 0;

        function addPanelRow() {
            panelCounter++;
            const html = `
            <div class="dynamic-box" id="panel-row-${panelCounter}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold small text-secondary">Panel #${panelCounter}</span>
                    <button type="button" class="btn-close btn-sm" onclick="removeDynamicRow('panel-row-${panelCounter}')"></button>
                </div>
                <div class="row g-2">
                    <div class="col-md-3"><input type="number" step="any" class="form-control form-control-sm p-length" placeholder="Length" oninput="calculateTotal()"></div>
                    <div class="col-md-3"><input type="number" step="any" class="form-control form-control-sm p-width" placeholder="Width" oninput="calculateTotal()"></div>
                    <div class="col-md-3"><input type="number" step="any" class="form-control form-control-sm p-height" placeholder="Height" oninput="calculateTotal()"></div>
                    <div class="col-md-3"><input type="text" class="form-control form-control-sm p-area bg-light fw-bold" readonly placeholder="Area (CFT)"></div>
                </div>
            </div>`;
            document.getElementById('panels-container').insertAdjacentHTML('beforeend', html);
        }

        function addFrameRow() {
            frameCounter++;
            const html = `
            <div class="dynamic-box" id="frame-row-${frameCounter}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold small text-secondary">Frame #${frameCounter}</span>
                    <button type="button" class="btn-close btn-sm" onclick="removeDynamicRow('frame-row-${frameCounter}')"></button>
                </div>
                <div class="row g-2">
                    <div class="col-md-4"><input type="number" step="any" class="form-control form-control-sm f-length" placeholder="Length" oninput="calculateTotal()"></div>
                    <div class="col-md-4"><input type="number" step="any" class="form-control form-control-sm f-breadth" placeholder="Breadth" oninput="calculateTotal()"></div>
                    <div class="col-md-4"><input type="text" class="form-control form-control-sm f-area bg-light fw-bold" readonly placeholder="Area (SFT)"></div>
                </div>
            </div>`;
            document.getElementById('frames-container').insertAdjacentHTML('beforeend', html);
        }

        function removeDynamicRow(id) {
            document.getElementById(id).remove();
            calculateTotal();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.selectable-card');
            const customAluminiumInput = document.getElementById('custom-aluminium-price');
            const aluminiumInputWrapper = document.getElementById('aluminium-input-wrapper');

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    const group = this.closest('.row');
                    group.querySelectorAll('.selectable-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const activeLayout = document.querySelector('#layout-group .selectable-card.active').getAttribute('data-value');
                    document.getElementById('active-layout-title').textContent = activeLayout;

                    const extraWrapper = document.getElementById('extra-item-title-wrapper');
                    if (activeLayout === 'Extra Items') {
                        extraWrapper.style.display = 'block';
                    } else {
                        extraWrapper.style.display = 'none';
                    }

                    const activeFinish = document.querySelector('#finish-group .selectable-card.active').getAttribute('data-value');
                    if (activeFinish === 'Aluminium') {
                        aluminiumInputWrapper.style.display = 'block';
                    } else {
                        aluminiumInputWrapper.style.display = 'none';
                    }

                    calculateTotal();
                });
            });

            customAluminiumInput.addEventListener('input', calculateTotal);

            // Initial rows creation
            addPanelRow();
            addFrameRow();
        });

        function calculateTotal() {
            let totalPanelCFT = 0;
            document.querySelectorAll('#panels-container .dynamic-box').forEach(box => {
                let l = parseFloat(box.querySelector('.p-length').value) || 0;
                let w = parseFloat(box.querySelector('.p-width').value) || 0;
                let h = parseFloat(box.querySelector('.p-height').value) || 0;
                let cft = l * w * h;
                box.querySelector('.p-area').value = cft > 0 ? cft.toFixed(2) + ' CFT' : '';
                totalPanelCFT += cft;
            });

            let totalFrameSFT = 0;
            document.querySelectorAll('#frames-container .dynamic-box').forEach(box => {
                let l = parseFloat(box.querySelector('.f-length').value) || 0;
                let b = parseFloat(box.querySelector('.f-breadth').value) || 0;
                let sft = l * b;
                box.querySelector('.f-area').value = sft > 0 ? sft.toFixed(2) + ' SFT' : '';
                totalFrameSFT += sft;
            });

            const activeLayout = document.querySelector('#layout-group .selectable-card.active').getAttribute('data-value');
            const activeFinish = document.querySelector('#finish-group .selectable-card.active').getAttribute('data-value');
            const activeCore = document.querySelector('#core-group .selectable-card.active').getAttribute('data-value');
            const activeUnit = document.querySelector('#unit-group .selectable-card.active').getAttribute('data-value');

            let rate = 0;
            if (activeFinish === 'Aluminium') {
                const customVal = parseFloat(document.getElementById('custom-aluminium-price').value);
                rate = !isNaN(customVal) && customVal >= 0 ? customVal : 0;
            } else if (priceData[activeCore] && priceData[activeCore][activeFinish]) {
                rate = priceData[activeCore][activeFinish][activeUnit];
            }

            let grandTotal = 0;
            if (activeUnit === 'sft') {
                grandTotal = totalFrameSFT * rate;
            } else {
                grandTotal = totalPanelCFT * rate;
            }

            const unitUpper = activeUnit.toUpperCase();
            const rateString = rate ? `₹${rate.toLocaleString('en-IN')}` : '₹0';
            const totalString = grandTotal ? `₹${grandTotal.toLocaleString('en-IN')}` : '₹0';

            document.getElementById('summary-layout').textContent = activeLayout;
            document.getElementById('summary-combination').textContent = `${activeCore} + ${activeFinish}`;
            document.getElementById('summary-panel-vol').textContent = totalPanelCFT.toFixed(2);
            document.getElementById('summary-frame-vol').textContent = totalFrameSFT.toFixed(2);
            document.getElementById('summary-rate').textContent = `${rateString} / ${unitUpper}`;
            document.getElementById('summary-total').textContent = totalString;

            document.getElementById('client-area').value = `Panels: ${totalPanelCFT.toFixed(2)} CFT | Frames: ${totalFrameSFT.toFixed(2)} SFT`;

            document.getElementById('form-layout').value = activeLayout;
            document.getElementById('form-core').value = activeCore;
            document.getElementById('form-finish').value = activeFinish;
            document.getElementById('form-unit').value = unitUpper;
            document.getElementById('form-rate').value = rateString;
            document.getElementById('form-price').value = totalString;
        }

        function prepareFormData() {
            let dynamicData = {
                extra_item_name: document.getElementById('extra-item-title-input').value,
                panels: [],
                frames: []
            };

            document.querySelectorAll('#panels-container .dynamic-box').forEach(box => {
                dynamicData.panels.push({
                    length: box.querySelector('.p-length').value,
                    width: box.querySelector('.p-width').value,
                    height: box.querySelector('.p-height').value,
                    cft: box.querySelector('.p-area').value
                });
            });

            document.querySelectorAll('#frames-container .dynamic-box').forEach(box => {
                dynamicData.frames.push({
                    length: box.querySelector('.f-length').value,
                    breadth: box.querySelector('.f-breadth').value,
                    sft: box.querySelector('.f-area').value
                });
            });

            document.getElementById('form-dimensions-json').value = JSON.stringify(dynamicData);
        }
    </script>
<?php include 'footer.php' ; ?>