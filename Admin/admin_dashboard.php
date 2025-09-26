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
        <title>Admin</title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <div class="container pt-5">
        <h1 class="">Admin</h1>
        <table class="table table-secondary table-bordered">
            <thead>
                <tr>
                    <th>No.Lawyers</th>
                    <th>No.Users</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12</td>
                    <td>3</td>
                </tr>
            </tbody>
        </table>
        </div>
    </body>

    </html>

<?php
} else {
    header("Location: ../login.php");
}
?>