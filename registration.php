<?php
require './my_db.php';
connect_db();

if (isset($_POST['phone_check'])) {
    $sql = "select *  from member where phone = '{$_POST['phone_check']}' ";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo 'Số điện thoại đã đăng kí';
    }
}
if (isset($_POST['mail_check'])) {
    $sql = "select *  from member where email = '{$_POST['mail_check']}' ";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo 'Email đã đăng kí';
    }
}
if (isset($_POST['username_check'])) {
    $sql = "select *  from member where username = '{$_POST['username_check']}' ";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        echo 'Tên đăng nhập đã tồn tại';
    }
}
if (isset($_POST['age_check'])) {
    
    $yob = explode('-',$_POST['age_check'])   ;
    $this_year = date("Y");
    $age = $this_year - $yob[0] - 1;   
    //echo $age; 
    if ($age <19) {
        echo 'Chưa đủ tuổi đăng ký ';
    }
}
if (isset($_POST['data-register'])) {
    $name = $_POST['cf-name'];
    $gender  = $_POST['cf-gender'];;
    $email  = $_POST['cf-email'];
    $phone  = $_POST['cf-phone'];
    //$age  = $_POST['cf-age'];
    $today = date("Y-m-d");
    $username  = $_POST['cf-username'];
    $password = $_POST['cf-password'];
    $sql = "INSERT INTO member (name, gender, email, phone, age, username, password, type, register_date, end_date )
            VALUES('$name','$gender','$email','$phone','$age','$username','$password','','$today','')";
    $query = mysqli_query($conn, $sql);
    header("location: index.php");
}
disconnect_db();
?>