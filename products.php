<?php
include './includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy | Products</title>
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
        <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="products.php">Products</a></li>
        <li><a class="text-dark text-decoration-none" href="testimonials.php">Testimonials</a></li>
        <li><a class="text-dark text-decoration-none" href="contact.php">Contact</a></li>
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
            <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="products.php">Products</a></li>
            <li><a class="text-dark text-decoration-none" href="testimonials.php">Testimonials</a></li>
            <li><a class="text-dark text-decoration-none" href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <section class="products min-vh-100 p-sm-5 p-3">
    <div class="p-sm-5 pt-sm-0">
      <h4 class="text-center text-secondary mb-4">OUR PRODUCTS</h4>
      <div class="row">
        <h1 class="text-center text-danger">Products Coming Soon. Stay Tuned...</h1>

        <!-- <?php
        $sql2 = "SELECT * FROM products ORDER BY id DESC";
        $result2 = mysqli_query($conn, $sql2);
        while($rowProduct = mysqli_fetch_assoc($result2)) {
        ?>

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4" data-aos="fade-up">
          <a href="productDetails.php?id=<?php echo $rowProduct['id']; ?>" class="card border-2 text-decoration-none text-dark">
            <div class="card-img-top">
              <img src="./assets/products/<?php echo $rowProduct['mainImage'] ?>" alt="<?php echo $rowProduct['productName'] ?>" height="250px" width="100%">
            </div>
            <div class="card-body">
              <h6 class="fw-bold mb-0"><?php echo $rowProduct['productName'] ?></h6>
              <p><?php echo $rowProduct['shortDesc'] ?></p>
              <div class="d-flex justify-content-between">
                <p class="mb-0 fw-bold">₹ <?php echo $rowProduct['price'] ?></p>
                <div class="mb-0">
                  <div class="d-flex align-items-center">
                    <div class="text-warning me-2">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <?php
        }
        ?> -->

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
        <p class="mb-0">9415366403</p>
        <p>amit.sharma@dentoshieldhealthcare.com</p>
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