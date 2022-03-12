<?php
$conn = new mysqli('localhost', 'root', '', 'gym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
if (isset($_GET['id_pt'])) {
    $query = "DELETE FROM trainer  WHERE trainer_id = '{$_GET['id_pt']}' ";

    mysqli_query($conn, $query);
    header("location: formquanliuser.php");
}
