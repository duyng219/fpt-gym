<?php
$conn = new mysqli('localhost','root','','gym') or die("Kết nối thất bại");
                        mysqli_query($conn,'SET NAMES UTF8');

                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $query ="delete from khachhang where maKH = '$id'";
                            mysqli_query($conn,$query) or die("Error");
                            header('location:formquanliuser.php'); 
                        }
?>