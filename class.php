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
        $_SESSION['status'] = $status = $row['status'];
        $password = $row['password'];
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
            $class = htmlspecialchars($_GET['class']);

            // GET CURRENT CLASS DB 
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
            $sqr = "SELECT * FROM students WHERE class = $class";
            $students = mysqli_query($conn, $sqr);
            $fetch_students = mysqli_fetch_all($students, MYSQLI_ASSOC);
            // mysqli_free_result($students);

            // SELECT SUBJECTS and Teachers from DB 
            $subject_and_teacher_sql = "SELECT * FROM $class_db";
            $subject_and_teachers = mysqli_query($conn, $subject_and_teacher_sql);
            $fetch_subject_and_teacher = mysqli_fetch_all($subject_and_teachers, MYSQLI_ASSOC);
            // mysqli_free_result($subject_and_teachers);
            ?>


            <div class="main-panel">
                <div class="content-wrapper">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold; margin-right: 10px;">Detail for <?php echo $class_name ?></h5>
                        <a href="addsubjects.php?class=<?php echo $class ?>">
                            <button class="btn btn-dark">Add Subject</button>
                        </a>
                    </div>

                    <hr> <br>

                    <?php  
                        if ($_SESSION['status'] !== 'SUPER_ADMIN') {
                            $activetab = 'active';
                            $showtab = 'show';
                        }else{
                            $activetab = '';
                            $showtab = '';
                        }
                    ?>
                    <ul class="nav nav-tabs" id="myTabs">
                        <?php if ($_SESSION['status'] == 'SUPER_ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Subject</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $activetab ?>" id="tab2-tab" data-toggle="tab" href="#tab2">Broad Sheet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3">Student Details</a>
                        </li>
                    </ul>



                    <div class="tab-content mt-2">
                        <?php if ($_SESSION['status'] == 'SUPER_ADMIN') { ?>
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Subject Details</h4>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Teacher</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($subject_and_teachers as $subject_and_teacher) { ?>
                                                            <tr>
                                                                <td><?php echo $subject_and_teacher['subject'] ?> - <?php echo $subject_and_teacher['subject_abr'] ?></td>
                                                                <td><?php echo $subject_and_teacher['subject_teacher'] ?></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-dark" type="button">
                                                                            Edit
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="tab-pane fade <?php echo $showtab . ' ' . $activetab; ?>" id="tab2">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student Performance</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <?php foreach ($subject_and_teachers as $subject_and_teacher) { ?>
                                                            <th><?php echo $subject_and_teacher['subject_abr'] ?></th>
                                                        <?php } ?>


                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Musa Dikko</td>
                                                        <?php foreach ($subject_and_teachers as $subject_and_teacher) { ?>
                                                            <td>
                                                                <?php $subject_and_teacher['id'] ?>
                                                                <p> <strong></strong></p>
                                                            </td>
                                                        <?php } ?>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Edit
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                    <button class="dropdown-item" type="button">Action</button>
                                                                    <button class="dropdown-item" type="button">Another action</button>
                                                                    <button class="dropdown-item" type="button">Something else here</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student Details</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Parent Email Number</th>
                                                        <th>Parent Phone Number</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($fetch_students as $student) { ?>
                                                        <tr>
                                                            <td><?php echo $student['fname'];
                                                                echo " ";
                                                                echo $student['lname'] ?></td>
                                                            <td><?php echo $student['email'] ?></td>
                                                            <td><?php echo $student['p_phone'] ?></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        Edit
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                        <button class="dropdown-item" type="button">Action</button>
                                                                        <button class="dropdown-item" type="button">Another action</button>
                                                                        <button class="dropdown-item" type="button">Something else here</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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