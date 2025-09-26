<?php
session_start();
if ($_SESSION['login'] == TRUE and $_SESSION['admin_status'] == 'active') {

    include("../database/connection.php");

    if (isset($_POST['add_specialty'])) {
        $specialty = mysqli_real_escape_string($conn, $_POST['specialty']);

        $sql = "INSERT INTO `specialty`(`specialty`) 
                        VALUES ('{$specialty}')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            header("Location: add-specialty.php");
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Specialty </title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                <h3 class="text-center">Add Lawyer Specialty</h3>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="mb-3">
                            <label for="specialty" class="form-label">Specialty</label>
                            <input type="text" name="specialty" class="form-control" id="specialty">
                        </div>
                        <button type="submit" name="add_specialty" class="btn btn-primary">Add Specialty</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Lawyer Specialty</h3>
                    <?php
                    $sql = "SELECT * FROM specialty ";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <table class="table table-secondary table-bordered">
                            <thead>
                                <tr>
                                    <th>Specialty Id</th>
                                    <th>Specialty</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['specialty_id'] ?></td>
                                        <td><?php echo $row['specialty'] ?></td>
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