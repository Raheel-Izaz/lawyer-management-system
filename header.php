 <?php
    session_start();
    include "database/connection.php";

    ?>
 <!-- header-start -->
 <header>
     <div class="header-area ">
         <div id="sticky-header" class="main-header-area">
             <div class="container-fluid p-0">
                 <div class="row align-items-center justify-content-between no-gutters">
                     <div class="col-xl-2 col-lg-2">
                         <div class="logo-img">
                             <a href="index.php">
                                 <img src="img/logo.png" alt="">
                             </a>
                         </div>
                     </div>
                     <div class="col-xl-7 col-lg-8">
                         <div class="main-menu  d-none d-lg-block">
                             <nav>
                                 <ul id="navigation">
                                     <li><a class="active" href="index.php">home</a></li>
                                     <li><a href="about.php">About</a></li>
                                     <li><a href="contact.php">Contact</a></li>
                                     <li><a href="lawyers.php">Lawyers</a></li>
                                     <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                         <ul class="submenu">
                                             <li><a href="elements.php">elements</a></li>
                                         </ul>
                                     </li> -->
                              
                     
                                 <?php if (isset($_SESSION['login']) && $_SESSION['login'] == TRUE) {
                                    if(isset($_SESSION['admin_id']) && $_SESSION['role'] == 'admin'){
                                        echo " <li><a href='Admin/admin_dashboard.php'>Dashboard</a></li>";
                                    }elseif(isset($_SESSION['lawyer_id']) && $_SESSION['role'] == 'lawyer'){
                                        echo " <li><a href='lawyer-dashboard/lawyer-dashboard.php'>Dashboard</a></li>";
                                    }
                                    else{
                                        echo " <li><a href='User-Dashboard/user_dashboard.php'>Dashboard</a></li>";
                                    }
                                    ?>
                                     <li><a href="logout.php" class="boxed-btn4" style="padding: 10px 25px;"> Logout</a></li>
                                 <?php
                                    } else {
                                    ?>
                                     <li class="mx-auto"><a href="login.php" class="boxed-btn4" style="padding: 10px 25px;">Login</a></li>
                                     <!-- <li><a href="#">Register <i class="ti-angle-down"></i></a>
                                         <ul class="submenu">
                                             <li><a href="lawyer_registration.php">As Lawyer</a></li>
                                             <li><a href="user-registration.php">As User</a></li>
                                         </ul>
                                     </li> -->
                                 <?php
                                    }
                                    ?>
                             </ul>
                             </nav>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="mobile_menu d-block d-lg-none"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- header-end -->