<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$sql_trainer = "SELECT trainer_id, trainer_name FROM `trainer`;";
$query = mysqli_query($conn, $sql_trainer);
$trainer = [];
$error  = [];
while ($row  = mysqli_fetch_assoc($query)) {
    $trainer[] = $row;
}
$ngay0 = '';
$ngay1 = '';
$ngay2 = '';
$ngay3 = '';
$ngay4 = '';
$ngay5 = '';
$ngay6 = '';
if (isset($_POST['accept'])) {
    if (isset($_POST['ngay0'])) {
        $ngay0 = $_POST['ngay0'];
    }
    if (isset($_POST['ngay1'])) {
        $ngay1 = $_POST['ngay1'];
    }
    if (isset($_POST['ngay2'])) {
        $ngay2 = $_POST['ngay2'];
    }
    if (isset($_POST['ngay3'])) {
        $ngay3 = $_POST['ngay3'];
    }
    if (isset($_POST['ngay4'])) {
        $ngay4 = $_POST['ngay4'];
    }
    if (isset($_POST['ngay5'])) {
        $ngay5 = $_POST['ngay5'];
    }
    if (isset($_POST['ngay6'])) {
        $ngay6 = $_POST['ngay6'];
    }
    $ngay = $ngay0 . $ngay1 . $ngay2 . $ngay3 . $ngay4 . $ngay5 . $ngay6;
    $sql_trainer = "SELECT * FROM class WHERE class_name = '{$_POST['tenlop']}' ;";
    $query = mysqli_query($conn, $sql_trainer);
    $sql_check1 = "SELECT * FROM `class` WHERE trainer_id = '{$_POST['pt']}' AND date_of_week = '{$ngay}' AND start_time = '{$_POST['tg_bd']}' ;";
    $query_check1 = mysqli_query($conn, $sql_check1);
    $sql_check2 = "SELECT * FROM `class` WHERE room = '{$_POST['phong']}' AND start_time = '{$_POST['tg_bd']}' ;";
    $query_check2 = mysqli_query($conn, $sql_check2);
    $sql_check3 = "SELECT * FROM `class` WHERE trainer_id  = '{$_POST['pt']}' AND class_name  = '{$_POST['tenlop']}' AND start_time = '{$_POST['tg_bd']}' ;";
    $query_check3 = mysqli_query($conn, $sql_check3);


    if ($_POST['lopID'] == "") {
        $error['lopID'] = 'mã lớp không được rỗng';
    }

    if ($_POST['tenlop'] == "") {
        $error['tenlop'] = 'tên lớp không được rỗng';
    }

    if ($_POST['tenlop'] != "" && $query->num_rows > 0) {
        $error['tenlop'] = 'tên lớp đã có';
    }

    if ($_POST['pt'] != "" && $ngay != "" && $_POST['tg_bd'] != "" && $query_check1->num_rows > 0) {
        $error['trunggio'] = 'trùng giờ';
    }
    if ($_POST['tenlop'] != "" && $_POST['phong'] != "" && $_POST['tg_bd'] != "" && $query_check2->num_rows > 0) {
        $error['trungphong'] = 'trùng phòng';
    }
    if ($_POST['tenlop'] != "" && $_POST['pt'] != "" && $_POST['tg_bd'] != "" && $query_check3->num_rows > 0) {
        $error['trungpt'] = 'trùng lớp';
    }

    if ($_POST['phong'] == "") {
        $error['phong'] = 'phòng không được rỗng';
    }

    if ($ngay == "") {
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
        $query = "INSERT INTO class (class_id,trainer_id, trainer_name, class_name, room, date_of_week, start_time, end_time, start_date, end_date) VALUES ('{$_POST['lopID']}', '{$_POST['pt']}', (SELECT trainer_name FROM trainer WHERE trainer_id = '{$_POST['pt']}'), '{$_POST['tenlop']}', '{$_POST['phong']}', '{$ngay}', '{$_POST['tg_bd']}', '{$_POST['tg_kt']}', '{$_POST['ngay_bd']}', '{$_POST['ngay_kt']}');";
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
    <title>Thêm mới lớp học</title>
    <!-- Bootstrap CSS -->
    <link href="../../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/modal.css">
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="../../css/course.css">
    <link rel="stylesheet" href="../../css/submit.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="cotainer ml-5">
        <form name="addMB" method="POST">
            <p></p>
            <h3 class="card-description">Form Tạo mới lớp học </h3>
            <!-- <input type="text" name="id_mb" style="display: none;" id=""> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Mã lớp</label>
                            <input name="lopID" type="text" class="form-control"
                                value="<?= $_POST['lopID'] = $_POST['lopID'] ?? ''  ?>" />

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Tên lớp</label>
                            <input name="tenlop" type="text" class="form-control"
                                value="<?= $_POST['tenlop'] = $_POST['tenlop'] ?? ''  ?>" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tenlop'] = $error['tenlop'] ?? ''  ?>
                                <?= $error['trunglop'] = $error['trunglop'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Huấn luyện viên</label>
                            <select class="form-control" name="pt" id=""
                                value="<?= $_POST['pt'] = $_POST['pt'] ?? ''  ?>">
                                <?php foreach ($trainer as  $value) {
                                ?>
                                <option value="<?= $value['trainer_id'] ?>"><?= $value['trainer_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Phòng tập</label>
                            <input name="phong" type="text" class="form-control"
                                value="<?= $_POST['phong'] = $_POST['phong'] ?? ''  ?>" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['phong'] = $error['phong'] ?? ''  ?>
                                <?= $error['trungphong'] = $error['trungphong'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input name="ngay_bd" type="date" class="form-control"
                                value="<?= $_POST['ngay_bd'] = $_POST['ngay_bd'] ?? ''  ?>" onchange="addDate()" />
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
                            <input name="ngay_kt" type="date" class="form-control"
                                value="<?= $_POST['ngay_kt'] = $_POST['ngay_kt'] ?? ''  ?>" />
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
                            <label for="">Thời gian bắt đầu</label>
                            <input type="time" name="tg_bd" class="form-control"
                                value="<?= $_POST['tg_bd'] = $_POST['tg_bd'] ?? ''  ?>" onchange="_addTime()" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tg_bd'] = $error['tg_bd'] ?? ''  ?>
                                <?= $error['trunggio'] = $error['trunggio'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
                            <input type="time" name="tg_kt" class="form-control"
                                value="<?= $_POST['tg_kt'] = $_POST['tg_kt'] ?? ''  ?>" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tg_kt'] = $error['tg_kt'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày trong tuần</label>
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['ngay'] = $error['ngay'] ?? ''  ?></small>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay0" id="" value="T2"
                                onchange="checkDay(0)">
                            T2
                            <small id="helpId T0" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay1" id="" value="T3"
                                onchange="checkDay(1)">
                            T3
                            <small id="helpId T1" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay2" id="" value="T4"
                                onchange="checkDay(2)">
                            T4
                            <small id="helpId T2" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay3" id="" value="T5"
                                onchange="checkDay(3)">
                            T5 <small id="helpId T3" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay4" id="" value="T6"
                                onchange="checkDay(4)">
                            T6 <small id="helpId T4" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay5" id="" value="T7"
                                onchange="checkDay(5)">
                            T7 <small id="helpId T5" class="form-text text-muted"></small>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="ngay6" id="" value="CN"
                                onchange="checkDay(6)">
                            CN <small id="helpId T6" class="form-text text-muted"></small>
                        </label>
                    </div>
                </div>
            </div>
            <div class='submit__info'>
                <button class='submit__btn'><a href="mdi.php">TRỞ LẠI </a></button>
                <button name='accept' class='submit__btn'>XÁC NHẬN</button>
            </div>
    </div>
    </form>
    <form action="post" name="addTime"></form>
    </div>
    <script>
    function checkDay(index) {
        $.ajax({
            url: 'tim.php',
            type: 'POST',
            dataType: 'html',
            data: {
                checkDay: 'true',
                ngay: document.forms["addMB"]['ngay' + index].value,
                trainer_id: document.forms["addMB"]['pt'].value,
                tg_bd: document.forms["addMB"]['tg_bd'].value
            }
        }).done(function(result) {
            console.log(result);
            document.getElementById('helpId T' + index).innerText = result;
            // document.forms['addMB']['tg_kt'].value = result;
        });
    }

    function _addTime() {
        $.ajax({
            url: 'tim.php',
            type: 'POST',
            dataType: 'html',
            data: {
                addTime: 'true',
                tg_bd: document.forms['addMB']['tg_bd'].value
            }
        }).done(function(result) {
            document.forms['addMB']['tg_kt'].value = result;
        });
    }

    function addDate() {
        $.ajax({
            url: 'tim.php',
            type: 'POST',
            dataType: 'html',
            data: {
                addDate: 'true',
                ngay_bd: document.forms['addMB']['ngay_bd'].value
            }
        }).done(function(result) {
            document.forms['addMB']['ngay_kt'].value = result;
        });
    }
    </script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/parallax.js"></script>
    <script src="../../js/wow.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/tab.js"></script>
</body>

</html>