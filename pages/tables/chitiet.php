<?php
$conn = new mysqli('localhost', 'root', '', 'gym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_POST['id_pt'])) {

    $query = "SELECT * FROM trainer where trainer_id = '{$_POST['id_pt']}'";

    $kq = mysqli_query($conn, $query);
    $trainer = [];
    while ($row  = mysqli_fetch_assoc($kq)) {
        $trainer[] = $row;
    }
    echo json_encode($trainer);
}

if (isset($_POST['id_mb'])) {

    $query = "SELECT * FROM member where member_id = '{$_POST['id_mb']}'";

    $kq = mysqli_query($conn, $query);
    $member = [];
    while ($row  = mysqli_fetch_assoc($kq)) {
        $member[] = $row;
    }
    echo json_encode($member);
}