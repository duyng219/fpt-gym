<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$member = [];
if (isset($_GET['id_mb'])) {
    $sql_member = "SELECT member_id, name, gender,email,age,phone,register_date FROM member WHERE member_id = '{$_GET['id_mb']}'";
    $query = mysqli_query($conn, $sql_member);
    $member = mysqli_fetch_assoc($query);
} else {
    header("location: formquanliuser.php");
}
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
        $query = "UPDATE member SET name = '{$_POST['hoten_mb']}', gender =  '{$_POST['gioitinh']}' ,email = '{$_POST['email']}', phone = '{$_POST['sdt']}', age =  '{$_POST['tuoi']}', register_date = '{$_POST['ngaydangki']}' WHERE member_id = '{$_POST['id_mb']}'";
        mysqli_query($conn, $query);
        header("location: formquanliuser.php");
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thay đổi thông tin thành viên</title>
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
            <h2 class="card-description">Forn thay đổi thông tin Thành viên</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Mã thành viên</label>
                            <input type="text" name="id_mb" readonly class="form-control"
                                value="<?= $member['member_id'] ?>" readonly>
                            <small id="helpId" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Họ Tên</label>
                            <input name="hoten_mb" type="text" class="form-control" value="<?= $member['name'] ?>" />
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
                            <select class="form-control" name="gioitinh" value="<?= $member['gender'] ?>" id="">
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
                            <input name="email" type="email" class="form-control" value="<?= $member['email'] ?>" />
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
                            <input name="sdt" type="number" class="form-control" value="<?= $member['phone'] ?>" />
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
                            <input name="tuoi" type="text" class="form-control" value="<?= $member['age'] ?>" />
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
                            <label for="">Ngày đăng kí </label>
                            <input name="ngaydangki" type="date" class="form-control"
                                value="<?= $member['register_date'] ?>" />
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