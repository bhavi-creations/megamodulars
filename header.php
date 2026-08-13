<!DOCTYPE html>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Modular Industries - Navbar</title>
    <link rel="stylesheet" href="./assets/style.css">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


 

</head>

<body>

    <header class="navbar-section">
        <div class="container-fluid container-lg">
            <nav class="navbar navbar-expand-lg p-0">

                <!-- Logo -->
                <a class="navbar-brand" href="index.php">
                    <!-- SVG Sun/M Icon matching original brand -->
                    <svg class="logo-icon" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 80V35L42 62L62 35V80" stroke="#69290e" stroke-width="12" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M42 12V22M20 20L27 27M64 20L57 27M8 42H18M76 42H66" stroke="#69290e" stroke-width="5" stroke-linecap="round" />
                    </svg>
                    <div class="logo-text">
                        <span class="brand-title">Mega Modular</span>
                        <span class="brand-subtitle">Industries</span>
                    </div>
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- Offcanvas Side Slide Menu -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title brand-title" id="offcanvasNavbarLabel">Mega Modular</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <!-- Navigation Links -->
                        <ul class="navbar-nav mx-auto align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link<?= $currentPage === 'index.php' ? ' active' : '' ?>" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?= $currentPage === 'about.php' ? ' active' : '' ?>" href="about.php">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?= $currentPage === 'products.php' ? ' active' : '' ?>" href="products.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?= $currentPage === 'get-quotation.php' ? ' active' : '' ?>" href="get-quotation.php">Get Quotation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?= $currentPage === 'contact.php' ? ' active' : '' ?>" href="contact.php">Contact</a>
                            </li>
                        </ul>

                        <!-- Right Call CTA Button -->
                        <div class="d-flex align-items-center">
                            <a href="tel:+919000000000" class="btn-call">
                                <i class="fa-solid fa-phone"></i> +91 90000 00000
                            </a>
                        </div>
                    </div>

                </div>

            </nav>
        </div>
    </header>