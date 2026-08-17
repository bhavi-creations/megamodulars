<!DOCTYPE html>
<html lang="te">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About & Directions Section</title>
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons / FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Custom Style -->
  <link rel="stylesheet" href="style.css">

  <style>
    /* Color Theme Variables */
:root {
  --brand-color: #6a3219;       /* Deep Brown/Rust Color */
  --brand-hover: #502411;
  --text-dark: #222222;
  --text-muted: #555555;
  --bg-light: #fcfbfa;
}

.index-new-second-section {
  background-color: var(--bg-light);
  color: var(--text-dark);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.section-img {
  height: 420px;
  object-fit: cover;
}

.section-subtitle {
  color: var(--brand-color);
  font-weight: 700;
  font-size: 0.85rem;
  letter-spacing: 1px;
  text-transform: uppercase;
  display: block;
}

.section-title {
  font-family: Georgia, 'Times New Roman', Times, serif;
  font-weight: 700;
  font-size: 1.8rem;
  color: #1a1a1a;
  line-height: 1.25;
  margin-top: 5px;
}

.title-underline {
  width: 40px;
  height: 3px;
  background-color: var(--brand-color);
  margin-top: 8px;
  margin-bottom: 15px;
}

.section-desc {
  font-size: 0.92rem;
  color: var(--text-muted);
  line-height: 1.6;
}

.venture-text {
  font-size: 0.9rem;
  color: #333;
}

.venture-icon {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  border: 1.5px solid var(--brand-color);
  color: var(--brand-color);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
  font-weight: bold;
}

.text-brand {
  color: var(--brand-color);
}

.info-list {
  font-size: 0.92rem;
  color: var(--text-muted);
}

.info-icon {
  color: var(--brand-color);
  font-size: 1.1rem;
}

/* Custom Button */
.btn-custom {
  background-color: var(--brand-color);
  color: #ffffff;
  font-weight: 600;
  font-size: 0.82rem;
  padding: 10px 22px;
  border-radius: 6px;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  border: none;
}

.btn-custom:hover {
  background-color: var(--brand-hover);
  color: #ffffff;
}

/* Middle Line Divider & Location Pin Icon */
.divider-wrapper {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  width: 100px;
  pointer-events: none;
}

.divider-line {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 50%;
  width: 1px;
  background-color: #e0d6d0;
  transform: translateX(-50%);
}

.divider-icon {
  width: 40px;
  height: 40px;
  background-color: var(--brand-color);
  color: #ffffff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  box-shadow: 0 0 0 4px #ffffff;
  position: relative;
  z-index: 3;
}

/* Responsive adjustments for Mobile/Tablet */
@media (max-width: 991px) {
  .divider-wrapper {
    position: relative;
    top: auto;
    bottom: auto;
    left: auto;
    transform: none;
    width: 100%;
    margin: 40px 0;
    height: 40px;
  }
  
  .divider-line {
    top: 50%;
    bottom: auto;
    left: 0;
    right: 0;
    width: 100%;
    height: 1px;
    transform: translateY(-50%);
  }

  .section-img {
    height: 300px;
  }
}
  </style>
</head>
<body>

<section class="index-new-second-section py-5">
  <div class="container position-relative">
    <div class="row align-items-center g-4 position-relative">
      
      <!-- Left Column: Image & About Us -->
      <div class="col-lg-6">
        <div class="row g-4 align-items-center">
          <!-- Interior Image -->
          <div class="col-md-5">
            <img src="./assets/img/kitchen-img.png"  class="img-fluid"
                 alt="Kitchen Interior" 
                 class="img-fluid rounded-4 shadow-sm section-img w-100 object-fit-cover">
          </div>
          <!-- About Us Details -->
          <div class="col-md-7">
            <span class="section-subtitle">ABOUT US</span>
            <h2 class="section-title">Crafted with Precision.<br>Built for a Lifetime.</h2>
            <div class="title-underline"></div>
            
            <p class="section-desc mt-3">
              Mega Modular Industries specializes in designing, manufacturing and installing premium modular kitchens and furniture that blend functionality with elegance. Backed by advanced technology and skilled craftsmanship, we deliver spaces that reflect your style and stand the test of time.
            </p>
            
            <div class="venture-text d-flex align-items-center mb-4">
              <span class="venture-icon me-2">N</span>
              <span>A venture of <strong class="text-brand">Nayan Groups</strong></span>
            </div>
            
            <a href="about.php" class="btn btn-custom">
              KNOW MORE <i class="fa-solid font-arrow-right ms-2 fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Center Divider with Location Pin Icon -->
      <div class="divider-wrapper">
        <div class="divider-line"></div>
        <div class="divider-icon">
          <i class="fa-solid fa-location-dot"></i>
        </div>
      </div>

      <!-- Right Column: Directions & Map -->
      <div class="col-lg-6 ps-lg-5">
        <div class="row g-4 align-items-center">
          <!-- Directions Text & Address -->
          <div class="col-md-7">
            <span class="section-subtitle">DIRECTIONS</span>
            <h2 class="section-title">Visit Our Experience<br>Center</h2>
            <div class="title-underline"></div>
            
            <ul class="list-unstyled info-list mt-3">
              <li class="d-flex align-items-start mb-3">
                <i class="fa-solid fa-location-dot info-icon me-3 mt-1"></i>
                <div>
                  <strong>Mega Modular Industries</strong><br>
                  Sy. No. 125/1, Industrial Area,<br>
                  Kukatpally, Hyderabad - 500072,<br>
                  Telangana, India.
                </div>
              </li>
              
              <li class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-phone info-icon me-3"></i>
                <div><strong>+91 90000 00000</strong></div>
              </li>
              
              <li class="d-flex align-items-start mb-4">
                <i class="fa-regular fa-clock info-icon me-3 mt-1"></i>
                <div>
                  Mon - Sat: 9:30 AM - 6:30 PM<br>
                  Sunday: Closed
                </div>
              </li>
            </ul>
            
            <a href="#" class="btn btn-custom">
              GET DIRECTIONS <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
          </div>

          <!-- Map Image Preview -->
          <div class="col-md-5">
            <div class="map-card p-2 bg-white rounded-3 shadow-sm border">
              <img src="https://share.google/KfGCrmmpmC9xsHZ6H" 
                   alt="Map Location" 
                   class="img-fluid rounded-2 w-100">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>