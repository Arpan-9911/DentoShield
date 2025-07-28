<?php
session_start();
if(!isset($_SESSION['admin'])) {
  header('Location: index.php');
  exit();
}
include "../includes/db.php";

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
  $id = $_GET['id'];
  $query = "DELETE FROM products WHERE id = $id";
  $conn->query($query);
  header('Location: viewProducts.php');
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
        / VIEW PRODUCTS
      </h4>
    </div>
    <div class="mt-4">
      <?php
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="card p-2">
            <h4 class="m-0"><strong>Product:</strong> <?php echo $row['productName']; ?></h4>
            <p class="m-0"><strong>MRP:</strong> ₹<?php echo $row['price']; ?>/-</p>
            <!-- <p class="m-0"><strong>Short Description:</strong> <?php echo nl2br($row['shortDesc']); ?></p> -->
            <!-- <p class="m-0"><strong>Long Description:</strong> <?php echo nl2br($row['longDesc']); ?></p> -->
            <p class="m-0 fw-bold">Short Description:</p>
            <p class="m-0"><?php echo nl2br($row['shortDesc']); ?></p>
            <p class="m-0 fw-bold">Long Description:</p>
            <p class="m-0"><?php echo nl2br($row['longDesc']); ?></p>
            <p class="m-0"><strong>Amazon Link:</strong> <a href="<?php echo $row['amazon'] ?>"><?php echo $row['amazon']; ?></a></p>
            <p class="m-0"><strong>Flipkart Link:</strong> <a href="<?php echo $row['flipkart'] ?>"><?php echo $row['flipkart']; ?></a></p>
            <div class="mt-2 d-flex flex-wrap gap-2">
              <div>
                <p class="fw-bold mb-1">Main Image:</p>
                <div>
                  <img src="../assets/products/<?php echo $row['mainImage'] ?>" alt="Main Image" class="img-thumbnail height-120">
                </div>
              </div>
              <div>
                <p class="fw-bold mb-1">Supplementary Images:</p>
                <div class="d-flex flex-wrap gap-2">
                  <?php
                    $suppImages = [
                      $row['suppImage1'],
                      $row['suppImage2'],
                      $row['suppImage3'],
                      $row['suppImage4']
                    ]
                  ?>
                  <?php
                    foreach($suppImages as $suppImage) {
                      if(empty($suppImage)) {
                        continue;
                      }
                  ?>
                    <div>
                      <img src="../assets/products/<?php echo $suppImage; ?>" alt="Supplementary Image" class="img-thumbnail height-120">
                    </div>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="mt-2 d-flex gap-2">
              <a href="editProduct.php?id=<?php echo $row['id']; ?>" class="btn btn-primary px-4">Edit</a>
              <a href="?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger px-4">Delete</a>
            </div>
          </div>
      <?php
        }
      ?>
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    }); -->
  </script>
</body>
</html>