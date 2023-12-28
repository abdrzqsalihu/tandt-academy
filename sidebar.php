<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #632F85">
    <div class="user-profile">
        <div class="user-image">
            <!-- <img src="images/faces/face28.png"> -->
            <i class='bx bx-user mb-2' style='color:#ffffff; font-size:3.5rem'></i>
        </div>
        <div class="user-name">
            <?php echo $name ?>
        </div>
        <div class="user-designation">
            First Term 2023/2024
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">Classes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <?php
                    $sql = 'SELECT * FROM classes';
                    $querys = mysqli_query($conn, $sql);
                    $classes = mysqli_fetch_all($querys, MYSQLI_ASSOC);
                    mysqli_free_result($querys);
                    //  mysqli_close($conn);
                    ?>
                    <?php
                    foreach ($classes as $class) { ?>
                        <li class="nav-item"> <a class="nav-link" href="class.php?class=<?php echo $class['id']?>" style="font-size: 13px; margin-bottom:-8px; color:lightgray !important"><?php echo $class['classes'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="addstudent.php">
                <i class='menu-icon bx bx-book-add' style="font-size: 20px;"></i>
                <span class="menu-title">Register Student</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="settings.php">
                <i class='menu-icon bx bxs-cog' style="font-size: 20px;"></i>
                <span class="menu-title">Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class='menu-icon bx bx-log-in' style="font-size: 20px;"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>