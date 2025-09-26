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
        <title>Our Users</title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Our Users</h2>
                    <?php
                    $sql = "SELECT * FROM client";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <table class="table table-secondary table-bordered">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>User Phone</th>
                                    <th>User Email</th>
                                    <th>User City</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['client_id'] ?></td>
                                        <td><?php echo $row['client_name'] ?></td>
                                        <td><?php echo $row['client_phone'] ?></td>
                                        <td><?php echo $row['client_email'] ?></td>
                                        <td><?php echo $row['client_city'] ?></td>
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