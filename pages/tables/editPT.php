<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$trainer = [];
$error=[];


if (isset($_GET['id_pt'])) {
    $query = "SELECT trainer_id,phone, trainer_name, gender,profs, description  FROM trainer WHERE trainer_id = '{$_GET['id_pt']}'";
    $kq = mysqli_query($conn, $query);
    $trainer  = mysqli_fetch_assoc($kq);
} else {
    header("location: formquanliuser.php");
}

if (isset($_POST['accept'])) {
    $sql_trainer1 = "SELECT * FROM trainer WHERE phone = '{$_POST['sdt']}' ;";
    $query1 = mysqli_query($conn, $sql_trainer1);
    if ($_POST['hoten_pt'] == "") {
        $error['hoten_pt'] = 'tên không được rỗng';
    }
    if ($_POST['sdt'] == "") {
        $error['sdt'] = 'sđt không được rỗng';
    }
    if ($_POST['giathue'] == "") {
        $error['giathue'] = 'giá thuê không được rỗng';
    }
    if ($_POST['mota'] == "") {
        $error['mota'] = 'mô tả không được rỗng';
    }
    
    if ($_POST['sdt'] != "" && $query1->num_rows > 0) {
        $error['sdt'] = 'sdt đã có';
    }
    
    if (count($error) == 0) {
        $query = "UPDATE trainer SET trainer_name = '{$_POST['hoten_pt']}',gender = '{$_POST['gioitinh']}',phone = '{$_POST['sdt']}',profs= '{$_POST['giathue']}',description = '{$_POST['mota']}' WHERE trainer_id = '{$_POST['id_pt']}' ";
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
    <title>Thay đổi thông tin HLV</title>

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
    <form class="form-sample" method="post">
        <p></p>
        <h2 class="card-description">Form thay đổi thông tin HLV</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mã PT</label>
                    <div class="col-sm-9">
                        <input name="id_pt" type="text" class="form-control" readonly placeholder=""
                            value="<?= $trainer['trainer_id'] ?>" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Họ Tên</label>
                    <div class="col-sm-9">
                        <input name="hoten_pt" type="text" class="form-control" value="<?= $trainer['trainer_name'] ?>" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['hoten_pt'] = $error['hoten_pt'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Giới Tính</label>
                    <div class="col-sm-9">
                        <select name="gioitinh" class="form-control" value="<?= $trainer['gender'] ?>">
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
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Số Điện Thoại</label>
                    <div class="col-sm-9">
                        <input name="sdt" class="form-control" placeholder="Number" value="<?= $trainer['phone'] ?>" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['sdt'] = $error['sdt'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">giá</label>
                    <div class="col-sm-9">
                        <input name="giathue" type="number" class="form-control" placeholder=""
                            value="<?= $trainer['profs'] ?>" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['giathue'] = $error['giathue'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mô tả</label>
                    <div class="col-sm-9">
                        <input name="mota" class="form-control" value="<?= $trainer['description'] ?>" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['mota'] = $error['mota'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br><br>
        <div class="submit__info">
            <button class="submit__btn"><a href="formquanliuser.php">TRỞ LẠI</a></button>
            <button name='accept' class="submit__btn">XÁC NHẬN</button>
    </form>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/parallax.js"></script>
    <script src="../../js/wow.js"></script>
    <script src="../../js/main.js"></script>
    <script src="../../js/tab.js"></script>
</body>

</html>