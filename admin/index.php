<?php
session_start();

if(isset($_SESSION['admin'])) {
  header('Location: /admin/dashboard.php');
  exit();
}

include "../includes/db.php";
include "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// if(isset($_POST['sendOTP'])) {
//   $username = trim($_POST['username']);
//   $password = $_POST['password'];

//   $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
//   $stmt->bind_param("ss", $username, $password);
//   $stmt->execute();
//   $result = $stmt->get_result();

//   if($result->num_rows === 1) {
//     $_SESSION['admin'] = $username;
//     header('Location: /admin/dashboard.php');
//     exit();
//   } else {
//     $error = true;
//   }
// }.
if(isset($_POST['sendOTP'])) {
  $email = trim($_POST['email']);
  
  $smpt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
  $smpt->bind_param("s", $email);
  $smpt->execute();
  $result = $smpt->get_result();
  if($result->num_rows === 1) {
    $otp = rand(100000, 999999);
    $stmt = $conn->prepare("UPDATE admin SET otp = ? WHERE email = ?");
    $stmt->bind_param("ss", $otp, $email);
    $stmt->execute();
    $mail = new PHPMailer(true);
    try {
      //Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.hostinger.com';  
      $mail->SMTPAuth = true;          
      $mail->Username = 'amit.sharma@dentoshieldhealthcare.com';
      $mail->Password = 'Skamit@321#';
      $mail->SMTPSecure = 'ssl';                  
      $mail->Port = 465;

      $mail->setFrom('amit.sharma@dentoshieldhealthcare.com', 'DentoShield');
      $mail->addAddress($email, 'DentoShield');

      // Content
      $mail->isHTML(true);
      $mail->Subject = 'DentoShield | OTP';
      $mail->Body = 'Your OTP is '.$otp;

      $mail->send();
      $otpSent = $email;
      $otpExpire = time() + 300;
    } catch (Exception $e) {
      $errorMsg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  } else {
    $errorMsg = "Email not found";
  }
} else if(isset($_POST['verifyOTP'])) {
  $email = trim($_POST['email']);
  $otp = $_POST['otp'];
  $otpExpire = $_POST['otpExpire'];
  if(time() > $otpExpire) {
    $errorMsg = "OTP Expired";
  } else {
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND otp = ?");
    $stmt->bind_param("ss", $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 1) {
      $stmt = $conn->prepare("UPDATE admin SET otp = NULL WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $_SESSION['admin'] = $email;
      header('Location: /admin/dashboard.php');
      exit();
    } else {
      $errorMsg = "Invalid OTP";
    }
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
  <section class="login min-vh-100 p-sm-5 p-3 d-flex flex-column align-items-center justify-content-center gap-2">
    <div class="col-lg-10 col-12 p-5 d-flex gap-5 flex-md-row flex-column align-items-center justify-content-center bg-light">
      <div class="col-md-4 col-12 d-flex justify-content-center">
        <div class="max-w-400">
          <img src="../assets/Logo.png" alt="Login" class="w-100">
        </div>
      </div>
      <div class="col-md-4 col-12">
        <h1 class="text-danger mb-4">ADMIN LOGIN</h1>
        <?php if(isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo $errorMsg; ?></div>
        <?php } if(isset($otpSent)) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">OTP sent to your email.</div>
        <?php } ?>

        <?php if(isset($otpSent)) { ?>
          <form method="post" class="col-12">
            <input type="hidden" name="email" value="<?php echo $otpSent; ?>">
            <input type="hidden" name="otpExpire" value="<?php echo $otpExpire; ?>">
            <div class="mb-2">
              <label for="otp" class="form-label">OTP</label>
              <input type="number" class="form-control" name="otp" id="otp">
            </div>
            <button type="submit" name="verifyOTP" class="btn btn-dark mt-2 px-5 py-2 rounded-pill">VERIFY OTP</button>
          </form>
        <?php } else { ?>
          <form method="post" class="col-12 mt-4">
            <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <button type="submit" name="sendOTP" class="btn btn-dark mt-2 px-5 py-2 rounded-pill">SEND OTP</button>
          </form>
        <?php } ?>


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
  <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    }); -->
  </script>
</body>
</html>