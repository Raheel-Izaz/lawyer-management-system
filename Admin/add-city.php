<?php
session_start();
if ($_SESSION['login'] == TRUE and $_SESSION['admin_status'] == 'active') {

    include("../database/connection.php");

    if(isset($_POST['add_city'])){
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        $sql = "INSERT INTO `city`(`city`) 
                        VALUES ('{$city}')";
        $query = mysqli_query($conn,$sql);

        if($query){
            header("Location: add-city.php");
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add City </title>
    </head>

    <body>
        <?php
        include "header.php";
        ?>
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6">
                <h3>Add City</h3>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" required>
                        </div>
                        <button type="submit" name="add_city" class="btn btn-primary">Add City</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Cities</h3>
                    <?php
                    $sql = "SELECT * FROM city ";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                    ?>
                        <table class="table table-secondary table-bordered">
                            <thead>
                                <tr>
                                    <th>City Id</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['city_id'] ?></td>
                                        <td><?php echo $row['city'] ?></td>
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