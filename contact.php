<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$messageSent = false;
$errorMsg = "";

if (isset($_POST['contactBtn'])) {
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

    //Recipients
    $mail->setFrom('amit.sharma@dentoshieldhealthcare.com', $_POST['firstName'].' '.$_POST['lastName']);
    $mail->addAddress('amit.sharma@dentoshieldhealthcare.com', 'DentoShield');
    $mail->addReplyTo($_POST['email'], $_POST['firstName'].' '.$_POST['lastName']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = '
      <p><strong>DentoShield | Contact Form</strong></p>
      <p><strong>Name:</strong> '.$_POST['firstName'].' '.$_POST['lastName'].'</p>
      <p><strong>Email:</strong> '.$_POST['email'].'</p>
      <p><strong>Subject:</strong> '.$_POST['subject'].'</p>
      <p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($_POST['message'])) . '</p>
    ';

    $mail->send();
    $messageSent = true;
  } 
  catch (Exception $e) {
    $errorMsg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DentoShield | Your Trusted Dental Pharmacy | Contact Us</title>
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
        <li><a class="text-dark text-decoration-none" href="testimonials.php">Testimonials</a></li>
        <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="contact.php">Contact</a></li>
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
            <li><a class="text-dark text-decoration-none" href="testimonials.php">Testimonials</a></li>
            <li><a class="text-dark text-decoration-none border-bottom border-2 border-dark" href="contact.php">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <section class="contact min-vh-100 p-sm-5 p-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 p-0">
          <div class="contact-wrapper" data-aos="fade-up">
            <div class="row g-0">
              <div class="col-md-5">
                <div class="contact-info h-100">
                  <h3 class="mb-4">Get in touch</h3>
                  <p class="mb-4">We'd love to hear from you. Please fill out the form or contact us using the information below.</p>
                  <div class="contact-item">
                    <div class="contact-icon p-3">
                      <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">Address</h6>
                      <p class="mb-0">First Floor, 10, Akshar Upavan Society,<br>Opp. ST Bus Station, Dabhoi,<br>Dist. Vadodara - Gujarat - 391110</p>
                    </div>
                  </div>
                  <div class="contact-item">
                    <div class="contact-icon p-3">
                      <i class="fas fa-phone"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">Phone</h6>
                      <p class="mb-0">9415366403</p>
                    </div>
                  </div>
                  <div class="contact-item">
                    <div class="contact-icon p-3">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                      <h6 class="mb-0">Email</h6>
                      <p class="mb-0 text-break">amit.sharma@dentoshieldhealthcare.com</p>
                    </div>
                  </div>
                  <div class="social-links">
                    <h6 class="mb-3">Follow Us</h6>
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="contact-form">
                  <h3 class="mb-4">Send us a message</h3>

                  <?php if ($messageSent): ?>
                    <div class="alert alert-success">Thank you for your message. We'll get back to you soon!</div>
                  <?php elseif ($errorMsg): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($errorMsg) ?></div>
                  <?php endif; ?>

                  <form method="post">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="firstName" class="form-control" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lastName" class="form-control">
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Subject</label>
                      <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="mb-4">
                      <label class="form-label">Message</label>
                      <textarea class="form-control" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="contactBtn" class="btn btn-primary">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
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