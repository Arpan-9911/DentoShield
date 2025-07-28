<?php
session_start();

if(!isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}

include "../includes/db.php";

// Adding Product
if (isset($_POST['addProduct'])) {
  $productName = $_POST['productName'];
  $price = $_POST['price'];
  $amazon = $_POST['amazon'];
  $flipkart = $_POST['flipkart'];
  $shortDesc = $_POST['shortDesc'];
  $longDesc = $_POST['longDesc'];

  // Main image
  $mainImage = $_FILES['mainImage']['name'] ?? '';
  $mainImage_tmp = $_FILES['mainImage']['tmp_name'] ?? '';

  // Supplementary images
  $suppImage1 = $_FILES['suppImage1']['name'] ?? '';
  $suppImage1_tmp = $_FILES['suppImage1']['tmp_name'] ?? '';

  $suppImage2 = $_FILES['suppImage2']['name'] ?? '';
  $suppImage2_tmp = $_FILES['suppImage2']['tmp_name'] ?? '';

  $suppImage3 = $_FILES['suppImage3']['name'] ?? '';
  $suppImage3_tmp = $_FILES['suppImage3']['tmp_name'] ?? '';

  $suppImage4 = $_FILES['suppImage4']['name'] ?? '';
  $suppImage4_tmp = $_FILES['suppImage4']['tmp_name'] ?? '';

  // SQL Insert
  $stmt = $conn->prepare("INSERT INTO products (productName, price, amazon, flipkart, shortDesc, longDesc, mainImage, suppImage1, suppImage2, suppImage3, suppImage4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sisssssssss", $productName, $price, $amazon, $flipkart, $shortDesc, $longDesc, $mainImage, $suppImage1, $suppImage2, $suppImage3, $suppImage4);
  $result = $stmt->execute();

  if ($result) {
    // Move uploaded files only if they exist
    if (!empty($mainImage_tmp)) {
      move_uploaded_file($mainImage_tmp, "../assets/products/$mainImage");
    }
    if (!empty($suppImage1_tmp)) {
      move_uploaded_file($suppImage1_tmp, "../assets/products/$suppImage1");
    }
    if (!empty($suppImage2_tmp)) {
      move_uploaded_file($suppImage2_tmp, "../assets/products/$suppImage2");
    }
    if (!empty($suppImage3_tmp)) {
      move_uploaded_file($suppImage3_tmp, "../assets/products/$suppImage3");
    }
    if (!empty($suppImage4_tmp)) {
      move_uploaded_file($suppImage4_tmp, "../assets/products/$suppImage4");
    }

    header('Location: addProduct.php');
    exit();
  }
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"> -->
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
      <h4 class="text-danger">
        <a href="dashboard.php" class="text-decoration-none">ADMIN DASHBOARD</a>
        / ADD PRODUCT
      </h4>
    </div>
    <form method="post" enctype="multipart/form-data" class="mt-md-5 mt-3">
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="input-group mb-3">
            <span class="input-group-text">Product</span>
            <input type="text" name="productName" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Price</span>
            <input type="number" name="price" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Amazon Link</span>
            <input type="text" name="amazon" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Flipkart Link</span>
            <input type="text" name="flipkart" class="form-control">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Short Desc</span>
            <textarea name="shortDesc" class="form-control" rows="2" required></textarea>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="input-group mb-3">
            <span class="input-group-text">Long Desc</span>
            <textarea name="longDesc" class="form-control" rows="11" required></textarea>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="mb-3">
            <h6 class="mb-1">Main Image</h6>
            <div class="input-group">
              <input type="file" name="mainImage" class="form-control" accept="image/*" required>
            </div>
          </div>
          <div class="mb-3">
            <h6 class="mb-1">Supplementary Images</h6>
            <div class="input-group mb-2">
              <input type="file" name="suppImage1" class="form-control" accept="image/*">
            </div>
            <div class="input-group mb-2">
              <input type="file" name="suppImage2" class="form-control" accept="image/*">
            </div>
            <div class="input-group mb-2">
              <input type="file" name="suppImage3" class="form-control" accept="image/*">
            </div>
            <div class="input-group mb-2">
              <input type="file" name="suppImage4" class="form-control" accept="image/*">
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" name="addProduct" class="btn btn-primary px-5">Add Product</button>
      </div>
    </form>
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    }); -->
  </script>
</body>
</html>