<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$sql_fb = "SELECT `feedback_reply` `member_id`, `content`,  FROM `feedback`;";
$query = mysqli_query($conn, $sql_fb);
$fb = array();
if(!empty($query)){
    while($row = mysqli_fetch_assoc($query)){
        $fb[]=$row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Xem FeedBack</title>
    <!-- Bootstrap CSS -->
    <link href="../../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/course.css">
    <link rel="stylesheet" href="../../css/submit.css">
</head>

<body>
    <div class="cotainer ml-5">
        <form name="addMB" method="POST">
            <p class="card-description">

            </p>
            <!-- <input type="text" name="id_mb" style="display: none;" id=""> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                        <h4> Mã FeedBack:<?php echo $fb['feedback_id']?></h4>
                        <p> Mã Khách Hàng:<?php echo $fb['member_id']?></p>
                        <p> Nội Dung:<?php echo $fb['content']?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class='submit__info'>
                <button class='submit__btn'><a href="feedbackAD.php">TRỞ LẠI </a></button>
                <button name='accept' class='submit__btn'>XÁC NHẬN</button>
            </div>
    </div>
    </form>
    </div>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/parallax.js"></script>
    <script src="../../js/wow.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/tab.js"></script>
</body>

</html>