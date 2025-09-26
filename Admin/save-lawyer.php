<?php
include "../database/connection.php";

if (isset($_FILES['fileToUpload'])) {
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $explode = explode('.', $file_name);
    $file_ext = end($explode);
    $extensions = array("jpeg", "png", "jpg");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "This is not valid Formate Please Choose PNG, JPEG or JPG image formate";
    }
    if ($file_size > 6997153) {
        $errors[] = "Image size Should be 6mb or lower.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "upload/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$specialty = mysqli_real_escape_string($conn, $_POST['specialty']);

$sql = "INSERT INTO `lawyers`( `lawyer_name`, `lawyer_email`, `lawyer_phone`, `laywer_password`, 
                                `lawyer_specialty`, `lawyer_city`, `lawyer_image`, `role`) 
        VALUES ('{$name}','{$email}','{$phone}','{$password}','{$specialty}','{$city}','{$file_name}','lawyer')";
$query = mysqli_query($conn,$sql);
    if($query){
        header("Location: admin_dashboard.php");
    }
?>