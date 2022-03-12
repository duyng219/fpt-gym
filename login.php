<?php
require './my_db.php';
connect_db();
session_start();
header('Content-Type: text/html; charset=UTF-8');
$member = array();
$trainer = array();
$admin = array();
$feedback = array();
$msg = '';
if (isset($_POST['submit-login'])) {
    $username = addslashes($_POST['cf-username']);
    $password = addslashes($_POST['cf-password']);
    $sql_mb = "select * from member where username = '$username' and password = '$password'";
    $query_mb = mysqli_query($conn, $sql_mb);
    $sql_ad = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
    $query_ad = mysqli_query($conn, $sql_ad);
    $sql_pt = "SELECT  * FROM trainer WHERE username = '$username' and password = '$password'";
    $query_pt = mysqli_query($conn, $sql_pt);
}
    if (mysqli_num_rows($query_mb)>0) {
        $_SESSION['login'] = 'true';
        $row = mysqli_fetch_assoc($query_mb);
        $member = $row;
        $_SESSION['member'] = json_encode($member);        
        header("location: member.php");
    }

    if (mysqli_num_rows($query_pt)>0) {
        $_SESSION['login'] = 'true';
        $row = mysqli_fetch_assoc($query_pt);
        $trainer = $row;
        $_SESSION['trainer'] = json_encode($trainer);
        header("location: trainer.php");
    }


    if (mysqli_num_rows($query_ad) > 0) {
        $_SESSION['login'] = 'true';
        $row = mysqli_fetch_assoc($query_ad);
        $admin = $row;
        $_SESSION['admin'] = json_encode($admin); 
        //$_SESSION['member'] = json_encode($member);       
        header("location: indexAD.php");
    }
    else{       
        $message = "Không tìm thấy dữ liệu đăng nhập";
        echo "<script type='text/javascript'>alert('$message');</script>";  
        return;
    }

    // die();
    disconnect_db();
