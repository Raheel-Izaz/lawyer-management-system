<?php
session_start();
if ($_SESSION['login'] == TRUE and $_SESSION['admin_status'] == 'active') {

    include("../database/connection.php");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lawyers</title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>

        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12">
                    <h2>Profile</h2>
                    <?php
                    $sql = "SELECT * FROM lawyers
                             LEFT JOIN city ON lawyers.lawyer_city = city.city_id
                             LEFT JOIN specialty ON lawyers.lawyer_specialty = specialty.specialty_id";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <table class="table table-secondary table-bordered">
                            <thead>
                                <tr>
                                    <th>Lawyer Id</th>
                                    <th>Lawyer Name</th>
                                    <th>Lawyer Phone</th>
                                    <th>Lawyer Email</th>
                                    <th>Lawyer City</th>
                                    <th>Lawyer Specialty</th>
                                    <th>Lawyer Image</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['lawyer_id'] ?></td>
                                        <td><?php echo $row['lawyer_name'] ?></td>
                                        <td><?php echo $row['lawyer_phone'] ?></td>
                                        <td><?php echo $row['lawyer_email'] ?></td>
                                        <td><?php echo $row['city'] ?></td>
                                        <td><?php echo $row['specialty'] ?></td>
                                        <td>
                                            <img src="../Admin/upload/<?php echo $row['lawyer_image'] ?>" alt="" style="width: 100px; border-radius: 50%;" >
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("Location: ../login.php");
}
?>