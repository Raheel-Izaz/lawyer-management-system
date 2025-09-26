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
    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="slider_area_inner slider_bg_1 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="single_slider">
                            <div class="slider_text">
                                <h3>High Quality Law <br>
                                    Advice and Support</h3>
                                <p>Leading Polish Lawyer in your city</p>
                                <a href="#" class="boxed-btn4 ">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area _start  -->
    <div class="about_area">
        <div class="opacity_icon d-none d-lg-block">
            <i class="flaticon-balance"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <div class="about_thumb">
                            <img src="img/about/1.png" alt="">
                        </div>
                        <h3>Finest And Strongest Law <br>
                            Firm Win The World</h3>
                        <p>There are many variations of passages of Lorem Ipsum <br> available, but the majority have
                            suffered alteration in <br> some form, by injected humour, or randomised words <br> which
                            don't look even slightly believable. </p>
                        <div class="signature">
                            <img src="img/about/signature.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <div class="about_thumb">
                            <div class="image_hover">
                                <div class="hover_inner">
                                    <h2>93%</h2>
                                    <span>Success Case</span>
                                </div>
                            </div>
                        </div>
                        <h3>About Lawyer Justice</h3>
                        <p>There are many variations of passages of Lorem Ipsum <br> available, but the majority have
                            suffered alteration in <br> some form, by injected humour, or randomised words <br> which
                            don't look even slightly believable. </p>
                        <div class="total_cases">
                            <div class="single_cases">
                                <h4>879</h4>
                                <p>Total Cases</p>
                            </div>
                            <div class="single_cases">
                                <h4>787</h4>
                                <p>Case Won</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area _end -->
    <!-- our_loyers-start  -->
    <div class="our_loyers">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-60">
                        <h3>Our Lawyers</h3>
                        <p>Many variations of passages of Lorem Ipsum available, but the majority have <br> suffered alteration in some.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM lawyers
                             LEFT JOIN city ON lawyers.lawyer_city = city.city_id
                             LEFT JOIN specialty ON lawyers.lawyer_specialty = specialty.specialty_id
                             ORDER BY lawyer_id DESC 
                             LIMIT 0,3";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="col-xl-4 col-sm-6 col-lg-4">
                            <div class="single_loyers text-center">
                                <div class="thumb">
                                    <img src="Admin/upload/<?php echo $row['lawyer_image'] ?>" alt="">
                                </div>
                                <h3><?php echo $row['lawyer_name'] ?></h3>
                                <span><?php echo $row['specialty'] ?></span>

                                <ul>
                                    <li><a href="lawyer-profile.php?lawyer_id=<?php echo $row['lawyer_id'] ?>"> <button class="boxed-btn4">View Profile</button> </a></li>
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

    <div class="container ">
        <h1 class="text-center mb-3">Search By Lawyer Specialty</h1>
        <div class="row">
            <?php
            $sql1 = "SELECT * FROM specialty";
            $query1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($query1) > 0) {
                while ($row1 = mysqli_fetch_assoc($query1)) {
            ?>
                    <div class="col-xl-3 col-sm-6 col-lg-3 p-0">
                        <div class="">
                            <div class="card-body ">
                                <a href="lawyer-category.php?l_cat=<?php echo $row1['specialty_id'] ?>">
                                    <h5 class="card-title boxed-btn px-2 py-4 " style="width: 15rem; font-size:20px ;"><?php echo $row1['specialty'] ?></h5>
                                </a>
                            </div>
                        </div>

                    </div>



            <?php
                }
            }
            ?>
        </div>

    </div>

    <!-- testmonial_area_start  -->
    <div class="testmonial_area testmonial_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_testmonial text-center">
                            <i class="flaticon-straight-quotes"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don't look even slightly believable. </p>
                            <div class="author_info d-flex justify-content-center align-items-center">
                                <div class="thumb">
                                    <img src="img/testmonial/smaill_thumb.png" alt="">
                                </div>
                                <span>- Millan Mirza</span>
                            </div>
                        </div>
                        <div class="single_testmonial text-center">
                            <i class="flaticon-straight-quotes"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don't look even slightly believable. </p>
                            <div class="author_info d-flex justify-content-center align-items-center">
                                <div class="thumb">
                                    <img src="img/testmonial/smaill_thumb.png" alt="">
                                </div>
                                <span>- Millan Mirza</span>
                            </div>
                        </div>
                        <div class="single_testmonial text-center">
                            <i class="flaticon-straight-quotes"></i>
                            <p>There are many variations of passages of Lorem Ipsum available, but the <br> majority have suffered alteration in some form, by injected humour, or <br> randomised words which don't look even slightly believable. </p>
                            <div class="author_info d-flex justify-content-center align-items-center">
                                <div class="thumb">
                                    <img src="img/testmonial/smaill_thumb.png" alt="">
                                </div>
                                <span>- Millan Mirza</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testmonial_area_end  -->
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

    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            // disableDaysOfWeek: [0, 0],
            //     icons: {
            //      rightIcon: '<span class="fa fa-caret-down"></span>'
            //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
        var timepicker = $('#timepicker').timepicker({
            format: 'HH.MM'
        });
    </script>

</body>

</html>