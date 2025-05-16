<?php
session_start();

if(!isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}

include "../includes/db.php";

// Add Updated Banner
if (isset($_POST['updateBanner'])) {
  $banner = $_FILES['banner']['name'];
  $banner_tmp = $_FILES['banner']['tmp_name'];

  // Get the current banner
  $fetchSql = "SELECT * FROM banner ORDER BY id DESC LIMIT 1";
  $fetchResult = mysqli_query($conn, $fetchSql);

  if (mysqli_num_rows($fetchResult) > 0) {
    $row = mysqli_fetch_assoc($fetchResult);
    $oldBanner = $row['banner'];
    $id = $row['id'];

    // Delete old banner file
    $oldPath = "../assets/banner/" . $oldBanner;
    if (file_exists($oldPath)) {
      unlink($oldPath);
    }

    // Update the banner field
    $banner = mysqli_real_escape_string($conn, $banner);
    $sql = "UPDATE banner SET banner = '$banner' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
  } else {
    // No previous row, insert new
    $banner = mysqli_real_escape_string($conn, $banner);
    $sql = "INSERT INTO banner (banner) VALUES ('$banner')";
    $result = mysqli_query($conn, $sql);
  }

  if ($result) {
    move_uploaded_file($banner_tmp, "../assets/banner/$banner");
    header('Location: manageBanner.php');
    exit();
  }
}

// Curernt Banner
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
        / MANAGE BANNER
      </h4>
    </div>
    <div class="row mt-md-5 mt-3">
      <div class="col-md-6">
        <h4>Current Banner</h4>
        <div class="border text-center">
          <img src="../assets/banner/<?php echo $row['banner']; ?>" alt="Current banner" height="250px" width="100%">
        </div>
      </div>
      <div class="col-md-6 ps-md-5 pt-md-0 pt-3">
        <h4>Update Banner</h4>
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" class="form-control" id="banner" name="banner">
          </div>
          <button type="submit" name="updateBanner" class="btn btn-primary">Update</button>
        </form>
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    }); -->
  </script>
</body>
</html>