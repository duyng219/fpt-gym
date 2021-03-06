<?php
$conn = new mysqli('localhost', 'root', '', 'fptgym') or die("Kết nối thất bại");
// mysqli_query($conn, 'SET NAMES UTF8');
$sql_class = "SELECT * FROM feedback fb join member mb ON fb.member_id = mb.member_id";
$query = mysqli_query($conn, $sql_class);
$class = [];
while ($row  = mysqli_fetch_assoc($query)) {
    $class[] = $row;
}
?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrator Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../cssPT/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../imagesPT/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="../../indexAD.php"><img src="../../imagesPT/d461561c21bfd3e18aae (1).jpg" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="../../indexAD.php"><img src="../../imagesPT/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="../../imagesPT/faces/face1.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../../imagesPT/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../../imagesPT/faces/face3.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../../imagesPT/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../../imagesPT/faces/face5.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="../../imagesPT/faces/face6.jpg" alt="image"><span class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                            <i class="fas fa-user"></i>&emsp;
                            <span class="menu-title">Quản Lí User</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../tables/formquanliuser.php">Kiểm tra</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="fas fa-envelope"></i>&emsp;
                            <span class="menu-title">Quản lý Lớp</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.php">Kiểm tra</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                            <i class="fas fa-envelope"></i>&emsp;
                            <span class="menu-title">Quản lý FeedBack</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.php">Kiểm tra</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php">
                            <i class="fas fa-sign-out-alt"></i> &emsp;
                            <span class="menu-title">ĐĂNG XUẤT</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Danh sách các Phản hồi từ thành viên</h4>
                                    <div class="row">
                                        <div class="col-7">
                                            <!-- <a type="button" id="btn-mb" class="btn btn-success" data-toggle="modal"
                                                data-target="#modelAddMB"><i class="fas fa-user-plus"></i></a> -->
                                            <a type="button" id="btn-mb" class="btn btn-success" href="#"><i class="fas fa-user-plus"></i></a>
                                        </div>
                                        <div class="col-5 justify-content-end " style="transform: translateX(8rem);">
                                            <form class="form-inline" name="form-SMB">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <input type="text" name="s_mb" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                                </div>
                                                <button type="submit" class="btn btn-primary" onclick="searchMember(event)">Tìm kiếm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-responsive pt-3" style="width: 83rem;">
                                        <table class="table table-bordered">
                                            <thead style="background-color: black; color:white; text-align:center">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Mã Feedback</th>
                                                    <th>Tên thành viên</th>
                                                    <th>Phần nội dung</th>
                                                    <th>Ngày phản hồi</th>
                                                    <th>Phần trả lời</th>
                                                    <th>Ngày trả lời</th>
                                                    <th>Lựa chọn</th>
                                                </tr>
                                            </thead>
                                            <tbody id="t_mb">
                                                <?php $stt = 1;
                                                foreach ($class as $item) { ?>
                                                    <tr class='table-info' style="text-align: center;">
                                                        <td><?= $stt ?></td>
                                                        <td><?= $item['feedback_id'] ?></td>
                                                        <td><?= $item['name'] ?></td>
                                                        <td><?= $item['content'] ?></td>
                                                        <td><?= $item['reply_date'] ?></td>
                                                        <td><?= $item['reply'] ?></td>
                                                        <td><?= $item['reply_date'] ?></td>
                                                        <td><a type='button' class='btn btn-info' href='../../feedback_Admin.php?id_lp=<?= $item['feedback_id'] ?>'>
                                                                <i class='fas fa-user-edit'></i></a> <a type='button' class='btn btn-danger' href='xoaFB.php?id_lp=<?= $item['feedback_id'] ?>'><i class='fas fa-user-times'></i></a></td>
                                                    </tr>
                                                <?php $stt++;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script>
        function searchMember(e) {
            e.preventDefault();
            $.ajax({
                url: 'tim.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    s_mb: document.forms['form-SMB']['s_mb'].value
                }
            }).done(function(result) {
                let member = JSON.parse(result)
                let body = '';
                for (let i = 0; i < member.length; i++) {
                    body +=
                        "<tr class='table-info'><td>" + eval(i + 1) + "</td><td>" + member[i].class_id +
                        "</td><td>" + member[i].class_name + "</td><td>" +
                        member[
                            i]
                        .trainer_name +
                        "</td><td>" + member[i].room + "</td><td>" + member[i].date_of_week +
                        "</td><td>" + member[i].start_time + " - " + member[i].end_time +
                        "</td><td>" + member[i].start_date +
                        "</td><td>" + member[i].end_date +
                        "</td><td><a type='button' class='btn btn-info' href='sualop.php?id_lp=" +
                        member[i]
                        .class_id +
                        "''><i class='fas fa-user-edit'></i></a> <a type='button' class='btn btn-danger' href='xoalop.php?id_lp=" +
                        member[i]
                        .class_id +
                        "'><i class='fas fa-user-times'></i></a></td></tr>"
                }
                // console.log(member[0].name);
                document.getElementById('t_mb').innerHTML = body;
            });
        }
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../jsPT/off-canvas.js"></script>
    <script src="../../jsPT/hoverable-collapse.js"></script>
    <script src="../../jsPT/template.js"></script>
    <script src="../../jsPT/settings.js"></script>
    <script src="../../jsPT/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>