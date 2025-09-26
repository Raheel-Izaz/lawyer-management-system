<?php
session_start();
if ($_SESSION['login'] == TRUE and  $_SESSION['client_role'] == 'user') {

    include("../database/connection.php");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookings</title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 pt-5">
                    <h3>Bookings</h3>
                    <?php
                    if($_SESSION['client_role'] == 'user'){
                        $sql = "SELECT * FROM booking
                        -- LEFT JOIN client ON booking.client_id = client.client_name
                        LEFT JOIN lawyers ON booking.lawyer_id = lawyers.lawyer_id
                        WHERE client_id = {$_SESSION['client_id']} ";
                    }
                    
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <table class="table table-secondary table-bordered">
                            <thead>
                                <tr>
                                    <th>Booking Id</th>
                                    <th>Booing Date</th>
                                    <th>Booing Description</th>
                                    <th>Lawyer Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['booking_id'] ?></td>
                                        <td><?php echo $row['booking_date'] ?></td>
                                        <td><?php echo $row['booking_description'] ?></td>
                                        <td><?php echo $row['lawyer_name'] ?></td>
                                        <td><?php echo $row['status'] ?></td>

                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    <?php } ?>
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