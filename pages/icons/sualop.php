<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$sql_trainer = "SELECT trainer_id, trainer_name FROM trainer;";
$query = mysqli_query($conn, $sql_trainer);
$trainer = [];
while ($row  = mysqli_fetch_assoc($query)) {
    $trainer[] = $row;
}

$class = [];
if (isset($_GET['id_lp'])) {
    $sql_class = "SELECT * FROM class WHERE class_id = '{$_GET['id_lp']}'";
    $query = mysqli_query($conn, $sql_class);
    $class = mysqli_fetch_assoc($query);
} else {
    header("location: mdi.php");
}
$error  = [];
if (isset($_POST['accept'])) {

    $sql_check1 = "SELECT * FROM `class` WHERE trainer_id = '{$_POST['pt']}' AND date_of_week = '{$_POST['ngay']}' AND start_time = '{$_POST['tg_bd']}' ;";
    $query_check1 = mysqli_query($conn, $sql_check1);
    $sql_check2 = "SELECT * FROM `class` WHERE room = '{$_POST['phong']}' AND start_time = '{$_POST['tg_bd']}' ;";
    $query_check2 = mysqli_query($conn, $sql_check2);
    // $sql_check3 = "SELECT * FROM `class` WHERE trainer_id  = '{$_POST['pt']}' AND class_name  = '{$_POST['tenlop']}' AND start_time = '{$_POST['tg_bd']}' ;";
    // $query_check3 = mysqli_query($conn, $sql_check3);



    // $sql_check1 = "SELECT * FROM `class` WHERE trainer_id = '{$_POST['pt']}' AND date_of_week = '{$_POST['ngay']}' AND start_time = '{$_POST['tg_bd']}' ;";
    // $query_check1 = mysqli_query($conn, $sql_check1);

    if ($_POST['pt'] != "" && $_POST['ngay'] != "" && $_POST['tg_bd'] != "" && $query_check1->num_rows > 0) {
        $error['trunggio'] = 'trùng giờ';
    }
    if ($_POST['tenlop'] != "" && $_POST['phong'] != "" && $_POST['tg_bd'] != "" && $query_check2->num_rows > 0) {
        $error['trungphong'] = 'trùng phòng';
    }
    // if ($_POST['tenlop'] != "" && $_POST['pt'] != "" && $_POST['tg_bd'] != "" && $query_check3->num_rows > 0) {
    //     $error['trungpt'] = 'trùng lớp';
    // }


    if ($_POST['tenlop'] == "") {
        $error['tenlop'] = 'tên lớp không được rỗng';
    }



    if ($_POST['phong'] == "") {
        $error['phong'] = 'phòng không được rỗng';
    }

    if ($_POST['ngay'] == "") {
        $error['ngay'] = 'ngày không được rỗng';
    }

    if ($_POST['tg_bd'] == "") {
        $error['tg_bd'] = 'thời gian bắt đầu không được rỗng';
    }
    if ($_POST['tg_kt'] == "") {
        $error['tg_kt'] = 'thời gian kết thúc không được rỗng';
    }
    if ($_POST['ngay_bd'] == "") {
        $error['ngay_bd'] = 'ngày bắt đầu không được rỗng';
    }
    if ($_POST['ngay_kt'] == "") {
        $error['ngay_kt'] = 'ngày kết thúc không được rỗng';
    }
    if ($_POST['ngay_kt'] <= $_POST['ngay_bd']) {
        $error['ngay_kt'] = 'ngày kết thúc lớn hơn ngày bắt đầu';
    }
    if (count($error) == 0) {
        $query = "UPDATE `class` SET `trainer_id` = '{$_POST['pt']}', `trainer_name` = (SELECT `trainer_name` FROM `trainer` WHERE `trainer_id` = '{$_POST['pt']}'), `class_name` = '{$_POST['tenlop']}', `room` = '{$_POST['phong']}' , `date_of_week` = '{$_POST['ngay']}', `start_time` = '{$_POST['tg_bd']}', `end_time` = '{$_POST['tg_kt']}' , `start_date` = '{$_POST['ngay_bd']}' , `end_date` = '{$_POST['ngay_kt']}' WHERE `class_id` = '{$_GET['id_lp']}' ";
        mysqli_query($conn, $query);
        header("location: mdi.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thay đổi thông tin lớp</title>
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
            <p></p>
            <h2 class="card-description">Form thay đổi Thông tin lớp</h2>
            <!-- <input type="text" name="id_mb" style="display: none;" id=""> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for=""><b>Tên lớp</b></label>
                            <input name="tenlop" type="text" class="form-control" readonly
                                value="<?= $class['class_name'] ?>" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tenlop'] = $error['tenlop'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <b><label for="">Huấn luyện viên</label></b>
                            <select class="form-control" name="pt" value="<?= $class['trainer_id'] ?>">
                                <?php foreach ($trainer as  $value) {
                                ?>
                                <option value="<?= $value['trainer_id'] ?>"><?= $value['trainer_name'] ?></option>
                                <?php } ?>
                            </select>
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['trunggio'] = $error['trunggio'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Phòng</label>
                            <input name="phong" value="<?= $class['room'] ?>" type="text" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['phong'] = $error['phong'] ?? ''  ?><?= $error['trungphong'] = $error['trungphong'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input name="ngay_bd" readonly value="<?= $class['start_date'] ?>" type="date"
                                class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['ngay_bd'] = $error['ngay_bd'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày kết thúc</label>
                            <input name="ngay_kt" readonly value="<?= $class['end_date'] ?>" type="date"
                                class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['ngay_kt'] = $error['ngay_kt'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày trong tuần</label>
                            <input name="ngay" readonly value="<?= $class['date_of_week'] ?>" type="text"
                                class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['ngay'] = $error['ngay'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Thời gian bắt đầu</label>
                            <input type="time" readonly value="<?= $class['start_time'] ?>" name="tg_bd"
                                class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tg_bd'] = $error['tg_bd'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
                            <input type="time" readonly value="<?= $class['end_time'] ?>" name="tg_kt"
                                class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['end_time'] = $error['end_time'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class='submit__info'>
                <button class='submit__btn'><a href="mdi.php">TRỞ LẠI </a></button>
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