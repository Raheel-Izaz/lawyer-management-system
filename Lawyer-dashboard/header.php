<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <title>Document</title>
</head>

<body>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_home"> <a href="../index.php"><button class="btn btn-primary">Home</button></a> </div>
            <?php
                            if ($_SESSION['role'] == 'lawyer') {
                             $sql = "SELECT * FROM lawyers
                             LEFT JOIN city ON lawyers.lawyer_city = city.city_id
                             LEFT JOIN specialty ON lawyers.lawyer_specialty = specialty.specialty_id
                             WHERE lawyer_id  = {$_SESSION['lawyer_id']}";
                            }
                                $query = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                            ?>
            <div class="header_img"> <img src="../Admin/upload/<?php echo $row['lawyer_image'] ?>" alt=""> </div>
            
            <?php
                                }}
                            ?>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin Dashboard</span> </a>
                    <div class="nav_list">
                        <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Profile</span> </a>
                        <a href="booking.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Bookings</span> </a>
                        
                    </div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <!-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> -->
        <!--Container Main end-->

        <script src="dashboard.js"></script>
    </body>

</html>