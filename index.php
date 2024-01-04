<?php
session_start();
include 'config.php';

if (!isset($_SESSION['status'])) {
    header('Location: login.php');
    exit();
}

$status = $_SESSION['user'];

// Using prepared statement to prevent SQL injection
$sql = "SELECT * FROM admin WHERE email = ? OR phone = ?";
$stmt = mysqli_prepare($conn, $sql);

// To Check if the statement was prepared successfully
if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $status, $status);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $_SESSION['img'] = $img = $row['img'];
        // $personalstatus = $row['status'];
    } else {
        // Handle the case where no user is found
        header('Location: login.php');
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle errors if the statement couldn't be prepared
    echo "Internal server error. Please try again later.";
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Truth & Trust Academy</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="custom-columns.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- NAVBAR  -->
    <?php include 'nav.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- SIDEBAR  -->
      <?php include 'sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
              <p class="font-weight-normal mb-2 text-muted">
                <?php
                // Set the default timezone
                date_default_timezone_set('Africa/Lagos');

                // Get current month, date, and year
                $currentMonth = date('F');
                $currentDate = date('j');
                $currentYear = date('Y');

                // Display the result
                echo "Date: $currentMonth $currentDate, $currentYear";
                ?>
              </p>
            </div>
          </div>
          <div class="custom-row mt-3">
            <div class="col l12 m4 s12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Students</h4>
                  <h4 class="text-dark font-weight-bold mb-2">43,981</h4>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- FOOTER  -->
          <?php include 'footer.php' ?>

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>