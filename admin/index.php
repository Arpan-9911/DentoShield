<?php
session_start();

if(isset($_SESSION['admin'])) {
  header('Location: /admin/dashboard.php');
  exit();
}

include "../includes/db.php";

if(isset($_POST['login'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows === 1) {
    $_SESSION['admin'] = $username;
    header('Location: /admin/dashboard.php');
    exit();
  } else {
    $error = true;
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
  <section class="login min-vh-100 p-sm-5 p-3 bg-light-pink d-flex flex-column align-items-center justify-content-center gap-2">

    <?php
    if(isset($error)) {
      echo '<div class="alert alert-warning alert-dismissible fade show col-md-6 col-12 border border-2 border-danger" role="alert">
              <strong>Invalid!</strong> Incorrect username or password.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <div class="col-12 d-flex gap-5 flex-md-row flex-column align-items-center justify-content-center">
      <div class="col-md-4 col-12">
        <div class="max-w-400">
          <img src="../assets/Logo.png" alt="Login" class="w-100">
        </div>
      </div>
      <div class="col-md-4 col-12">
        <h1 class="text-danger">ADMIN LOGIN</h1>
        <form method="post" class="col-12 mt-4">
          <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <button type="submit" name="login" class="btn btn-dark mt-2 px-5 py-2 rounded-pill">LOGIN</button>
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