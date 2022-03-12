<?php
require './my_db.php';
session_start();
$name = '';
$gender = '';
$email = '';
$phone = '';
$age = '';
$id = '';
$feedback = array();
/*
if ($_SESSION['login']) {
    $id =  json_decode($_SESSION['member'])->member_id;
    $name = json_decode($_SESSION['member'])->name;
    $gender = json_decode($_SESSION['member'])->gender;
    $email = json_decode($_SESSION['member'])->email;
    $phone = json_decode($_SESSION['member'])->phone;   
    $type = json_decode($_SESSION['member'])->type;   
} */
global $conn;
connect_db();

//Tìm thông tin Reply:

$sql = "SELECT * FROM feedback where feeback_id = '$id';";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $feedback[] = $row;
}
if(mysqli_num_rows($query) > 0){    
    $count = mysqli_num_rows($query);
}
if (isset($_POST['feedback'])) {
    $content = $_POST['cf-content']; 
    $reply = $_POST['cf-reply'];
    $sql1 = "INSERT INTO feedback (member_id, content) VALUES ('$id','$content')";
        mysqli_query($conn, $sql1);               
        header("location: member.php");        
    } 

disconnect_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Feedback Form</title>

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
                    <h3 class="modal-title">Thông tin phản hồi</h3>
                    <button type="button" class="close" >
                       <a href="member.php"><span><h7> X </h7></span></a> 
                    </button>
                </div>
                <p></p>
                <div class="modal-body">
                <form class="membership-form webform" name="form-feedback" role="form" action="feedback.php"
                        method="POST"> 
                    <table>
                        <tr><b>Họ tên học viên:</b>
                            <input type="text" class="form-control" name="cf-name" readonly value="<?php echo $name ?>">
                        </tr>                                                      
                        <tr><b>Số điện thoại:</b>                  
                            <input type="text" class="form-control" name="cf-phone" readonly value="<?php echo $phone ?>">
                        </tr>
                        <tr><b>Email:</b>                  
                            <input type="text" class="form-control" name="cf-email" readonly value="<?php echo $email ?>">                           
                        </tr>
                        <tr><b>Thông tin cần phản hồi:</b> </tr>            
                        <textarea class="form-control" rows="5" name="cf-content" placeholder="Nhập ý kiến phản hồi mới"></textarea>

                        <tr><b>Bạn có <?php echo $count ?> nội dung được trả lời:</b> </tr>   
                        <?php foreach($feedback as $item){?>                          
                        <textarea class="form-control" rows="5" readonly value= "" ><?php echo $item['reply']?></textarea>                        
                        <?php }?>
                        <button type="submit" class="form-control" id="submit" 
                        name="feedback">Gởi thông tin</button>                        
                        </table>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</body>