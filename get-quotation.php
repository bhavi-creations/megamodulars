<?php
$mailStatus = $_GET['mail'] ?? null;
$mailMsg = $_GET['msg'] ?? '';
include 'header.php';
?>

<!-- Get Quotation Section Wrapper -->
<section class="get-quotation-section">

    <!-- Top Hero Header -->
    <div class="hero-header">
        <div class="container">
            <h1 class="hero-title">Get Your<br>Personalized Quotation</h1>
            <div class="hero-line"></div>
            <p class="hero-subtitle">Choose your kitchen layout, area and preferences to get an instant estimated price.</p>
        </div>
    </div>

    <div class="container">
        <div class="quotation-card">
            <div class="step-row">
                <div class="step-number">1</div>
                <div class="w-100">
                    <h6 class="step-heading">Choose Layout</h6>
                    <p class="step-subtext">Select the layout that fits your space</p>

                    <div class="option-grid">
                        <div class="option-card active" data-layout="L-Shaped Kitchen" data-baseprice="245000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="L-Shaped" class="option-img">
                            <span class="option-label">L-Shaped</span>
                        </div>
                        <div class="option-card" data-layout="U-Shaped Kitchen" data-baseprice="280000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="U-Shaped" class="option-img">
                            <span class="option-label">U-Shaped</span>
                        </div>
                        <div class="option-card" data-layout="Straight Kitchen" data-baseprice="190000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="Straight" class="option-img">
                            <span class="option-label">Straight</span>
                        </div>
                        <div class="option-card" data-layout="Parallel Kitchen" data-baseprice="260000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="Parallel" class="option-img">
                            <span class="option-label">Parallel</span>
                        </div>
                        <div class="option-card" data-layout="Island Kitchen" data-baseprice="320000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="Island" class="option-img">
                            <span class="option-label">Island</span>
                        </div>
                        <div class="option-card" data-layout="G-Shaped Kitchen" data-baseprice="350000">
                            <img src="https://cdn-icons-png.flaticon.com/512/2544/2544087.png" alt="G-Shaped" class="option-img">
                            <span class="option-label">G-Shaped</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border-light);">

            <div class="step-row">
                <div class="step-number">2</div>
                <div class="w-100">
                    <h6 class="step-heading">Select Area</h6>
                    <p class="step-subtext">Choose your kitchen area or enter custom size</p>

                    <div class="area-grid">
                        <div class="area-card" data-area="50 - 75 sq.ft" data-multiplier="0.85">
                            <div class="area-title">50 - 75</div>
                            <div class="area-sub">sq.ft</div>
                        </div>
                        <div class="area-card active" data-area="76 - 100 sq.ft" data-multiplier="1.0">
                            <div class="area-title">76 - 100</div>
                            <div class="area-sub">sq.ft</div>
                        </div>
                        <div class="area-card" data-area="101 - 125 sq.ft" data-multiplier="1.2">
                            <div class="area-title">101 - 125</div>
                            <div class="area-sub">sq.ft</div>
                        </div>
                        <div class="area-card" data-area="126 - 150 sq.ft" data-multiplier="1.4">
                            <div class="area-title">126 - 150</div>
                            <div class="area-sub">sq.ft</div>
                        </div>
                        <div class="area-card" data-area="151 - 200 sq.ft" data-multiplier="1.65">
                            <div class="area-title">151 - 200</div>
                            <div class="area-sub">sq.ft</div>
                        </div>
                        <div class="area-card" data-area="Custom Size" data-multiplier="1.8">
                            <div class="area-title"><i class="fa-regular fa-pen-to-square"></i> Custom</div>
                            <div class="area-sub">Enter Size</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border-light);">

            <div class="step-row">
                <div class="step-number">3</div>
                <div class="w-100">
                    <h6 class="step-heading">CHOOSE FINISH (OPTIONAL)</h6>
                    <p class="step-subtext">Select your preferred finish / look (Optional)</p>

                    <div class="option-grid">
                        <div class="option-card finish-card active" data-finish="Acrylic">
                            <div class="option-swatch" style="background-color: #f4e8dc;"></div>
                            <span class="option-label">Acrylic</span>
                        </div>
                        <div class="option-card finish-card" data-finish="Laminate">
                            <div class="option-swatch" style="background-color: #cbb89e;"></div>
                            <span class="option-label">Laminate</span>
                        </div>
                        <div class="option-card finish-card" data-finish="PU Matt">
                            <div class="option-swatch" style="background-color: #4a4e51;"></div>
                            <span class="option-label">PU Matt</span>
                        </div>
                        <div class="option-card finish-card" data-finish="Wood Finish">
                            <div class="option-swatch" style="background-color: #a06e3d;"></div>
                            <span class="option-label">Wood Finish</span>
                        </div>
                        <div class="option-card finish-card" data-finish="Glass">
                            <div class="option-swatch" style="background-color: #d2e3e8;"></div>
                            <span class="option-label">Glass</span>
                        </div>
                        <div class="option-card finish-card" data-finish="Membrane">
                            <div class="option-swatch" style="background-color: #dfd4c5;"></div>
                            <span class="option-label">Membrane</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border-light);">

            <div class="step-row">
                <div class="step-number">4</div>
                <div class="w-100">
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div class="summary-card">
                                <h6 class="step-heading mb-3">YOUR SELECTION SUMMARY</h6>
                                <table class="summary-table">
                                    <tr>
                                        <td><i class="fa-solid fa-shapes text-brown me-2"></i> Layout</td>
                                        <td id="summaryLayout">L-Shaped Kitchen</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-location-dot text-brown me-2"></i> Area</td>
                                        <td id="summaryArea">76 - 100 sq.ft</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-layer-group text-brown me-2"></i> Finish</td>
                                        <td id="summaryFinish">Acrylic</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa-solid fa-tags text-brown me-2"></i> Price Range</td>
                                        <td>Standard</td>
                                    </tr>
                                </table>

                                <div class="summary-note">
                                    <i class="fa-solid fa-circle-info text-muted mt-1"></i>
                                    <span>The price may vary based on materials, accessories, hardware and site conditions.</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="price-display-box">
                                <span class="step-heading text-center mb-2">Get Estimated Price</span>
                                <div class="price-amount" id="finalPriceDisplay">₹ 2,45,000</div>
                                <p class="price-label">( Estimated Price )<br>Inclusive of basic cabinets, shutters and fittings.</p>
                                <button type="button" class="btn-get-this" id="scrollToForm"><i class="fa-solid fa-calculator"></i> GET THIS QUOTATION</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border-light);">

            <div class="step-row">
                <div class="step-number">5</div>
                <div class="w-100">
                    <h6 class="step-heading">YOUR DETAILS</h6>
                    <p class="step-subtext">Please provide your details to receive the quotation</p>

                    <form id="quoteForm" method="post" action="quotation-mail.php">
                        <input type="hidden" name="layout" id="layoutInput" value="L-Shaped Kitchen">
                        <input type="hidden" name="area" id="areaInput" value="76 - 100 sq.ft">
                        <input type="hidden" name="finish" id="finishInput" value="Acrylic">
                        <input type="hidden" name="estimated_price" id="priceInput" value="₹ 2,45,000">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name*" required>
                            </div>
                            <div class="col-md-4">
                                <input type="tel" name="mobile_number" class="form-control" placeholder="Mobile Number*" required>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email_address" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="col-md-4">
                                <select name="city" class="form-select" required>
                                    <option value="" selected disabled>Select City*</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Vijayawada">Vijayawada</option>
                                    <option value="Visakhapatnam">Visakhapatnam</option>
                                    <option value="Rajahmundry">Rajahmundry</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="additional_message" class="form-control" placeholder="Additional Message (Optional)">
                            </div>
                            <div class="col-12 my-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree_updates" id="agreeCheck" checked>
                                    <label class="form-check-label text-muted" for="agreeCheck" style="font-size: 0.78rem;">
                                        I agree to receive updates & offers from Mega Modular Industries.
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-submit-quote">
                                    SUBMIT & GET QUOTATION <i class="fa-solid fa-arrow-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center my-3">
                        <span class="text-muted fw-bold" style="font-size: 0.75rem;">OR</span>
                    </div>

                    <div class="whatsapp-box">
                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-brands fa-whatsapp text-success fs-3"></i>
                            <div>
                                <h6 class="fw-bold mb-0" style="font-size: 0.85rem;">GET QUOTATION ON WHATSAPP</h6>
                                <span class="text-muted" style="font-size: 0.75rem;">Click to send your selection details on WhatsApp</span>
                            </div>
                        </div>
                        <a href="#" class="btn-whatsapp"><i class="fa-brands fa-whatsapp"></i> CHAT ON WHATSAPP</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentBasePrice = 245000;
        let currentAreaMultiplier = 1.0;

        const layoutCards = document.querySelectorAll('.get-quotation-section .option-card[data-layout]');
        const areaCards = document.querySelectorAll('.get-quotation-section .area-card');
        const finishCards = document.querySelectorAll('.get-quotation-section .finish-card');
        const summaryLayout = document.getElementById('summaryLayout');
        const summaryArea = document.getElementById('summaryArea');
        const summaryFinish = document.getElementById('summaryFinish');
        const finalPriceDisplay = document.getElementById('finalPriceDisplay');
        const scrollToFormBtn = document.getElementById('scrollToForm');

        function updatePrice() {
            const total = Math.round(currentBasePrice * currentAreaMultiplier);
            const formatted = '₹ ' + total.toLocaleString('en-IN');
            finalPriceDisplay.textContent = formatted;
            document.getElementById('priceInput').value = formatted;
        }

        layoutCards.forEach(card => {
            card.addEventListener('click', function() {
                layoutCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const layoutValue = this.getAttribute('data-layout');
                currentBasePrice = parseInt(this.getAttribute('data-baseprice'), 10);
                summaryLayout.textContent = layoutValue;
                document.getElementById('layoutInput').value = layoutValue;
                updatePrice();
            });
        });

        areaCards.forEach(card => {
            card.addEventListener('click', function() {
                areaCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const areaValue = this.getAttribute('data-area');
                currentAreaMultiplier = parseFloat(this.getAttribute('data-multiplier'));
                summaryArea.textContent = areaValue;
                document.getElementById('areaInput').value = areaValue;
                updatePrice();
            });
        });

        finishCards.forEach(card => {
            card.addEventListener('click', function() {
                finishCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                const finishValue = this.getAttribute('data-finish');
                summaryFinish.textContent = finishValue;
                document.getElementById('finishInput').value = finishValue;
            });
        });

        if (scrollToFormBtn) {
            scrollToFormBtn.addEventListener('click', function() {
                document.getElementById('quoteForm').scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        }

        updatePrice();
    });
</script>

<?php if ($mailStatus === 'success' || $mailStatus === 'error'): ?>
<div class="modal fade" id="quoteStatusModal" tabindex="-1" aria-labelledby="quoteStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteStatusModalLabel">Our expert will consult shortly</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">
                    <?php if ($mailStatus === 'success'): ?>
                        Your quotation request was sent successfully. We have received your selection details.
                    <?php else: ?>
                        Your request was received, but email delivery needs server mail setup.
                    <?php endif; ?>
                </p>
                <?php if ($mailMsg !== ''): ?>
                    <div class="alert alert-warning mb-0" role="alert"><?php echo htmlspecialchars($mailMsg, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('quoteStatusModal');
        if (!modalEl || typeof bootstrap === 'undefined') return;
        var modal = new bootstrap.Modal(modalEl);
        modal.show();
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3500);
    });
</script>
<?php endif; ?>

<?php include 'footer.php'; ?>
