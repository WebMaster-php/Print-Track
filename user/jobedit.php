<?php
  session_start();
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
      header('Location: ../login.php');
      exit();
  }
  $page="jobs";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Job - Print & Track</title>
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
  <?php include('header.php') ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Job Form</h1>
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
                  <h5 class="card-title text-center">Edit Job Form</h5>
                  <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                        include '../includes/db.php';
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM Jobs WHERE job_id=$id";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $conn->close();
                    }
                  ?>
                  <!-- Vertical Form -->
                  <form class="row g-3" action="actions/job_edit_action.php" method="POST">
                    <div class="col-6">
                      <label for="inputNanme4" class="form-label">Supplier</label>
                      <input type="hidden" name="id" value="<?php echo isset($row) ? $row['job_id'] : ''; ?>">
                      <input type="text" class="form-control" name="supplier" value="<?php echo isset($row) ? $row['supplier'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputEmail4" class="form-label">Customer</label>
                      <input type="text" class="form-control" name="customer" value="<?php echo isset($row) ? $row['customer'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Reference</label>
                      <input type="text" class="form-control" name="reference" value="<?php echo isset($row) ? $row['reference'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Invoice</label>
                      <input type="text" class="form-control" name="invoice" value="<?php echo isset($row) ? $row['invoice'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Consignment</label>
                      <input type="text" class="form-control" name="consignment" value="<?php echo isset($row) ? $row['consignment'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Notes</label>
                      <input type="text" class="form-control" name="notes" value="<?php echo isset($row) ? $row['notes'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Date In</label>
                      <input type="date" class="form-control" name="dateIn" value="<?php echo isset($row) ? $row['date_in'] : ''; ?>">
                    </div>
                    <div class="col-6">
                      <label for="inputPassword4" class="form-label">Date Out</label>
                      <input type="date" class="form-control" name="dateOut" value="<?php echo isset($row) ? $row['date_out'] : ''; ?>">
                    </div>
                    <div class="col-12">
                      <input class="form-check-input" type="radio" name="archieved" id="gridRadios1" value="0" <?php if (isset($row) && $row['archived'] == 0) { echo 'checked'; } ?>>
                      <label class="form-check-label" for="gridRadios1">
                      Archieved
                      </label>
                      <input class="form-check-input" type="radio" name="archieved" id="gridRadios1" value="1" <?php if (isset($row) && $row['archived'] == 1) { echo 'checked'; } ?>>
                      <label class="form-check-label" for="gridRadios1">
                      Unarchieved
                      </label>
                    </div>
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