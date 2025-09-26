<?php
    include "../database/connection.php";
    $accept = $_GET['accept'];
    $b_id = $_GET['b_id'];

    $sql ="UPDATE booking SET status = 'approved'
    WHERE `booking_id` = '{$b_id}'";

    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: booking.php");
    }
?>