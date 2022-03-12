<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$sql_trainer = "SELECT trainer_id, trainer_name FROM `trainer`;";
$query = mysqli_query($conn, $sql_trainer);
$trainer = [];
$error = [];
while ($row  = mysqli_fetch_assoc($query)) {
    $trainer[] = $row;
}

if (isset($_POST['accept'])) {
    $sql_trainer1 = "SELECT * FROM trainer WHERE phone = '{$_POST['sdt']}' ;";
    $query1 = mysqli_query($conn, $sql_trainer1);
    $sql_trainer2 = "SELECT * FROM trainer WHERE trainer_id = '{$_POST['trainer_id']}' ;";
    $query2 = mysqli_query($conn, $sql_trainer2);
    $sql_trainer3 = "SELECT * FROM trainer WHERE username = '{$_POST['username']}' ;";
    $query3 = mysqli_query($conn, $sql_trainer3);

    if ($_POST['ngaysinh'] == "") {
        $error['ngaysinh'] = 'tuổi không được rông';
    }
    $ngaysinh = date_create($_POST['ngaysinh']);
    $hientai = date_create(date('Y-m-d'));
    $tuoi = date_diff($ngaysinh, $hientai)->format("%y");

    if ($_POST['ngaysinh'] != "" &&  $tuoi < 18) {
        $error['chuadutuoi'] = 'PT phải trên 18 tuôi';
    }
    if ($_POST['hoten'] == "") {
        $error['hoten'] = 'tên không được rỗng';
    }
    if ($_POST['trainer_id'] == "") {
        $error['trainer_id'] = 'không được rỗng';
    }
    if ($_POST['sdt'] == "") {
        $error['sdt'] = 'sđt không được rỗng';
    }
    if ($_POST['username'] == "") {
        $error['username'] = 'không được rỗng';
    }
    if ($_POST['password'] == "") {
        $error['password'] = 'không được rỗng';
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
    if ($_POST['trainer_id'] != "" && $query2->num_rows > 0) {
        $error['trainer_id'] = 'id đã có';
    }
    if ($_POST['username'] != "" && $query3->num_rows > 0) {
        $error['username'] = 'username đã có';
    }

    if (count($error) == 0) {
        $query = "INSERT INTO trainer VALUES ('{$_POST['trainer_id']}', '{$_POST['hoten']}', '', '{$_POST['sdt']}', '{$_POST['gioitinh']}', '{$_POST['username']}', '{$_POST['password']}', '2', '{$_POST['giathue']}','', '{$_POST['mota']}' )";
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
    <title>Thêm Huan luyen vien</title>

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
        <h2 class="card-description">Form Tạo mới Huấn luyện viên</h2>
        <div class="row">
            <div class="col-md-6">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">id: </label>
                    <div class="col-sm-9">
                        <input name="trainer_id" type="text" class="form-control" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['trainer_id'] = $error['trainer_id'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Họ Tên: </label>
                    <div class="col-sm-9">
                        <input name="hoten" type="text" class="form-control" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['hoten'] = $error['hoten'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Username: </label>
                    <div class="col-sm-9">
                        <input name="username" type="text" class="form-control" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['username'] = $error['username'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Password: </label>
                    <div class="col-sm-9">
                        <input name="password" type="text" class="form-control" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['password'] = $error['password'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Giới Tính</label>
                    <div class="col-sm-9">
                        <select name="gioitinh" class="form-control">
                            <option>Nam</option>
                            <option>Nữ</option>
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
                        <input name="sdt" type="number" class="form-control" placeholder="Number" />
                        
                        <small id="helpId" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" onchange="checkPhone()"
                            class="form-text text-muted"><?= $error['sdt'] = $error['sdt'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">giá: </label>
                    <div class="col-sm-9">
                        <input name="giathue" type="text" class="form-control" placeholder="" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['giathue'] = $error['giathue'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ngày sinh: </label>
                    <div class="col-sm-9">
                        <input name="ngaysinh" type="date" class="form-control" placeholder="" />
                        <small id="helpId"
                            class="form-text text-muted"><?= $error['ngaysinh'] = $error['ngaysinh'] ?? ''  ?><?= $error['chuadutuoi'] = $error['chuadutuoi'] ?? ''  ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Mô tả</label>
                    <div class="col-sm-9">
                        <textarea name="mota" class="form-control" rows="3" placeholder="">
                       <?= $error['mota'] = $error['mota'] ?? ''  ?>
                        </textarea>
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