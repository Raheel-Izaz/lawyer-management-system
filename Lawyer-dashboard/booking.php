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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 pt-5">
                    <h3>Bookings</h3>
                    <?php
                    if ($_SESSION['role'] == 'lawyer') {
                        $sql = "SELECT * FROM booking
                    LEFT JOIN client ON booking.client_id = client.client_id
                    WHERE lawyer_id  = {$_SESSION['lawyer_id']}";
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
                                    <th>Client</th>
                                    <th>Status</th>
                                    <!-- <th>Accept</th>
                                            <th>Decline</th> -->
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <?php
                                        if (mysqli_num_rows($query) > 0) {
                                            if ($row['status'] == "pending") {
                                        ?>
                                                <td><?php echo $row['booking_id'] ?></td>
                                                <td><?php echo $row['booking_date'] ?></td>
                                                <td><?php echo $row['booking_description'] ?></td>
                                                <td><?php echo $row['client_name'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <table class="table table-secondary table-bordered">
                                                    <a href="accept.php?accept&b_id=<?php echo $row['booking_id'] ?>"> <button type="submit" class="btn btn-success">Accept</button> </a>
                                                    <a href="decline.php?decline&b_id=<?php echo $row['booking_id'] ?>"> <button type="submit" class="btn btn-danger">Decline</button> </a>
                                                </table>
                                            <?php
                                            } else {
                                            ?>
                                                <td><?php echo $row['booking_id'] ?></td>
                                                <td><?php echo $row['booking_date'] ?></td>
                                                <td><?php echo $row['booking_description'] ?></td>
                                                <td><?php echo $row['client_name'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                        <?php
                                            }
                                        } else {
                                            echo "<h1>No Bookings Yet</h1>";
                                        }
                                        ?>
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