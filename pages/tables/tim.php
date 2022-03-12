<?php
$conn = new mysqli('localhost', 'root', '', 'gym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_POST['s_mb'])) {
    $query = "SELECT * FROM member WHERE name LIKE '%{$_POST['s_mb']}%';";
    $query =  mysqli_query($conn, $query);
    $member = [];
    while ($row  = mysqli_fetch_assoc($query)) {
        $member[] = $row;
    }
    echo json_encode($member);
}

if (isset($_POST['s_pt'])) {
    $query = "SELECT * FROM trainer WHERE name LIKE '%{$_POST['s_pt']}%';";
    $query =  mysqli_query($conn, $query);
    $member = [];
    while ($row  = mysqli_fetch_assoc($query)) {
        $member[] = $row;
    }
    echo json_encode($member);
}