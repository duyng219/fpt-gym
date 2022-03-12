<?php
require './my_db.php';
session_start();
$name = '';
$gender = '';
$email = '';
$phone = '';
$age = '';
//$today1 = getdate();
$feedback = array();
$infor = array();

/*
if ($_SESSION['login']) {
    $member_id =  json_decode($_SESSION['member'])->member_id;
    $name = json_decode($_SESSION['member'])->name;
    $gender = json_decode($_SESSION['member'])->gender;
    $email = json_decode($_SESSION['member'])->email;
    $phone = json_decode($_SESSION['member'])->phone;
    $type = json_decode($_SESSION['member'])->type;
}  */
global $conn;
connect_db();
$id = $_GET['id_lp'];
if (isset($_GET['id_lp'])) {
    $sql = "SELECT * FROM feedback where feedback_id = '$id';";    
    $query = mysqli_query($conn, $sql);   
    while ($row = mysqli_fetch_assoc($query)) {
        $feedback[] = $row;
    }
    $sql2 = "SELECT * FROM feedback fb JOIN member mb ON fb.member_id = mb.member_id WHERE feedback_id = '$id'";
    $query_infor = mysqli_query($conn, $sql2);
    while ($row1 = mysqli_fetch_assoc($query_infor)) {
        $infor[] = $row1;
    }
    if (mysqli_num_rows($query) > 0) {
        $count = mysqli_num_rows($query);
    }
} else {
    header("location: mdi2.php");
}

// $id = $_POST['feedback'];
// if (isset($_POST['feedback'])) {
//     $reply = $_POST['cf-reply'];
//     $today = date('Y-m-d');
//     $sql1 = "INSERT INTO feedback (reply,reply_date) VALUES ('$reply','$today') WHERE feedback_id = '$id' ";
//     mysqli_query($conn, $sql1);
//     header("location: indexAD.php");
// }

// Trả lời thông tin feedback cho user
if (isset($_POST['enter'])) {
    // $content = $_POST['cf-content'];
    $id = $_GET['id_lp'];
    $reply = $_POST['cf-reply'];
    $today = date("Y-m-d");  
    //$id1 = (int)$id;
    //echo $today;
    $sql1 = "UPDATE feedback SET reply = '$reply', reply_date = '$today'"; // where feedback_id = '$id'" ;
    $query_sql = mysqli_query($conn, $sql1);
    header("location: indexAD.php");
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

</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">


    <!-- Modal -->
    <div>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Thông tin phản hồi</h3>
                    <button type="button" class="close">
                        <a href="member.php"><span>
                                <h7> X </h7>
                            </span></a>
                    </button>
                </div>
                <p></p>
                <div class="modal-body">
                    <form class="membership-form webform" name="form-feedback" role="form" action="feedback_Admin.php" method="POST">
                        <table>
                            <tr>
                           
                            <?php foreach ($infor as $item) { ?>
                                <p>Họ tên học viên:</p>                                
                                <input type="text" class="form-control" name="cf-name" readonly value="<?php echo $item['name'] ?>">                                
                            </tr>       
                                                
                            <tr>
                                <p>Số điện thoại:</p>
                                <input type="text" class="form-control" name="cf-phone" readonly value="<?php echo $item['phone'] ?>">
                            </tr>
                            <tr>
                                <p>Email:</p>
                                <input type="text" class="form-control" name="cf-email" readonly value="<?php echo $item['email'] ?>">
                            </tr>
                            <?php } ?>
                            <br>
                            <tr>
                                <p>Thông tin thành viên phản hồi:</p>
                                <?php foreach ($feedback as $item) { ?>
                                    <textarea class="form-control" rows="5" readonly value=""><?php echo $item['content'] ?></textarea>
                                <?php } ?>
                            <tr>
                                <p>Nội dung trả lời:</p>
                            </tr>
                            <textarea class="form-control" rows="5" name="cf-reply" placeholder="Nhập nội dung trả lời"></textarea>
                            <button type="submit" class="form-control" id="submit" name="enter" style="background-color:coral;">Gởi thông tin</button>
                           
                        </table>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</body>