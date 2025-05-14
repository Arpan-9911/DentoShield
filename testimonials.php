<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy | Testimonials</title>
  <link rel="shortcut icon" href="./assets/Logo-mini.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <nav class="sticky-top bg-white border-bottom">
    <div class="text-center bg-danger py-1 fw-bold text-white">GRAB YOUR DENTAL ESSENTIALS HERE</div>
    <div class="d-flex justify-content-between align-items-center container-md p-2">
      <img src="./assets/Logo.png" alt="DentoShield" width="150px">

      <!-- Desktop Navbar -->
      <ul class="d-md-flex d-none list-unstyled gap-4">
        <li><a class="text-dark text-decoration-none" href="index.php">Home</a></li>
        <li><a class="text-dark text-decoration-none" href="products.php">Products</a></li>
        <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="testimonials.php">Testimonials</a></li>
      </ul>

      <!-- Mobile Navbar -->
      <button class="btn d-md-none d-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="offcanvas offcanvas-end d-md-none d-block bg-light-pink" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasLabel">
            <img src="./assets/Logo.png" alt="DentoShield" width="150px">
          </h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="list-unstyled d-flex flex-column gap-2">
            <li><a class="text-dark text-decoration-none" href="index.php">Home</a></li>
            <li><a class="text-dark text-decoration-none" href="products.php">Products</a></li>
            <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="testimonials.php">Testimonials</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <section class="testimonials min-vh-100 p-sm-5 p-3">
    <div>
      <div class="d-flex flex-md-row flex-column align-items-center justify-content-evenly" data-aos="fade-up">
        <div class="col-lg-4 col-md-6 col-sm-8 text-md-start text-center">
          <h1>Your Trusted Dental Pharmacy</h1>
          <p class="my-4">At Dentoshield, we provide a comprehensive showcase of dental pharmacy products to meet all your oral health needs with quality and care.</p>
          <a href="products.php" class="btn btn-dark mt-2 px-4 py-2 rounded-pill">VIEW PRODUCTS</a>
        </div>
        <div class="col-lg-4 col-md-6 col-8 mt-md-0 mt-4">
          <img src="./assets/testimonial-1.jpeg" alt="Testimonial" class="w-100 rounded-3 shadow">
        </div>
      </div>
      <div class="mt-5 d-flex flex-md-row flex-column-reverse align-items-center justify-content-evenly" data-aos="fade-up">
        <div class="col-lg-4 col-md-7 col-6 why-choose-us">
          <img src="./assets/testimonial-2.jpeg" alt="Testimonial" class="first-image">
          <img src="./assets/testimonial-3.jpeg" alt="Testimonial" class="second-image">
        </div>
        <div class="col-lg-4 col-md-5 col-sm-8 text-md-start text-center">
          <h1>Why Choose Us?</h1>
          <p class="my-4">Our commitment is to deliver exceptional dental products, ensuring customer satisfaction and promoting better oral health for everyone in our community.</p>
        </div>
      </div>
    </div>
  </section>
  <footer class="p-sm-5 p-3 text-white bg-dark-blue">
    <div class="d-flex flex-sm-row flex-column gap-3">
      <div class="col-sm-6">
        <h3 class="mb-4">CONNECT</h3>
        <p>Your trusted source for dental pharmacy products.</p>
        <div class="mt-5 d-sm-block d-none">
          <p class="mb-0">© <?php echo date("Y"); ?>. All rights reserved.</p>
          <p class="mb-0">Designed by - Arpan Kumar</p>
        </div>
      </div>
      <div class="col-sm-6">
        <h3 class="mb-4">SUPPORT</h3>
        <p class="mb-0">9383923983</p>
        <p>dentoshield@gmail.com</p>
        <p class="mb-0">First Floor, 10, Akshar Upavan Society,</p>
        <p class="mb-0">Opp. ST Bus Station, Dabhoi,</p>
        <p class="mb-0">Ta. Dabhoi, Dist. Vadodara - Gujarat - 391110</p>
      </div>
      <div class="mt-5 d-sm-none d-block">
        <p class="mb-0">© <?php echo date("Y"); ?>. All rights reserved.</p>
        <p class="mb-0">Designed by - Arpan Kumar</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>
</html>