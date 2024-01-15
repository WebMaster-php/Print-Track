<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register - Print & Track</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/PrintAndTrack Icon FINAL.png" rel="icon">
  <link href="assets/img/PrintAndTrack Icon FINAL.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/toastr.min.css">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">
      <?php
       session_start();
        // Check if a session message is set
        if (isset($_SESSION['toastr_message'])) {
            $messageType = $_SESSION['toastr_message']['type'];
            $message = $_SESSION['toastr_message']['message'];
            // Display Toastr alert using JavaScript
            if ($messageType == 'error') {
                echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">';
                echo $message;
                echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">';
                echo $message;
                echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            // Clear the session message
            unset($_SESSION['toastr_message']);
        }
        ?>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                   <img src="assets/img/PrintAndTrack Logo FINAL.png" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="includes/signup_action.php" method="post" autocomplete="off">
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="userEmail" class="form-control" id="yourEmail" required autocomplete="off">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="userName" class="form-control" id="yourUsername" required autocomplete="off">
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>
                    <input type="hidden" id="payment-method-id" name="payment_method_id" />
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="userPassword" class="form-control" id="yourPassword" required autocomplete="off">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                        <label for="card-holder-name" class="form-label">Cardholder Name</label>
                        <input type="text" id="card-holder-name" name="card-holder-name" required class="form-control">

                        <label for="card-element" class="form-label">Credit or debit card</label>
                        <div id="card-element"></div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="signup">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="">Print&Track</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="../assets/css/js/toastr.min.js"></script> 
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="assets/js/stripe.js" defer></script>

</body>

</html>