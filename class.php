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
            mysqli_free_result($students);
            ?>


            <div class="main-panel">
                <div class="content-wrapper">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <h5 style="font-weight: bold; margin-right: 10px;">Detail for <?php echo $class_name ?></h5>
                        <a href="addsubjects.php?class=<?php echo $class?>">
                        <button class="btn btn-dark">Add Subject</button>
                        </a>
                    </div>

                    <hr> <br>
                    <ul class="nav nav-tabs" id="myTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1">Subject</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">Broad Sheet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3">Student Details</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-2">
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
                                                    <tr>
                                                        <td>English Language - ENG</td>
                                                        <td>Mr Effong Friday</td>
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
                                                    <tr>
                                                        <td>MatheMatics - MAT</td>
                                                        <td>Mrs Chioma Effong</td>
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
                        <div class="tab-pane fade" id="tab2">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Student Performance</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>ENG</th>
                                                        <th>MAT</th>
                                                        <th>PHE</th>
                                                        <th>AGR</th>
                                                        <th>SEC</th>
                                                        <th>LIT</th>
                                                        <th>CIV</th>
                                                        <th>FRE</th>
                                                        <th>CCA</th>
                                                        <th>BSC</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
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