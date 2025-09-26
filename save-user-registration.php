<?php
if(isset($_POST['register'])){

    include "database/connection.php";
    
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);

    // include "send-user-mail.php";

    $sql = "INSERT INTO `client`( `client_name`, `client_phone`, `client_email`, `client_password`, `client_city`,
                                    `client_role`, `client_status`)
                    VALUES ('{$name}','{$phone}','{$email}','{$password}','{$city}','user','active')";
    $result = mysqli_query($conn,$sql);

    if($result){
        header("Location: User-Dashboard/user_dashboard.php");
    }

    
}
?>