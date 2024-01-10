<?php
  session_start();
  if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
      header('Location: ../login.php');
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Projects List - Print & Track</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

    <!-- Favicons -->
  <link href="../assets/img/PrintAndTrack Icon FINAL.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
      <h1>Projects List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Projects</li>
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
              <h5 class="card-title">Projects List </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Customer</th>
                    <th>Reference</th>
                    <th>Invoice</th>
                    <th>Date In</th>
                    <th>Date Out</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include '../includes/db.php';

                  $sql = "SELECT * FROM projects where archived = 0";
                  $result = $conn->query($sql);

                  // Check if there are rows
                  if ($result->num_rows > 0) {
                      // Fetch all rows as an associative array
                      $rows = $result->fetch_all(MYSQLI_ASSOC);

                      // Close the connection after fetching data
                      $conn->close();

                      foreach ($rows as $row):
                      ?>
                      <tr>
                          <td><?php echo $row['project_id']; ?></td>
                          <td><?php echo $row['supplier']; ?></td>
                          <td><?php echo $row['customer']; ?></td>
                          <td><?php echo $row['reference']; ?></td> 
                          <td><?php echo $row['invoice']; ?></td>
                          <td><?php echo $row['date_in']; ?></td>
                          <td><?php echo $row['date_out']; ?></td>
                    
                          <td>
                              <form action="actions/project_delete_action.php" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $row['project_id']; ?>">
                                  <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                  <a href="projectedit.php?id=<?php echo $row['project_id']; ?>" class="btn btn-warning">Edit</a>
                              </form>
                          </td>
                      </tr>
                      <?php endforeach;
                  } else {
                      echo "No records found";
                  }
                ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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