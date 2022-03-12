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
$class_detail_old = [];
if ($_SESSION['login']) {
    $id =  json_decode($_SESSION['trainer'])->trainer_id;
    $name = json_decode($_SESSION['trainer'])->trainer_name;
    $gender = json_decode($_SESSION['trainer'])->gender;
    $phone = json_decode($_SESSION['trainer'])->phone;
    $age = json_decode($_SESSION['trainer'])->age;
    $type = json_decode($_SESSION['trainer'])->type;
    $profs = json_decode($_SESSION['trainer'])->profs;
    $profile = json_decode($_SESSION['trainer'])->pro_img;
    $description = json_decode($_SESSION['trainer'])->description;
    connect_db();
    $sql = "SELECT * FROM class where trainer_id = '$id';";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $class[] = $row;
    }

    $sql_detail = "SELECT * FROM member m join classregistration cr ON m.member_id = cr.member_id  WHERE cr.class_id = '$id_class';";;
    $query2 = mysqli_query($conn, $sql_detail);
    while ($row2 = mysqli_fetch_assoc($query2)) {
        $class_detail[] = $row2;
    }

    $sql_detail_old = "SELECT * FROM member m join classregistration cr ON m.member_id = cr.member_id  WHERE cr.class_id = '$id_class';";;
    $query3 = mysqli_query($conn, $sql_detail_old);
    while ($row3 = mysqli_fetch_assoc($query3)) {
        $class_detail_old[] = $row3;
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
    <link rel="stylesheet" href="css/trainerprofile.css" />
    <title>Thông tin thành viên</title>
</head>

<body>

    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->

            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150" /> -->
                                <img src="images/profile/trainer/<?php echo $profile ?>" alt="trainer" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?= $name ?></h4>
                                    <p class="text-secondary mb-1">HLV của FPTGym Fitness</p>
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
                                <h6 class="mb-0">Profs:</h6>
                                <span class="text-secondary"><?= $profs ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Description:</h6>
                                <span class="text-secondary"><?= $description ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#edit" style="color: black; background-color:cyan; font-weight:bold">Thay đổi thông tin</a>
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#changePass" style="color: black; background-color:cyan; font-weight:bold">Đổi mật khẩu</a>

                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>