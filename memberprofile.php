<?php
require './my_db.php';
session_start();
$name = '';
$gender = '';
$email = '';
$phone = '';
$age = '';
$id_class = 0;
if (isset($_POST['class_id'])) {
    //echo $_POST['class_id'];
    $id_class = $_POST['class_id'];
}
$class = [];
$class_detail = [];
if ($_SESSION['login']) {
    $id =  json_decode($_SESSION['member'])->member_id;
    $name = json_decode($_SESSION['member'])->name;
    $gender = json_decode($_SESSION['member'])->gender;
    $email = json_decode($_SESSION['member'])->email;
    $phone = json_decode($_SESSION['member'])->phone;
    $age = json_decode($_SESSION['member'])->age;
    $type = json_decode($_SESSION['member'])->type;
    connect_db();
    $sql = "SELECT * FROM class cl join classregistration cr ON cl.class_id = cr.class_id where cr.member_id = '$id';";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $class[] = $row;
    }

    $sql_detail = "SELECT * FROM member m join classregistration cr ON m.member_id = cr.member_id  WHERE cr.class_id = '$id_class';";
    $query2 = mysqli_query($conn, $sql_detail);
    while ($row2 = mysqli_fetch_assoc($query2)) {
        $class_detail[] = $row2;
    }
    disconnect_db();
} else {
    header("location: index.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/memberprofile.css" />
    <title>Thông tin thành viên</title>
</head>

<body>

    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="member.php">Trang chính</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Trang thông tin thành viên</li>
                    <li style="margin-left:40rem;"><a name="" id="logout" href="#" onclick="logout()">Đăng xuất</a>                       
                    </li>
                </ol>

            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                 <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150" /> -->
                                    <img src="images/profile/<?php echo $type ?>" alt="member" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?= $name ?></h4>
                                    <p class="text-secondary mb-1">Thành viên của FPTGym Fitness</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Họ và tên:</h6>
                                <span class="text-secondary"><?= $name ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Giới tính:</h6>
                                <span class="text-secondary"><?= $gender ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Email:</h6>
                                <span class="text-secondary"><?= $email ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Số điện thoại:</h6>
                                <span class="text-secondary"><?= $phone ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Tuổi:</h6>
                                <span class="text-secondary"><?= $age ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal"
                                        data-target="#edit" style="color: black; background-color:cyan; font-weight:bold">Thay đổi thông tin</a>
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" 
                                        data-target="#changePass" style="color: black; background-color:cyan; font-weight:bold" >Đổi mật khẩu</a> 
                                                                         
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
               
                <div class="col-md-8" table>    
                    <div>            
                    <table style = "width:100%" border="0.1">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                        Danh sách các lớp đang học </h4>
                        <thead>                 
                            <tr>
                                <th >Tên lớp</th>
                                <th >Ngày học</th>                                
                                <th >Bắt đầu</th>
                                <th >Kết thúc</th>                                                               
                                <th >Giáo viên</th>
                                <th >Lựa chọn</th>
                            </tr>
                        </thead>                       
                            <?php foreach ($class as $item) {?>
                        <tbody style="vertical-align: middle;">
                            <tr>
                                <td><?php echo $item['class_name'] ?> </td>
                                <td><?php echo $item['date_of_week'] ?> </td>
                                <td><?php echo $item['start_time'] ?></td>
                                <td><?php echo $item['end_time'] ?></td>
                                <td><?php echo $item['trainer_name'] ?></td>
                                <td >
                                    <form method="post" style="vertical-align: middle;"> 
                                        <input type="submit" style="border:none; background-color:white" value="Chi tiết"/> 
                                        <input type="hidden" name="class_id" value="<?php echo $item['class_id'] ?>"/>                                                       
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                            <?php } ?>                                         
                    </table>
                    </div>  
                    <br>
                    <div>
                    <table class="table table-borderless">
                        <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                            Danh sách lớp học </h4>
                        <thead>
                            <tr>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Tuổi</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($class_detail as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item['name'] ?> </td>
                                <td><?php echo $item['gender'] ?> </td>
                                <td><?php echo $item['age'] ?></td>
                                <td><?php echo $item['phone'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">Cập nhật thông tin cá nhân</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form" action="edit.php" method="POST">
                        <input type="text" name="id" style="display: none;" value="<?= $id ?>">
                        <input type="text" class="form-control mt-1" name="cf-name" 
                               placeholder="Họ và Tên"  value="<?= $name ?>">
                        <select class="form-control mt-1" name="cf-gender">
                            <option placeholder="Chọn giới tính">Chọn giới tính</option>
                            <option class="form-control" <?= $gender == 'Nam' ? 'selected' : '' ?> value="Nam">Nam</option>
                            <option class="form-control" <?= $gender == 'Nữ' ? 'selected' : '' ?> value="Nữ">Nữ</option>
                            <option class="form-control" <?= $gender == 'Khác' ? 'selected' : '' ?> value="Khác">Khác</option>
                        </select>
                                    
                        <input type="email" class="form-control mt-1" name="cf-email" placeholder="Nhập email"
                            value="<?= $email ?>">

                        <input type="tel" class="form-control mt-1" name="cf-phone" placeholder="Nhập số điện thoại 123-456-7890"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $phone ?>">

                        <input type="text" class="form-control mt-1" name="cf-age" placeholder="Nhập tuổi"
                            value="<?= $age ?>">    
                                         
                        <div class="form-group" style="padding-top:5px" >                                    
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cf-type">
                                    <label class="custom-file-label" >Chọn hình đại diện</label>
                                </div>
                            </div>
                        </div>    
                        <button type="submit" class=" form-control mt-1" id="submit-button" name="data-edit" 
                                style="font-weight: bold; background-color:cyan">Cập nhật</button>

                    </form>
                </div>
                    <div class="modal-footer"></div>
                </div>
        </div>
    </div>

    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="membershipFormLabel" style="text-align: center;">Đổi mật khẩu</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" name="formChangePass" role="form" action="changePassword.php"
                        method="POST">
                        <input type="text" name="id" style="display: none;" value="<?= $id ?>">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="password" class="form-control" name="new-password" placeholder="Mật khẩu mới"
                                required>
                            <small id="helpId" class="form-text text-muted ernp"></small>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="password" class="form-control" name="re-password"
                                placeholder="Nhập lại mật khẩu" required>
                        </div>
                            <small id="helpId" class="form-text text-muted error" style="color: red;"></small>
                            <button type="submit" class="form-control mt-1" id="submit-button" name="submit-change"
                            style="font-weight: bold; background-color:cyan">Đổi mật khẩu</button>
                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>

    <script>
    document.getElementById('submit-change').addEventListener('click', e => {
        e.preventDefault();
        let send = true;
        let newPass = document.forms['formChangePass']['new-password'].value;
        let rePass = document.forms['formChangePass']['re-password'].value;
        if (newPass == '') {
            document.querySelector('.ernp').innerText = 'Mật khẩu không được rỗng!';
            send = false;
        }
        if (newPass != rePass) {
            document.querySelector('.error').innerText = 'Mật khẩu phải trùng nhau!';
            send = false;
        }
        if (send) {
            document.forms['formChangePass'].submit();
            // logout();
        }
    })

    function logout() {
        document.cookie = 'PHPSESSID =; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        window.location.reload()
    }
    </script>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>