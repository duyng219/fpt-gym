<?php
session_start();
require './my_db.php';
connect_db();
global $conn;
$trainer = array();
// if (!isset($_SESSION['login'])) {
//     header("location: index.php");
// }

if (isset($_POST['trainer-edit'])) {
    $id = $_POST['id'];
    $name = $_POST['cf-name'];
    $gender  = $_POST['cf-gender'];;
    //$email  = $_POST['cf-email'];
    $phone  = $_POST['cf-phone'];
    $age  = $_POST['cf-age'];
    $profile  = $_POST['cf-profile'];
    $sql1 = "UPDATE trainer SET trainer_name ='$name', gender = '$gender', phone = '$phone',age = '$age', pro_img = '$profile' 
             WHERE trainer_id = '$id'";
    $sql1_query = mysqli_query($conn, $sql1);
    $sql3 = "select * from trainer where trainer_id = '$id'";
    $sql3_query3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($sql3_query3) > 0) {
        $row1 = mysqli_fetch_assoc($sql3_query3);
        $trainer = $row1;
        $_SESSION['trainer'] = json_encode($trainer);
    }
    header("location: index.php");
}
disconnect_db();