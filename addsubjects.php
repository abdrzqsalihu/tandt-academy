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





$class = htmlspecialchars($_GET['class']);

if ($class == 1) {
    $class_db = 'kg1_subjects';
} elseif ($class == 2) {
    $class_db = 'pre_nursery_subjects';
} elseif ($class == 3) {
    $class_db = 'nursery2_subjects';
} elseif ($class == 4) {
    $class_db = 'basic1_subjects';
} elseif ($class == 5) {
    $class_db = 'basic2_subjects';
} elseif ($class == 6) {
    $class_db = 'basic3_subjects';
} elseif ($class == 7) {
    $class_db = 'basic4_subjects';
} elseif ($class == 8) {
    $class_db = 'basic5_subjects';
} elseif ($class == 9) {
    $class_db = 'jss1_subjects';
} elseif ($class == 10) {
    $class_db = 'jss2_subjects';
} elseif ($class == 11) {
    $class_db = 'jss3_subjects';
} elseif ($class == 12) {
    $class_db = 'sss1_subjects';
} elseif ($class == 13) {
    $class_db = 'sss2_subjects';
} elseif ($class == 14) {
    $class_db = 'sss3_subjects';
} else {
}


 

// CLASS SQL query
$class_sql = "SELECT classes FROM classes WHERE id = $class";
$class_result = $conn->query($class_sql);

// Check if the query was successful
if ($class_result->num_rows > 0) {
    // Output data of the first row
    $class_row = $class_result->fetch_assoc();
    $class_name = $class_row["classes"];
} else {
    echo "";
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
             
            $sname = "";
            $sabbr = "";
            $s_teacher = "";
            if (isset($_POST['submit'])) {
                // Sanitize and validate input rigorously
                $class_id = filter_input(INPUT_POST, 'class_id', FILTER_UNSAFE_RAW);
                $db = filter_input(INPUT_POST, 'class_db', FILTER_UNSAFE_RAW);
                $sname = filter_input(INPUT_POST, 'sname', FILTER_UNSAFE_RAW);
                $sabbr = filter_input(INPUT_POST, 'sabbr', FILTER_UNSAFE_RAW);
                $s_teacher = filter_input(INPUT_POST, 's_teacher', FILTER_UNSAFE_RAW);

                // Prepare statement with error handling
                if ($stmt = mysqli_prepare($conn, "INSERT INTO $db (subject, subject_abr, subject_teacher) VALUES (?, ?, ?)")) {
                    mysqli_stmt_bind_param($stmt, "sss", $sname, $sabbr, $s_teacher);

                    // Execute query and handle potential errors
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<script>alert('Details Added Successfully!')</script>";
                        echo "<script>location.href='class.php?class={$class_id}';</script>";
                    } else {
                        echo "Error adding detail: " . mysqli_error($conn); // Provide specific error details
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
                                    <h1 class="card-title mb-4">Add Subject Details for <?php echo $class_name ?></h1>
                                    <form class="forms-sample" method="post" action="">
                                        <input type="hidden" name="class_id" value="<?php echo $_GET['class'] ?>">
                                        <input type="hidden" name="class_db" value="<?php echo $class_db?>">
                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            <input type="text" class="form-control" name="sname" value="<?php echo $sname ?>" placeholder="Subject Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Abbreviation (ALL CAPS)</label>
                                            <input type="text" class="form-control" name="sabbr" value="<?php echo $sabbr ?>" placeholder="Subject Abbreviation">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject Teacher</label>
                                            <input type="text" class="form-control" name="s_teacher" value="<?php echo $s_teacher ?>" placeholder="Subject Teacher">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mt-4 mr-2" style="width: 100%;">Submit</button>
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