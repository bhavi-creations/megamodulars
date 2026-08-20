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

        #estimator-section {
            display: none;
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

                <!-- Custom Input Field for Aluminium -->
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

            <!-- Step 4: Measurement Unit & Area Calculation (UPDATED) -->
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3">
                    <span class="step-number">4</span>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">MEASUREMENT UNIT & QUANTITY</h5>
                        <small class="text-muted">Select unit type and enter total area for instant calculation</small>
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
                    <div class="col-12 col-md-6">
                        <div class="card p-3 bg-light border-0">
                            <label for="area-size-calculator" class="form-label fw-bold text-dark">Enter Required Area (<span id="area-unit-label">SFT</span>):</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="area-size-calculator" placeholder="e.g. 20 or 30" min="0">
                                <span class="input-group-text fw-bold" id="area-unit-span">SFT</span>
                            </div>
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
                        <p class="mb-1"><strong>Unit Type:</strong> <span id="summary-unit">SFT</span></p>
                        <p class="mb-0"><strong>Price / Unit:</strong> <span id="summary-rate" class="fw-bold text-dark">₹750</span></p>
                    </div>
                    <div class="col-md-5 text-md-end mt-3 mt-md-0">
                        <span class="text-muted d-block">Total Estimated Cost (<span id="summary-area-display">1 Unit</span>)</span>
                        <h3 class="fw-bold text-success mb-0" id="summary-total">₹750</h3>
                    </div>
                </div>
            </div>

            <!-- EMAIL ENQUIRY FORM INTEGRATION -->
            <div class="p-4 border rounded-3 bg-light mt-4">
                <h5 class="fw-bold text-dark mb-3">Request Official Quotation</h5>

                <form action="https://api.web3forms.com/submit" method="POST" id="quote-form">
                    <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
                    <input type="hidden" name="subject" value="New Kitchen Material Cost Estimation Request">

                    <!-- Hidden inputs dynamically synced with JavaScript -->
                    <input type="hidden" name="kitchen_layout" id="form-layout" value="L-Shaped">
                    <input type="hidden" name="core_material" id="form-core" value="Plywood">
                    <input type="hidden" name="surface_finish" id="form-finish" value="Laminate">
                    <input type="hidden" name="measurement_unit" id="form-unit" value="SFT">
                    <input type="hidden" name="rate_per_unit" id="form-rate" value="₹750">
                    <input type="hidden" name="calculated_total_price" id="form-price" value="₹750">

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

            const cards = document.querySelectorAll('.selectable-card');
            const customAluminiumInput = document.getElementById('custom-aluminium-price');
            const aluminiumInputWrapper = document.getElementById('aluminium-input-wrapper');
            const areaCalculatorInput = document.getElementById('area-size-calculator');
            const clientAreaFormInput = document.getElementById('client-area');

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

            customAluminiumInput.addEventListener('input', calculateTotal);
            areaCalculatorInput.addEventListener('input', function() {
                // Sync with bottom enquiry form field
                clientAreaFormInput.value = this.value;
                calculateTotal();
            });

            function calculateTotal() {
                const activeLayout = document.querySelector('#layout-group .selectable-card.active').getAttribute('data-value');
                const activeFinish = document.querySelector('#finish-group .selectable-card.active').getAttribute('data-value');
                const activeCore = document.querySelector('#core-group .selectable-card.active').getAttribute('data-value');
                const activeUnit = document.querySelector('#unit-group .selectable-card.active').getAttribute('data-value');

                // Update Labels
                const unitUpper = activeUnit.toUpperCase();
                document.getElementById('area-unit-label').textContent = unitUpper;
                document.getElementById('area-unit-span').textContent = unitUpper;

                let rate = 0;

                if (activeFinish === 'Aluminium') {
                    const customVal = parseFloat(customAluminiumInput.value);
                    rate = !isNaN(customVal) && customVal >= 0 ? customVal : 0;
                } else if (priceData[activeCore] && priceData[activeCore][activeFinish]) {
                    rate = priceData[activeCore][activeFinish][activeUnit];
                }

                const areaQty = parseFloat(areaCalculatorInput.value);
                const qty = (!isNaN(areaQty) && areaQty > 0) ? areaQty : 1;
                const grandTotal = rate * qty;

                const rateString = rate ? `₹${rate.toLocaleString('en-IN')}` : '₹0';
                const totalString = grandTotal ? `₹${grandTotal.toLocaleString('en-IN')}` : '₹0';

                // Update UI Summary
                document.getElementById('summary-layout').textContent = activeLayout;
                document.getElementById('summary-combination').textContent = `${activeCore} + ${activeFinish}`;
                document.getElementById('summary-unit').textContent = unitUpper;
                document.getElementById('summary-rate').textContent = `${rateString} / ${unitUpper}`;
                document.getElementById('summary-area-display').textContent = `${qty} ${unitUpper}`;
                document.getElementById('summary-total').textContent = totalString;

                // Sync Hidden Form Fields for Web3Forms Email Submission
                document.getElementById('form-layout').value = activeLayout;
                document.getElementById('form-core').value = activeCore;
                document.getElementById('form-finish').value = activeFinish;
                document.getElementById('form-unit').value = unitUpper;
                document.getElementById('form-rate').value = rateString;
                document.getElementById('form-price').value = totalString;
            }
        });
    </script>
<?php include 'footer.php' ; ?>