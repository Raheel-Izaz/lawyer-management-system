<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lawyer</title>
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
    <!--Header  -->
    <?php
    include "header.php";
    ?>
    <!-- Header End -->

     <!-- our_loyers-start  -->
     <div class="our_loyers pt-5">
        <div class="container ">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-5">
                        <h3><?php
                         $l_cat = $_GET['l_cat'];
                        $select_specialty =mysqli_query($conn, "SELECT * FROM specialty 
                                                         WHERE specialty_id = $l_cat");
                        if(mysqli_num_rows($select_specialty) > 0){
                            while($row1 = mysqli_fetch_assoc($select_specialty)){
                                echo $row1['specialty']."yers";
                            }
                        }

                        ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                    $l_cat = $_GET['l_cat'];
                    $sql = "SELECT * FROM lawyers
                             LEFT JOIN city ON lawyers.lawyer_city = city.city_id
                             LEFT JOIN specialty ON lawyers.lawyer_specialty = specialty.specialty_id
                             WHERE specialty_id = $l_cat";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_loyers text-center">
                        <div class="thumb">
                            <img src="Admin/upload/<?php echo $row['lawyer_image'] ?>" alt="">
                        </div>
                        <h3><?php echo $row['lawyer_name'] ?></h3>
                        <span><?php echo $row['specialty'] ?></span>
                        
                            <ul>
                                <li><a href="lawyer-profile.php?lawyer_id=<?php echo$row['lawyer_id'] ?>"> <button class="boxed-btn4" >View Profile</button> </a></li>
                            </ul>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- our_loyers-end  -->

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