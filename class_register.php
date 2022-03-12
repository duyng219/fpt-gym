<?php
require './my_db.php';
session_start();
$name = '';
$gender = '';
$email = '';
$phone = '';
$age = '';
$id = '';

if ($_SESSION['login']) {
    $id =  json_decode($_SESSION['member'])->member_id;
    $name = json_decode($_SESSION['member'])->name;
    $gender = json_decode($_SESSION['member'])->gender;
    $email = json_decode($_SESSION['member'])->email;
    $phone = json_decode($_SESSION['member'])->phone;
    $age = json_decode($_SESSION['member'])->age;
    $type = json_decode($_SESSION['member'])->type;   
}
global $conn;
connect_db();
//Tìm thông tin lớp học
$query =[];
$sql = "SELECT * FROM class ";
$result = array();
$query = mysqli_query($conn, $sql);
    if(!empty($query)){
        while($row = mysqli_fetch_assoc($query)){
            $result[]=$row;
        }
    }
// Lấy thông tin từ bảng Dăng ký join với bảng class
$sql5 = "SELECT * FROM classregistration cr JOIN class cl ON cl.class_id = cr.class_id
          WHERE cr.member_id = '$id'";
$result5 = array();
$query5= mysqli_query($conn, $sql5);
    if(!empty($query5)){
    while($row5 = mysqli_fetch_assoc($query5)){
          $result5[]=$row5;
        }
    }

function Error($message){
   // $message1 = "Lớp học này đã đăng ký rồi";
    echo "<script type='text/javascript'>alert('$message');</script>";  
    //header("location: member.php");
}

if (isset($_POST['class-register'])) {
    $class_id = $_POST['cf-class']; 


    $sql_time = "SELECT *  from class WHERE (SELECT start_time FROM classregistration cr JOIN class cl ON cl.class_id = cr.class_id
                  WHERE cr.member_id = '$id') = (SELECT start_time FROM class WHERE class_id = '$class_id')";
    $check_time = mysqli_query($conn, $sql_time);


    // Xem lớp đã được đăng ký trước chưa.
    $sql2 = "SELECT * FROM classregistration WHERE class_id = '$class_id' && member_id = '$id'";    
    $query2= mysqli_query($conn, $sql2);
    // Tìm giờ học của lớp đăng ký
    $sql4 = "SELECT start_time FROM class where class_id = '$class_id'";
    $query_time= mysqli_query($conn, $sql4);
    if(!empty($query_time)){
        while($row1 = mysqli_fetch_assoc($query_time)){
            $result1=$row1;
        }
    }
    //while ($row2 = mysqli_fetch_assoc($query_time)) {
      //  $time = $row2;
    //}
   
    if(mysqli_num_rows($query2) > 0){
        //echo 'Lớp học này đã đăng ký rồi';
        $message="Lớp học này đã đăng ký rồi";
        return Error($message);                     
        }
    if(mysqli_num_rows($query5) > 1){
        $message = "Chỉ được đăng ký tối đa 2 lớp";
        return Error($message); 
        }
    if(mysqli_num_rows($check_time) > 1){
        $message = "Đăng ký trùng giờ học";
        return Error($message); 
        }

    /* if($check > 0){       
         $sql4 = "DELETE * FROM classregistration WHERE class_id = '$class_id' && member_id ='$id'";
         $query4= mysqli_query($conn, $sql4);            
        } */
    else{       
        $sql3 = "INSERT INTO classregistration (member_id, class_id) VALUES ('$id','$class_id')";
        mysqli_query($conn, $sql3);
        //echo 'Bạn đã đăng ký thành công';  
        $message1 = "Bạn đã đăng ký thành công";
        echo "<script type='text/javascript'>alert('$message1');</script>";
        header("location: member.php");        
    } 
}
disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Class Registration</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">


 <!-- Modal -->
 <div >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Đăng ký lớp học</h3>                    
                    <button type="button" class="close" >
                       <a href="member.php"><span><h7> X </h7></span></a> 
                    </button>
                </div>
                <p><h7 class="modal-title">Chỉ được đăng ký tối đa 2 lớp và không trùng giờ</h7></p>
                <div class="modal-body">
                <form class="membership-form webform" name="form-register" role="form" action="class_register.php"
                        method="POST"> 
                    <table>
                        <tr><b>Họ tên học viên:</b>
                            <input type="text" class="form-control" name="cf-name" readonly value="<?php echo $name ?>">
                        </tr>                   
                                         
                        <tr><b>Giới tính:</b>
                            <input type="text" class="form-control" name="cf-gender" readonly value="<?php echo $gender ?>">
                        </tr>

                        <tr><b>Số điện thoại:</b>                  
                            <input type="text" class="form-control" name="cf-phone" readonly value="<?php echo $phone ?>">
                        </tr>
                        <tr><b>Email:</b>                  
                            <input type="text" class="form-control" name="cf-email" readonly value="<?php echo $email ?>">                            
                        </tr>

                        <tr><b>Giờ học đã đăng ký: </b> 
                        <?php foreach($result5 as $item){?>                 
                         <tr>                             
                             <input type="text" class="form-control" name="cf-time" readonly value="<?php echo $item['start_time'] ?>"> 
                        </tr>
                        <?php }?> 
                        <p></p> 
                        <tr><b>Chọn lớp học:</b> </tr>            
                
                        <select class="form-control" name="cf-class">                            
                            <?php foreach($result as $item){?>
                            <option value="<?php echo $item['class_id']?>">                                                     
                                Lớp: <?php echo $item['class_name']?> - Giờ học: <?php echo $item['start_time'] ?> 
                                - Ngày học: <?php echo $item['date_of_week']  ?>                             
                            </option> 
                            <?php }?>                                               
                        </select>    
                        <button type="submit" class="form-control" id="submit-button" 
                        name="class-register">Đăng ký lớp</button>

                        
                        </table>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</body>