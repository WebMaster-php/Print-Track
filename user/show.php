<?php
  session_start();
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
      header('Location: ../login.php');
      exit();
  }
  $page="dashboard";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>jJob Details - Print & Track</title>
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
      <h1>Job Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Job Details</li>
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
              <h5 class="card-title text-center">Job Details </h5>

				<?php
				include '../includes/db.php';

				// Check if the ID parameter is set in the URL
				if (isset($_GET['id'])) {
				    $jobId = $_GET['id'];

				    // Fetch data for the specific job using the job ID
				    $sql = "SELECT * FROM jobs WHERE job_id = $jobId";
				    $result = $conn->query($sql);

				    if ($result->num_rows > 0) {
				        $row = $result->fetch_assoc();
				        // Display the details
				        ?>
				    <div>
			            <ul>
			                <li><strong>Supplier: </strong><?php echo $row['supplier']; ?></li>
			                <li><strong>Customer: </strong><?php echo $row['customer']; ?></li>
			                <li><strong>Reference: </strong><?php echo $row['reference']; ?></li>
			                <li><strong>Invoice: </strong><?php echo $row['invoice']; ?></li>
			                <li><strong>Date In: </strong><?php echo $row['date_in']; ?></li>
			                <li><strong>Date Out: </strong><?php echo $row['date_out']; ?></li>
			                <li><strong>Notes: </strong><?php echo $row['notes']; ?></li>
			                <li><strong>Consignment: </strong><?php echo $row['consignment']; ?></li>
			            </ul>
			        </div>
				<?php
				    } else {
				        echo "Job not found.";
				    }
				} else {
				    echo "Invalid request. Please provide a job ID.";
				}

				$conn->close();
				?>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>