<?php
include './includes/db.php';
$sql = "SELECT * FROM banner ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy</title>
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
        <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="index.php">Home</a></li>
        <li><a class="text-dark text-decoration-none" href="products.php">Products</a></li>
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
            <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="index.php">Home</a></li>
            <li><a class="text-dark text-decoration-none" href="products.php">Products</a></li>
            <li><a class="text-dark text-decoration-none" href="testimonials.php">Testimonials</a></li>
            <li><a class="text-dark text-decoration-none" href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <section class="banner min-vh-90">
    <img src="./assets/banner/<?php echo $row['banner']; ?>" alt="Banner" width="100%" class="vh-90">
    <!-- <img src="./assets/banner-small.jpg" alt="Banner" width="100%" class="d-md-none d-block"> -->
    <div class="banner-center">
      <h1 class="text-white fw-bold text-nowrap">Dento Shield</h1>
      <p class="text-white">Sharing the complete dental protection.</p>
      <div class="d-flex flex-column flex-md-row align-items-center gap-2">
        <a href="products.php" class="btn btn-outline-light mt-2 px-4 rounded-pill text-nowrap">VIEW PRODUCTS</a>
        <a href="./assets/brochure.pdf" class="btn btn-outline-light mt-2 px-4 rounded-pill text-nowrap" target="_blank">BROCHURE</a>
      </div>
    </div>
  </section>
  <section class="view-products p-sm-5 p-3">
    <p class="text-center mb-1 text-secondary">VIEW PRODUCTS</p>
    <h1 class="text-center mb-5">Dental Products</h1>
    <div class="container max-w-800">
      <div class="row">
        <div class="col-md-7 col-sm-6 mb-sm-0 mb-3 bg-light-pink p-0" data-aos="fade-up">
          <img src="./assets/home-image-1.jpeg" alt="Image1" width="100%"/>
          <div class="p-3">
            <h6>Whitening Solutions Available</h6>
            <p>Explore our range of effective dental products for brighter smiles.</p>
          </div>
        </div>
        <div class="col-md-5 col-sm-6 py-0 px-sm-3 px-0 d-flex flex-column justify-content-between gap-3">
          <div class="bg-light-pink" data-aos="fade-up">
            <img src="./assets/home-image-2.jpeg" alt="Image2" width="100%" height="150px"/>
            <h6 class="p-3">Oral Care Essentials</h6>
          </div>
          <div class="bg-light-pink" data-aos="fade-up">
            <img src="./assets/home-image-3.jpeg" alt="Image3" width="100%" height="150px"/>
            <h6 class="p-3">Healthier Teeth Today</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="products mt-5 p-sm-5">
      <p class="text-center mb-4 text-secondary">LATEST PRODUCTS</p>
      <div class="row">
        <h1 class="text-center text-danger">Products Coming Soon. Stay Tuned...</h1>

        <!-- <?php
        $sql2 = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
        $result2 = mysqli_query($conn, $sql2);
        while($rowProduct = mysqli_fetch_assoc($result2)) {
        ?>

        <div class="col-xl-3 col-lg-4 col-md-6 mb-4" data-aos="fade-up">
          <a href="productDetails.php?id=<?php echo $rowProduct['id']; ?>" class="card text-decoration-none text-dark border-2">
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
  <section class="customers container p-sm-5 p-3">
    <div class="row" data-aos="fade-up">
      <div class="col-sm-6">
        <h1>Welcome to DentoShield Pharmacy</h1>
      </div>
      <div class="col-sm-6">
        <p>Your trusted source for dental pharmacy products, showcasing the best in oral health care to keep your smile bright and healthy.</p>
        <div class="d-flex gap-3 mt-5">
          <div>
            <h1 class="text-primary">150+</h1>
            <p>Customer Satisfaction</p>
          </div>
          <div>
            <h1 class="text-primary">15</h1>
            <p>Trusted by Professionals</p>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5 shadow" data-aos="fade-up">
      <img src="./assets/home-customer-1.jpeg" alt="Customer banner" width="100%" class="rounded-3">
    </div>
  </section>
  <section class="reviews p-sm-5 p-3 bg-primary">
    <div id="controls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-white">
        <div class="carousel-item text-center active">
          <div class="max-w-500">
            <h4>★★★★★</h4>
            <p class="mt-2">Dentoshield has transformed my dental care routine! Their products are top-notch and the service is exceptional. Highly recommend for anyone seeking quality dental pharmacy items.</p>
            <h5 class="mt-5">Arpan Kumar</h5>
          </div>
        </div>
        <div class="carousel-item text-center">
          <div class="max-w-500">
            <h4>★★★★★</h4>
            <p class="mt-2">I've never experienced such reliable and fast delivery for dental products. Dentoshield is my go-to pharmacy now. Everything I ordered was genuine and professionally packed.</p>
            <h5 class="mt-5">Suryansh Bajpai</h5>
          </div>
        </div>
        <div class="carousel-item text-center">
          <div class="max-w-500">
            <h4>★★★★★</h4>
            <p class="mt-2">Excellent experience! Dentoshield not only offers premium dental products but also provides helpful guidance for usage. Truly a brand that cares about oral health.</p>
            <h5 class="mt-5">Shashwat V.</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#controls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#controls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
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