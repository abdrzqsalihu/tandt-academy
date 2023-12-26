<?php
session_start();
include 'config.php';

$user = "";
$password = "";
$errors = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['user'];
  $password = $_POST['password'];

  // Using prepared statement to prevent SQL injection
  $query = "SELECT * FROM admin WHERE email = ? OR phone = ? AND password = ?";
  $stmt = mysqli_prepare($conn, $query);

  // Check if the statement was prepared successfully
  if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "sss", $user, $user, $password);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if a row is returned
    if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['user'] = $user;
      $_SESSION['status'] = "Logged in";
      header('location: index.php');
      exit(); // Always exit after a header redirect
    } else {
      $errors = "Phone / Email / Password is Invalid";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    // Handle errors if the statement couldn't be prepared
    $errors = "Internal server error. Please try again later.";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Truth & Trust Academy</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-3 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <!-- <img src="../../images/logo-dark.svg" alt="logo"> -->
              </div>
              <p class="mb-4" style="text-align: center; color:red; font-size:16px; font-weight:bold"><?php echo $errors ?></p>
              <h4>Sign in to continue.</h4>
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->
              <form class="pt-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                  <input type="text" name="user" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Phone Number / Email Address">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" style="background-color: #632F85; border: none;">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>