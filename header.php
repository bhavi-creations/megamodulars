<!DOCTYPE html>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Modular Industries - Navbar</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/style.css">




</head>

<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg new-side-slider-navbar sticky-top">
        <div class="container-fluid px-lg-5">

            <!-- Logo -->
            <a class="brand-wrapper" href="#">
                <i class="fa-solid fa-sun brand-icon"></i>
                <div class="brand-text">
                    <span class="brand-title">MEGA MODULAR</span>
                    <span class="brand-subtitle">&mdash; INDUSTRIES &mdash;</span>
                </div>
            </a>

            <!-- Mobile Toggle Button (Opens Side Offcanvas) -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Offcanvas Slide Drawer -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title font-weight-bold" id="offcanvasNavbarLabel" style="color: var(--brand-brown);">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body align-items-center justify-content-end">
                    <!-- Menu Items -->
                    <ul class="navbar-nav me-lg-4 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " aria-current="page" href="about.php">About Us</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Directions</a>
                        </li> -->
                       
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Projects</a>
                        </li>

                         <li class="nav-item">
                            <a class="nav-link" href="get-quotation.php">Get Quotation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>

                    <!-- Phone Button -->
                    <div class="mt-3 mt-lg-0">
                        <a href="tel:+919000000000" class="btn-phone">
                            <i class="fa-solid fa-phone"></i>
                            <span>+91 90000 00000</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </nav>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Active State Switching Script -->
    <script>
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.navbar-nav .nav-link').forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>