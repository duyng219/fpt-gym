<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_GET['id_lp'])) {
    $query = "DELETE FROM class  WHERE class_id = '{$_GET['id_lp']}' ";

    mysqli_query($conn, $query);
    header("location: mdi.php");
}