<?php
    include "database/connection.php";
    if(isset($_POST['book-now'])){
        $date = mysqli_real_escape_string($conn,$_POST['date']);
        $description = mysqli_real_escape_string($conn,$_POST['description']);
        $client_id = mysqli_real_escape_string($conn,$_POST['client_id']);
        $lawyer_id = mysqli_real_escape_string($conn,$_POST['lawyer_id']);

        $sql = "INSERT INTO `booking`(`booking_date`, `booking_description`, `client_id`, `lawyer_id`) 
                            VALUES ('{$date}','{$description}','{$client_id}','{$lawyer_id}')";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("Location: User-Dashboard/user_dashboard.php");
        }
    }
?>