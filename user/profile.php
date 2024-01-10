<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User / Profile - Print & Track</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  
  <!-- ======= Header ======= -->
  <?php session_start();
  include('header.php') ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
      <!-- ======= toaster ======= -->
      <?php include('alert.php') ?>
      <!-- End toaster -->
    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Vertical Form</h5>
              <?php
                if (true) {
                    include '../includes/db.php';
                    $sql = "SELECT * FROM users WHERE user_id=1";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $conn->close();
                }
              ?>
              <!-- Vertical Form -->
              <form class="row g-3" action="actions/profile_edit_action.php" method="post">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">User Name</label>
                  <input type="text" class="form-control" name="userName" value="<?php echo isset($row) ? $row['user_name'] : ''; ?>">
                  <input type="text" class="form-control" name="id" hidden value="<?php echo isset($row) ? 1 : ''; ?>">
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="userEmail" value="<?php echo isset($row) ? $row['user_email'] : ''; ?>">
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Password</label>
                  <input type="password" class="form-control" name="userPassword" value="<?php echo isset($row) ? $row['user_password'] : ''; ?>">
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Status</label>
                  <select class="form-select" name="userStatus" aria-label="Floating label select example">
                        <option selected>Select menu</option>
                        <option value="1" <?php if (isset($row) && $row['user_status'] == 1) { echo "selected"; } ?>>Active</option>
                        <option value="0" <?php if (isset($row) && $row['user_status'] == 0) { echo "selected"; } ?>>Inactive</option>
                      </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="update">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php') ?>
  <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>