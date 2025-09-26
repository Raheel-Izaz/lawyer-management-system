<?php
    include "../database/connection.php";
    $decline = $_GET['decline'];
    $b_id = $_GET['b_id'];

    $sql ="UPDATE booking SET status = 'declined'
    WHERE `booking_id` = '{$b_id}'";

    $query = mysqli_query($conn,$sql);
    if($query){
        header("Location: booking.php");
    }
?>