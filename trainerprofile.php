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
    <title>Th??ng tin th??nh vi??n</title>
</head>

<body>

    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="trainer.php">Trang ch??nh</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Trang th??ng tin HLV</li>
                    <li style="margin-left:40rem;"><a name="" id="logout" href="#" onclick="logout()">????ng xu???t</a>
                    </li>
                </ol>

            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <!--<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150" /> -->
                                <img src="images/profile/trainer/<?php echo $profile ?>" alt="trainer" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?= $name ?></h4>
                                    <p class="text-secondary mb-1">HLV c???a FPTGym Fitness</p>
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
                                <h6 class="mb-0">H??? v?? t??n:</h6>
                                <span class="text-secondary"><?= $name ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Gi???i t??nh:</h6>
                                <span class="text-secondary"><?= $gender ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">S??? ??i???n tho???i:</h6>
                                <span class="text-secondary"><?= $phone ?></span>
                            </li>
                            <li class="
                    list-group-item
                    d-flex
                    justify-content-between
                    align-items-center
                    flex-wrap
                  ">
                                <h6 class="mb-0">Tu???i:</h6>
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
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#edit" style="color: black; background-color:cyan; font-weight:bold">Thay ?????i th??ng tin</a>
                                    <a class="btn btn-light" target="__blank" href="#" data-toggle="modal" data-target="#changePass" style="color: black; background-color:cyan; font-weight:bold">?????i m???t kh???u</a>

                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9" style="text-align: center;">
                    <div>
                        <table style="width:100%" border="0.1">
                            <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                                Danh s??ch c??c l???p ??ang d???y </h4>
                            <thead>
                                <tr>
                                    <th>T??n l???p</th>
                                    <th>Ng??y h???c</th>
                                    <th>B???t ?????u</th>
                                    <th>K???t th??c</th>
                                    <th>Gi??o vi??n</th>
                                    <th>L???a ch???n</th>
                                </tr>
                            </thead>
                            <?php foreach ($class as $item) { ?>
                                <tbody style="vertical-align: middle;">
                                    <tr>
                                        <td><?php echo $item['class_name'] ?> </td>
                                        <td><?php echo $item['date_of_week'] ?> </td>
                                        <td><?php echo $item['start_time'] ?></td>
                                        <td><?php echo $item['end_time'] ?></td>
                                        <td><?php echo $item['trainer_name'] ?></td>
                                        <td>
                                            <form method="post" style="vertical-align: middle;">
                                                <input type="submit" style="border:none; background-color:white" value="Chi ti???t" />
                                                <input type="hidden" name="class_id" value="<?php echo $item['class_id'] ?>" />
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
                                Danh s??ch l???p h???c </h4>
                            <thead>
                                <tr>
                                    <th scope="col">H??? v?? t??n</th>
                                    <th scope="col">Gi???i t??nh</th>
                                    <th scope="col">Tu???i</th>
                                    <th scope="col">??i???n tho???i</th>
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
                    <br>
                    <br>
                    <br>
                    <div>
                        <table style="width:100%" border="0.1">
                            <h4 style="background-color:orange; text-align:center; border-radius:100px,100px;">
                                Danh s??ch c??c l???p ???? d???y </h4>
                            <thead>
                                <tr>
                                    <th>T??n l???p</th>
                                    <th>Ng??y h???c</th>
                                    <th>Gi??o vi??n</th>
                                    <th>Gi??? b???t ?????u</th>
                                    <th>Gi??? K???t th??c</th>
                                    <th>Ng??y b???t ?????u</th>
                                    <th>Ng??y k???t th??c</th>
                                    <th>L???a ch???n</th>
                                </tr>
                            </thead>
                            <?php foreach ($class as $item) { ?>
                                <tbody style="vertical-align: middle;">
                                    <tr>
                                        <td><?php echo $item['class_name'] ?> </td>
                                        <td><?php echo $item['date_of_week'] ?> </td>
                                        <td><?php echo $item['trainer_name'] ?></td>
                                        <td><?php echo $item['start_time'] ?></td>
                                        <td><?php echo $item['end_time'] ?></td>
                                        <td><?php echo $item['start_date'] ?></td>
                                        <td><?php echo $item['end_date'] ?></td>

                                        <td>
                                            <form method="post" style="vertical-align: middle;">
                                                <input type="submit" style="border:none; background-color:white" value="Chi ti???t" />
                                                <input type="hidden" name="class_id" value="<?php echo $item['class_id'] ?>" />
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
                                Danh s??ch l???p h???c ???? d???y </h4>
                            <thead>
                                <tr>
                                    <th scope="col">H??? v?? t??n</th>
                                    <th scope="col">Gi???i t??nh</th>
                                    <th scope="col">Tu???i</th>
                                    <th scope="col">??i???n tho???i</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($class_detail_old as $item) {
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


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel" style="text-align:center;">C???p nh???t th??ng tin c?? nh??n</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form" action="edit.php" method="POST">
                        <input type="text" name="id" style="display: none;" value="<?= $id ?>">
                        <input type="text" class="form-control mt-1" name="cf-name" placeholder="H??? v?? T??n" value="<?= $name ?>">
                        <select class="form-control mt-1" name="cf-gender">
                            <option placeholder="Ch???n gi???i t??nh">Ch???n gi???i t??nh</option>
                            <option class="form-control" <?= $gender == 'Nam' ? 'selected' : '' ?> value="Nam">Nam</option>
                            <option class="form-control" <?= $gender == 'N???' ? 'selected' : '' ?> value="N???">N???</option>
                            <option class="form-control" <?= $gender == 'Kh??c' ? 'selected' : '' ?> value="Kh??c">Kh??c</option>
                        </select>

                        <input type="tel" class="form-control mt-1" name="cf-phone" placeholder="Nh???p s??? ??i???n tho???i 123-456-7890" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?= $phone ?>">

                        <input type="text" class="form-control mt-1" name="cf-age" placeholder="Nh???p tu???i" value="<?= $age ?>">

                        <div class="form-group" style="padding-top:5px">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="cf-profile">
                                    <label class="custom-file-label">Ch???n h??nh ?????i di???n</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class=" form-control mt-1" id="submit-button" name="trainer-edit" style="font-weight: bold; background-color:cyan">C???p nh???t</button>

                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="membershipFormLabel" style="text-align: center;">?????i m???t kh???u</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" name="formChangePass" role="form" action="changePassword.php" method="POST">
                        <input type="text" name="id" style="display: none;" value="<?= $id ?>">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="password" class="form-control" name="new-password" placeholder="M???t kh???u m???i" required>
                            <small id="helpId" class="form-text text-muted ernp"></small>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="password" class="form-control" name="re-password" placeholder="Nh???p l???i m???t kh???u" required>
                        </div>
                        <small id="helpId" class="form-text text-muted error" style="color: red;"></small>
                        <button type="submit" class="form-control mt-1" id="submit-button" name="submit-trainer" style="font-weight: bold; background-color:cyan">?????i m???t kh???u</button>
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
                document.querySelector('.ernp').innerText = 'M???t kh???u kh??ng ???????c r???ng!';
                send = false;
            }
            if (newPass != rePass) {
                document.querySelector('.error').innerText = 'M???t kh???u ph???i tr??ng nhau!';
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