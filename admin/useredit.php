<?php
  session_start();
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
      header('Location: ../login.php');
      exit();
  }
  $page="users";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit User - Print & Track</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <!-- Favicons -->
  <link href="../assets/img/PrintAndTrack Icon FINAL.png" rel="icon">
  <link href="../assets/img/PrintAndTrack Icon FINAL.png" rel="apple-touch-icon">

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
  <?php include('header.php') ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit User Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Form</li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- ======= toaster ======= -->
    <?php include('alert.php') ?>
    <!-- End toaster -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8">
                  <h5 class="card-title text-center">Edit User Form</h5>
                  <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                        include '../includes/db.php';
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM users WHERE user_id=$id";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $conn->close();
                    }
                  ?>
                  <!-- Vertical Form -->
                  <form class="row g-3" action="actions/profile_edit_action.php" method="post">
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">User Name</label>
                      <input type="text" class="form-control" name="userName" value="<?php echo isset($row) ? $row['user_name'] : ''; ?>" required disabled>
                      <input type="text" class="form-control" name="id" hidden value="<?php echo isset($row) ? 1 : ''; ?>">
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Email</label>
                      <input type="email" class="form-control" name="userEmail" value="<?php echo isset($row) ? $row['user_email'] : ''; ?>" required disabled>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Business Name</label>
                      <input type="text" class="form-control" name="userBusinessName" value="<?php echo isset($row) ? $row['user_b_name'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Address</label>
                      <input type="text" class="form-control" name="userAddress" value="<?php echo isset($row) ? $row['user_address'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">State</label>
                      <input type="text" class="form-control" name="userState" value="<?php echo isset($row) ? $row['user_state'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Postcode</label>
                      <input type="text" class="form-control" name="userPostcode" value="<?php echo isset($row) ? $row['user_postcode'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputEmail4" class="form-label">Contact Number</label>
                      <input type="phone" class="form-control" name="userPhone" value="<?php echo isset($row) ? $row['user_phone'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputPassword4" class="form-label">Password</label>
                      <input type="password" min="8" max="10" class="form-control" name="userPassword" value="<?php echo isset($row) ? $row['user_password'] : ''; ?>" required>
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Status</label>
                      <select class="form-select" name="userStatus" aria-label="Floating label select example" requiredd>
                          <option value="" selected>Select menu</option>
                          <option value="1" <?php echo ($row['user_status'] == 1) ? 'selected' : ''; ?>>Active</option>
                          <option value="0" <?php echo ($row['user_status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
                      </select>

                    </div>
                    <!--  -->
                    <div class="text-center">
                      <button type="submit" class="btn btn-danger" name="update">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- Vertical Form -->
                </div>
              </div>
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