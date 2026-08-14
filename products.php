<?php include 'header.php'; ?>



<!-- Project First Section -->
    <section class="project-first-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    
                    <!-- Breadcrumb Links -->
                    <div class="breadcrumb-text">
                        <a href="#">HOME</a>
                        <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
                        <span class="active-page">PROJECTS</span>
                    </div>

                    <!-- Main Section Title -->
                    <h1 class="banner-title">
                        Our Recent<br>
                        Projects
                    </h1>

                    <!-- Underline Accent -->
                    <div class="heading-line"></div>

                    <!-- Description -->
                    <p class="banner-desc">
                        Explore some of our completed modular kitchen and interior projects crafted with precision and passion.
                    </p>

                </div>
            </div>
        </div>

        <!-- Slider Navigation Dots (Matching Image Bottom Indicators) -->
        <!-- <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div> -->
    </section> 


<!-- Project Second Section -->
    <section class="project-second-section">
        <div class="container">
            
            <!-- Filter Tabs -->
            <div class="filter-nav">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="kitchens">Modular Kitchens</button>
                <button class="filter-btn" data-filter="wardrobes">Wardrobes</button>
                <button class="filter-btn" data-filter="tv-units">TV Units</button>
                <button class="filter-btn" data-filter="storage">Storage Solutions</button>
                <button class="filter-btn" data-filter="commercial">Commercial Interiors</button>
            </div>

            <!-- Projects Grid -->
            <div class="row g-4" id="projectsGrid">
                
                <!-- Project 1: Kitchen -->
                <div class="col-lg-4 col-md-6 project-col" data-category="kitchens">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="./assets/img/lshape.png" alt="Modern L-Shaped Kitchen" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Modern L-Shaped Kitchen</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Kukatpally, Hyderabad</span>
                                    <span><i class="fa-regular fa-square"></i> 120 sq.ft</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Project 2: Kitchen -->
                <div class="col-lg-4 col-md-6 project-col" data-category="kitchens">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="./assets/img/Premium U-Shaped Kitchen.png" alt="Premium U-Shaped Kitchen" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Premium U-Shaped Kitchen</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Miyapur, Hyderabad</span>
                                    <span><i class="fa-regular fa-square"></i> 150 sq.ft</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Project 3: Kitchen -->
                <div class="col-lg-4 col-md-6 project-col" data-category="kitchens">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="./assets/img/Elegant Straight Kitchen.png" alt="Elegant Straight Kitchen" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Elegant Straight Kitchen</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Gachibowli, Hyderabad</span>
                                    <span><i class="fa-regular fa-square"></i> 100 sq.ft</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Project 4: Wardrobes -->
                <div class="col-lg-4 col-md-6 project-col" data-category="wardrobes">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="./assets/img/Sliding Door Wardrobe.png" alt="Sliding Door Wardrobe" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Sliding Door Wardrobe</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Manikonda, Hyderabad</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Project 5: TV Units -->
                <div class="col-lg-4 col-md-6 project-col" data-category="tv-units">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="./assets/img/Contemporary TV Unit.png" alt="Contemporary TV Unit" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Contemporary TV Unit</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Kondapur, Hyderabad</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Project 6: Storage Solutions -->
                <div class="col-lg-4 col-md-6 project-col" data-category="storage">
                    <div class="project-card">
                        <div class="project-img-wrapper">
                            <img src="https://images.unsplash.com/photo-1595428774223-ef52624120d2?q=80&w=600&auto=format&fit=crop" alt="Smart Storage Solutions" class="project-img">
                        </div>
                        <div class="project-content">
                            <div>
                                <h6 class="project-title">Smart Storage Solutions</h6>
                                <div class="project-details">
                                    <span><i class="fa-solid fa-location-dot"></i> Nallagandla, Hyderabad</span>
                                </div>
                            </div>
                            <a href="#" class="action-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- View All Projects Button -->
            <!-- <div class="text-center margin-top-btn mt-5">
                <a href="#" class="view-all-btn">
                    VIEW ALL PROJECTS <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div> -->

        </div>
    </section>


<!-- Project Third Section -->
    <section class="project-third-section">
        <div class="container">
            
            <!-- Section Header -->
            <div class="text-center">
                <span class="section-subtitle">WHY CHOOSE US</span>
                <h2 class="section-title">Quality You Can See, Experience You Can Trust</h2>
                <div class="heading-line"></div>
            </div>

            <!-- 5 Features Grid Row -->
            <div class="row g-3">
                
                <!-- Feature 1 -->
                <div class="col-lg col-md-4 col-sm-6 col-divider">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-shield-check"></i>
                        </div>
                        <div>
                            <h6 class="feature-title">Premium Materials</h6>
                            <p class="feature-desc">We use only high-quality materials and hardware from trusted brands.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-lg col-md-4 col-sm-6 col-divider">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div>
                            <h6 class="feature-title">Precision Manufacturing</h6>
                            <p class="feature-desc">Advanced machinery and skilled workmanship for flawless finishes.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-lg col-md-4 col-sm-6 col-divider">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <div>
                            <h6 class="feature-title">Customized Designs</h6>
                            <p class="feature-desc">Every space is unique. We design as per your style, needs and budget.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-lg col-md-4 col-sm-6 col-divider">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-box-archive"></i>
                        </div>
                        <div>
                            <h6 class="feature-title">On-time Delivery</h6>
                            <p class="feature-desc">Committed to timelines with smooth execution and installation.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-lg col-md-4 col-sm-6">
                    <div class="feature-box">
                        <div class="feature-icon-wrapper">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div>
                            <h6 class="feature-title">After Sales Support</h6>
                            <p class="feature-desc">We are with you even after the project is completed.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Call To Action Banner -->
            <div class="cta-banner">
                <div class="row align-items-center g-4">
                    
                    <div class="col-lg-7 text-center text-lg-start">
                        <h3 class="cta-title">Ready to Build Your Dream Kitchen?</h3>
                        <p class="cta-desc">Get a free consultation and customized quotation today.</p>
                    </div>

                    <div class="col-lg-5 text-center text-lg-end">
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end gap-3">
                            <a href="get-quotation.php" class="btn-get-quote">
                                GET QUOTATION <i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <a href="contact.php" class="btn-talk-expert">
                                <i class="fa-solid fa-phone"></i> TALK TO EXPERT
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>





    <!-- Filter JS Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.project-second-section .filter-btn');
            const projectCols = document.querySelectorAll('.project-second-section .project-col');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    projectCols.forEach(col => {
                        const category = col.getAttribute('data-category');
                        
                        if (filterValue === 'all' || filterValue === category) {
                            col.classList.remove('hide');
                        } else {
                            col.classList.add('hide');
                        }
                    });
                });
            });
        });
    </script>


























<?php include 'footer.php'; ?>