<?php
$conn = new mysqli('localhost', 'root', '', 'gym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_GET['id_mb'])) {
    $query = "DELETE FROM member  WHERE member_id = '{$_GET['id_mb']}'";
    mysqli_query($conn, $query);

    header("location: formquanliuser.php");
}