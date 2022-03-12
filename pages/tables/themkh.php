<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$error  = [];
if (isset($_POST['accept'])) {

    if ($_POST['hoten_mb'] == "") {
        $error['hoten_mb'] = 'Tên không được rỗng';
    }
    if ($_POST['email'] == "") {
        $error['email'] = 'email không được rỗng';
    }
    if ($_POST['sdt'] == "") {
        $error['sdt'] = 'sdt không được rỗng';
    }
    if ($_POST['sdt'] != "" && !is_numeric($_POST['sdt'])) {
        $error['sdt'] = 'sdt phải là số';
    }
    if ($_POST['sdt'] != "" && strlen($_POST['sdt'])  < 10) {
        $error['sdt'] = 'sdt phải đủ 10 số';
    }
    if ($_POST['tuoi'] == "") {
        $error['tuoi'] = 'Tuổi không được rỗng';
    }
    if ($_POST['ngaydangki'] == "") {
        $error['ngaydangki'] = 'Ngày đăng kí không thành công';
    }

    if (count($error) == 0) {
        $query = "INSERT INTO member VALUES (NULL, '{$_POST['hoten_mb']}', '{$_POST['gioitinh']}', '{$_POST['email']}', '{$_POST['sdt']}', '{$_POST['tuoi']}', '', '', '0', '{$_POST['ngaydangki']}', '')";
        mysqli_query($conn, $query);
        header("location: formquanliuser.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thêm thành viên</title>
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
                Member info
            </p>
            <!-- <input type="text" name="id_mb" style="display: none;" id=""> -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input name="hoten_mb" type="text" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['hoten_mb'] = $error['hoten_mb'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <select class="form-control" name="gioitinh" id="">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['email'] = $error['email'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Số Điện Thoại</label>
                            <input name="sdt" type="number" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['sdt'] = $error['sdt'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Tuổi</label>
                            <input name="tuoi" type="text" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['tuoi'] = $error['tuoi'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Ngày đăng kí</label>
                            <input name="ngaydangki" type="date" class="form-control" />
                            <small id="helpId"
                                class="form-text text-muted"><?= $error['ngaydangki'] = $error['ngaydangki'] ?? ''  ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class='submit__info'>
                <button class='submit__btn'><a href="formquanliuser.php">TRỞ LẠI </a></button>
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