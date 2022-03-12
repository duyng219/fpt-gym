<?php
session_start();
require './my_db.php';
connect_db();
$member = array();
$trainer = array();
// if (!isset($_SESSION['login'])) {
//     header("location: index.php");
// }
if (isset($_POST['submit-change'])) {
    //echo 'work';
    $id = $_POST['id'];
    $newPassword = $_POST['new-password'];
    $sql = "UPDATE member SET password ='$newPassword' WHERE member_id = '$id'";
    mysqli_query($conn, $sql);
    header("location: index.php");
}
if (isset($_POST['submit-trainer'])) {
    //echo 'work';
    $id = $_POST['id'];
    $newPassword = $_POST['new-password'];
    $sql = "UPDATE trainer SET password ='$newPassword' WHERE trainer_id = '$id'";
    mysqli_query($conn, $sql);
    header("location: index.php");
}
disconnect_db();