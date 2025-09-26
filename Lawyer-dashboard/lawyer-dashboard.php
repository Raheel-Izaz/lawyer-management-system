<?php
session_start();
if ($_SESSION['login'] == TRUE and $_SESSION['role'] == 'lawyer') {

    include("../database/connection.php");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lawyer Profile</title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <section class="lawyer-profile">
                    <div class="container py-5">
                        <div class="row">
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
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="../Admin/upload/<?php echo $row['lawyer_image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3"><?php echo $row['lawyer_name'] ?></h5>
                                        <p class="text-muted mb-1"><?php echo $row['specialty']?></p>
                                        <!-- <button type="button" class="boxed-btn ms-1 p-2">Message</button> -->
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
                                    </div>
                                </div>
                            </div>
                            <?php
                                }}
                            ?>
                        </div>
                    </div>
                </section>
    </body>

    </html>

<?php
} else {
    header("Location: ../login.php");
}
?>