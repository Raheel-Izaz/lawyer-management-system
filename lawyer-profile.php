<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lawyer Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <?php
    include "header.php";
    ?>
    <!-- bradcam_area_start  -->
    <div class="bradcam_area">
        <div class="bradcam_inner bradcam_bg_2 d-flex align-items-center m-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3><?php
                                $lawyer_id = $_GET['lawyer_id'];
                                $lawyer_name = mysqli_query($conn, "SELECT * FROM lawyers WHERE lawyer_id = 
                                    $lawyer_id");
                                if (mysqli_num_rows($lawyer_name)) {
                                    while ($l_name = mysqli_fetch_assoc($lawyer_name)) {
                                        echo $l_name['lawyer_name'];
                                    }
                                }
                                ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <section class="lawyer-profile">
        <div class="container py-5">
            <div class="row">
                <?php
                $lawyer_id = $_GET['lawyer_id'];
                $sql = "SELECT * FROM lawyers
                             LEFT JOIN city ON lawyers.lawyer_city = city.city_id
                             LEFT JOIN specialty ON lawyers.lawyer_specialty = specialty.specialty_id
                             LEFT JOIN client ON lawyers.lawyer_id = client.client_id
                             WHERE lawyer_id = $lawyer_id";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="Admin/upload/<?php echo $row['lawyer_image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $row['lawyer_name'] ?></h5>
                                    <p class="text-muted mb-1"><?php echo $row['specialty'] ?></p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['lawyer_name'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['lawyer_email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['lawyer_phone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Specialty</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['specialty'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">City</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['city'] ?></p>
                                        </div>
                                    </div>
                    <hr>
                    <div class="row">
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == TRUE) { ?>
                            <div class="col-sm-3">
                                <p class="mb-0">Query</p>
                            </div>
                            <div class="col-md-9">
                            <form action="add-booking.php" method="post" class="form-group">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="description" placeholder="Add Your Query" required></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input class="form-control" name="date" type="date" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input class="form-control" name="client_id" type="hidden" value="<?php echo $row['client_id']?>" required>
                                        <input class="form-control" name="lawyer_id" type="hidden" value="<?php echo $row['lawyer_id']?>" required>
                                    </div>
                                    <button type="submit" name="book-now" class="boxed-btn ms-1 p-2">Book Now</button>
                                    
                                </form>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="login.php">Login To Book Lawyer</a>
                        <?php
                        }
                        ?>
                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    include "footer.php"
    ?>

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

</body>

</html>