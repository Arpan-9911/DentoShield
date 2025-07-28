<?php
if (!isset($_GET['id'])) {
  header('Location: products.php');
  exit();
}

$id = $_GET['id'];

include './includes/db.php';
$query = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($query);
if ($result->num_rows != 1) {
  header("Location: products.php");
  exit();
} else {
  $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy | Products Details</title>
  <link rel="shortcut icon" href="./assets/Logo-mini.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
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
  <!-- <section class="product min-vh-100 p-sm-5 p-3">
    <div class="p-sm-5">
      <div class="row">
        <div class="col-md-6">
          <div>
            <img src="./assets/products/<?php echo $row['mainImage'] ?>" alt="<?php echo $row['productName'] ?>" class="min-h-400">
          </div>
        </div>
        <div class="col-md-6 ps-md-3 pt-md-0 pt-3">
          <h1><?php echo $row['productName'] ?></h1>
          <p class="mb-4">₹ <?php echo $row['price'] ?></p>
          <p><?php echo $row['shortDesc'] ?></p>
          <p><?php echo $row['longDesc'] ?></p>
          <div class="mt-2">
            <a href="<?php echo $row['amazon']; ?>" class="text-decoration-none d-flex gap-2 align-items-center" target="_blank"><i class="fab fa-amazon fs-2"></i> Purchase from Amazon</a>
          </div>
          <div class="mt-2">
            <a href="<?php echo $row['flipkart']; ?>" class="text-decoration-none d-flex gap-2 align-items-center text-warning" target="_blank"><i class="fas fa-shopping-cart fs-2"></i> Purchase from Flipcart</a>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <h4 class="col-12 mb-3">More Images</h4>

        <?php
        $suppImages = [
          $row['suppImage1'],
          $row['suppImage2'],
          $row['suppImage3'],
          $row['suppImage4']
        ];

        foreach ($suppImages as $image) {
          if (!empty($image)) {
            echo '
              <div class="col-md-3 col-6 mb-3">
                <div>
                  <img src="./assets/products/' . htmlspecialchars($image) . '" alt="Product-Image" class="min-h-200">
                </div>
              </div>';
          }
        }
        ?>
      </div>
    </div>
  </section> -->
  <section>
    <div class="container min-vh-100 p-sm-5 p-3" data-aos="fade-up">
      <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
          <div class="card max-h-500">
            <img src="assets/products/<?php echo $row['mainImage'] ?>" class="card-img-top" alt="Product Image">
            <div class="card-body">
              <div class="row g-2">

                <?php
                  $suppImages = [
                    $row['suppImage1'],
                    $row['suppImage2'],
                    $row['suppImage3'],
                    $row['suppImage4']
                  ];
                  foreach ($suppImages as $image) {
                    if (!empty($image)) {
                      echo '
                        <div class="col-3">
                          <img src="./assets/products/' . htmlspecialchars($image) . '" alt="Product-Image" class="img-thumbnail h-100">
                        </div>';
                    }
                  }
                ?>

              </div>
            </div>
          </div>
        </div>
        <!-- Product Details -->
        <div class="col-md-6">
          <h1 class="h2 mb-3"><?php echo $row['productName'] ?></h1>
          <div class="mb-3">
            <span class="h4 me-2">₹ <?php echo $row['price'] ?></span>
          </div>
          <div class="mb-3">
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
          <p class="mb-2"><?php echo nl2br($row['shortDesc']) ?></p>
          <p class="mb-4"><?php echo nl2br($row['longDesc']) ?></p>
          <!-- Actions -->
          <div class="d-grid gap-2">
            <a href="<?php echo $row['amazon']; ?>" class="btn btn-primary" type="button">
              <i class="fab fa-amazon me-2"></i>Purchase from Amazon
            </a>
            <a href="<?php echo $row['flipkart']; ?>" class="btn btn-warning" type="button">
              <i class="fas fa-shopping-cart me-2"></i>Purchase from Flipkart
            </a>
          </div>
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