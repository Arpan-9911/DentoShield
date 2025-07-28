<?php
session_start();

if(!isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy | Admin</title>
  <link rel="shortcut icon" href="../assets/Logo-mini.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
  <section class="min-vh-100 p-sm-5 p-3">
    <a href="logout.php" class="btn btn-danger logout">Logout</a>
    <div class="text-center mt-sm-0 mt-3">
      <img src="../assets/Logo.png" alt="Logo" width="300px">
    </div>
    <div class="text-center mt-md-4 mt-2">
      <h1 class="text-danger">ADMIN DASHBOARD</h1>
    </div>
    <div class="row mx-auto mt-md-5 mt-3 text-center">
      <div class="col-md-4 mb-3">
        <a href="manageBanner.php" class="card px-2 py-5 bg-dark-blue silver-shine text-decoration-none text-white" data-aos="fade-up">
          <div class="fs-3 py-md-5">MANAGE BANNER</div>
        </a>
      </div>
      <div class="col-md-4 mb-3">
        <a href="addProduct.php" class="card px-2 py-5 bg-dark-blue silver-shine text-decoration-none text-white" data-aos="fade-up">
          <div class="fs-3 py-md-5">ADD PRODUCT</div>
        </a>
      </div>
      <div class="col-md-4 mb-3">
        <a href="viewProducts.php" class="card px-2 py-5 bg-dark-blue silver-shine text-decoration-none text-white" data-aos="fade-up">
          <div class="fs-3 py-md-5">VIEW PRODUCTS</div>
        </a>
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