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
        // $email = $row['email'];
        // $password = $row['password'];
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

            <?php
            $fname = ""; $lname = ""; $email = ""; $phone = ""; $class = ""; $password = ""; 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Sanitize and validate input rigorously
                $fname = filter_input(INPUT_POST, 'fname', FILTER_UNSAFE_RAW);
                $lname = filter_input(INPUT_POST, 'lname', FILTER_UNSAFE_RAW);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $phone = filter_input(INPUT_POST, 'phone', FILTER_UNSAFE_RAW);
                $class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
                $password = 12345;
                $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW), PASSWORD_DEFAULT); // Hash password

                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    die("Invalid email format"); // Exit with a clear error message
                }

                // Prepare statement with error handling
                if ($stmt = mysqli_prepare($conn, "INSERT INTO students (fname, lname, email, p_phone, class, password) VALUES (?, ?, ?, ?, ?, ?)")) {
                    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $phone, $class, $password);

                    // Execute query and handle potential errors
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('User Added Successfully!')</script>";
                        echo "<script>location.href='index.php'</script>";
                    } else {
                        echo "Error adding user: " . mysqli_error($conn); // Provide specific error details
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Internal server error. Please try again later.";
                }
            }
            ?>



            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="custom-row">
                        <div class="col l5 m6 s12 grid-margin stretch-card push-l3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Register Student</h4>
                                    <form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Email address</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Parent Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>" placeholder="Parent Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Select Class</label>
                                            <?php
                                            $sql = 'SELECT * FROM classes';
                                            $querys = mysqli_query($conn, $sql);
                                            $classes = mysqli_fetch_all($querys, MYSQLI_ASSOC);
                                            mysqli_free_result($querys);
                                            //  mysqli_close($conn);
                                            ?>
                                            <select class="form-control" id="exampleFormControlSelect2" name="class">
                                                <!-- <option value=""></option> -->
                                                <?php
                                                foreach ($classes as $class) { ?>
                                                    <option value="<?php echo $class['id'] ?>"><?php echo $class['classes'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>" placeholder="Password">
                                        </div> -->
                                        <!-- <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" onclick="ShowPassword()">
                                                Show Password
                                            </label>
                                        </div> -->
                                        <button type="submit" class="btn btn-primary mt-4 mr-2" style="width: 100%;">Submit</button>
                                    </form>
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



        <!-- SCRIPT TO REVEAL PASSWORD  -->
        <script>
            function ShowPassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <!-- base:js -->
        <script src="vendors/base/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <!-- End plugin js for this page -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <!-- End custom js for this page-->
</body>

</html>