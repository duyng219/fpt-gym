<?php
require './my_db.php';

session_start();
$name = '';
$url_ad = '';
$url_mb = '';

global $conn;
    connect_db();
    $sql = "select * from class";
    $class = array();
    $query = mysqli_query($conn, $sql);
    if(!empty($query)){
        while($row = mysqli_fetch_assoc($query)){
            $class[]=$row;
        }
    }
    $sql1 = "select * from trainer where trainer_id = 'TR01'";
    $trainer1= array();
    $query1 = mysqli_query($conn, $sql1);
    if(!empty($query1)){
        while($row1 = mysqli_fetch_assoc($query1)){
            $trainer1=$row1;
        }
    }
    $sql2 = "select * from trainer where trainer_id = 'TR02'";
    $trainer2= array();
    $query2 = mysqli_query($conn, $sql2);
    if(!empty($query1)){
        while($row2 = mysqli_fetch_assoc($query2)){
            $trainer2=$row2;
        }
    }
    $sql3 = "select * from trainer where trainer_id = 'TR03'";
    $trainer3= array();
    $query3 = mysqli_query($conn, $sql3);
    if(!empty($query1)){
        while($row3 = mysqli_fetch_assoc($query3)){
            $trainer3=$row3;
        }
    }
    $sql4 = "select * from trainer where trainer_id = 'TR04'";
    $trainer4= array();
    $query4 = mysqli_query($conn, $sql4);
    if(!empty($query1)){
        while($row4 = mysqli_fetch_assoc($query4)){
            $trainer4=$row4;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>FPTGYM</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div><a class="" href="#"><img style="height: 50px; width: 50px;" src="./images/logo/logo.png" alt="">
                    <a href="#" style="font-size: 25px; padding-left: 3px;">FPTGym Fitness</a></a></div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Trang ch???</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">V??? ch??ng t??i</a>
                    </li>

                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">L???p h???c</a>
                    </li>

                    <li class="nav-item">
                        <a href="#schedule" class="nav-link smoothScroll">Hu???n luy???n vi??n</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Li??n h???</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $name != '' ? $url_ad != '' ?  'index.php' : 'memberprofile.php' :  '#' ?>"
                            class="nav-link smoothScroll" class="btn custom-btn bg-color mt-3"
                            <?= $name != '' ? '' : 'data-toggle="modal" data-target="#login"' ?>>
                            <?= $name != '' ? $name : '????ng nh???p' ?>
                        </a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com/" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h6 data-aos="fade-up" data-aos-delay="300">thay ?????i c?? th???, thay ?????i cu???c s???ng!</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">N??NG C???P C?? TH??? C???A B???N T???I FPTGym Fitness</h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">B???t ?????u</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Xem Th??m</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">S??N CH???C B???N B??? C??NG NHAU</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">- Tr??n +80 b??? m??n v?? l???p h???c ????? t???p c??ng b???n b??</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- C??ng x??? stress, l???y d??ng ?????p theo l???ch t???p c?? nh??n h??a</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- C??ng t???n h?????ng tr???i nghi???m Gym 5 sao ch??? c?? t???i FPTGym</h6>
                    <a href="#" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300" data-toggle="modal" data-target="#membershipForm">Tham gia ngay h??m nay</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>
                            <h2 class="mb-4 text-white" data-aos="fade-down" data-aos-delay="400">Gi??? Ho???t ?????ng: </h2>
                            <strong class="d-block" data-aos="fade-down" data-aos-delay="600">Th??? 2 - Th??? 7:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1000" style="padding-left:5px">+ Bu???i s??ng: 6:00 - 12:00 </p>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1500" style="padding-left:5px">+ Bu???i s??ng: 16:00 - 22:00 </p>
                            <strong class="d-block" data-aos="fade-down" data-aos-delay="2000">Ch??? nh???t:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="2500" style="padding-left:5px">- C??? ng??y: 6:00 - 22:00 </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">

                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Xin ch??o, ch??ng t??i l?? FPTGYM</h2>

                    <b>Ch??ng t??i mu???n ch???ng minh r???ng ????? c?? ???????c cu???c s???ng t???t v?? l??nh m???nh h??n, b???n kh??ng
                        nh???t thi???t ph???I tu??n theo k??? lu???t th??p ho???c ph???i hy sinh, thay v??o ????, ch??? c???n ????a v??o l???i s???ng c???a m??nh nh???ng th??i quen
                        gi??p n??ng cao ch???t l?????ng cu???c s???ng, ?????ng th???i gi???m thi???u nh???ng th??i quen kh??ng c?? l???i..</b>
                        <p>N??m 2022 FPTGYM tr??? ph??ng t???p th??? d???c th??? h??nh qu???c t??? ?????u ti??n v?? l???n nh???t ra m???t t???i Vi???t Nam. 
                        V???i s??? m???nh ???L??m Cho Cu???c S???ng T???t ?????p H??n???, FPTGYM kh??ng ch??? ????n thu???n gi???ng nh?? bao ph??ng t???p th??ng 
                        th?????ng kh??c. ????y l?? trung t??m c???a phong c??ch s???ng n??ng ?????ng, nh???m truy???n c???m h???ng, mang l???i ni???m vui s???ng kho??i c??ng nh?? 
                        ngu???n sinh kh?? m???i cho c???ng ?????ng.</p>
                        <p>C??c th??nh vi??n trong ?????i ng?? qu???n l?? c???p cao c???a CFYC ?????u t???ng l?? nh???ng nh??n v???t c???c k??? quan tr???ng ?????i v???i s??? ph??t tri???n
                             c???a m???t s??? th????ng hi???u h??ng ?????u trong ng??nh th??? d???c th??? h??nh, nh??: 24 Hour Fitness, California Fitness, Jackie Chan 
                             Sport, UFC Gyms, Crunch Fitness, Yoga Works v?? Les Mills.</p>
                             <p>????y l?? n??i h???i t??? c???a vi???c luy???n t???p, th???i trang v?? gi???i tr?? trong m???t m??i tr?????ng l??nh m???nh, tr??n tr??? sinh l???c. T???
                             ??m nh???c v?? ??nh s??ng cho t???i c??c trang thi???t b??? hi???n ?????i v?? ?????i ng?? hu???n luy???n vi??n ?????ng c???p qu???c t???, m???i chi ti???t ?????u
                              ???????c chu???n b??? m???t c??ch t??? m??? v?? c??ng phu, nh???m mang l???i nh???ng tr???i nghi???m t??ch c???c v?? tuy???t v???i nh???t cho kh??ch h??ng. 
                              Th??nh c??ng v?????t b???c c???a FPTGYM g???n li???n v???i t???m nh??n v?? vai tr?? l??nh ?????o c???a nh?? s??ng l???p, ?????ng th???i c??ng l?? CEO ??? ??ng 
                              Nguy???n Trung Tu???n ???? th???i b??ng trong to??n c??ng ty c???a ??ng ng???n l???a ??am m?? t???n h?????ng cu???c s???ng v?? gi???i tr??, v???n ???? t???o
                              n??n m???t cu???c c??ch m???ng trong c??ch luy???n t???p th??? d???c th??? h??nh tr??n kh???p ch??u ??.
                             </p>
                             <p>V???i H???i ?????ng qu???n tr??? k???t h???p c???a h??n 30 n??m kinh nghi???m t???i h??ng ch???c qu???c gia kh??c nhau, FPTGYM ???? v?? ??ang s??? h???u 
                                m???t ?????i ng?? l??nh ?????o chuy??n nghi???p v?? l??o luy???n b???c nh???t trong ng??nh th??? d???c th??? h??nh. ???? c??ng l?? nguy??n nh??n ch??nh 
                                gi??p CFYC lu??n trung th??nh v?? nh???t qu??n trong vi???c th???c hi???n cam k???t c???a th????ng hi???u: L??m Cho Cu???c S???ng T???t ?????p H??n.</p>
                </div>

                

                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                    <img style="height: 500px; width: 600px;" src="./images/logo/logo.png" alt="">
                    </div>                    
                </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h6 data-aos="fade-up">C?? ???????c m???t c?? th??? ho??n h???o</h6>

                    <h2 data-aos="fade-up" data-aos-delay="200">C??c l???p ????o t???o c???a ch??ng t??i </h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/crossfit-class.jpg" class="img-fluid" alt="Class">
                        <div class="class-info">
                            <h3 class="mb-1">Crossfit</h3>
                            <p class="mt-3">Hi???n nay c?? r???t nhi???u m??n th??? thao kh??c nhau. Crossfit l?? m???t trong nh???ng m??n th??? thao r???t th?? v??? mang
                                t???i nhi???u l???i ??ch cho s???c kh???e, s???c m???nh, s???c b???n??? V???y Crossfit l?? g?? ? N???u b???n ??ang mu???n t??m hi???u v?? t???p luy???n
                                Crossfit th?? h??y c??ng FPTGYM b???t ?????u ngay t??? b??i vi???t n??y nh?? !</p><br>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Crossfit.php"> Xem Th??m</button></a>
                        </div>
                        
 
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/power1.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Power Fitness</h3>
                            <p class="mt-3">B???n ??ang d??? ?????nh t???p Powerlifting ????? n??ng cao s???c m???nh b???n th??n nh??ng b??n kho??n b??? m??n n??y li???u c?? ph?? 
                                h???p v???i m??nh kh??ng? H??y c??ng ch??ng t??i t??m hi???u k??? b??i vi???t sau ????y ????? hi???u r?? h??n v??? kh??i ni???m n??y nh?? ! <br></p>
                                <br><br>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Power.php"> Xem Th??m</button></a>
                                
                                
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/cardio-class.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Cardio</h3>
                            <p class="mt-3">V???i b??i t???p th??? d???c Cardio, b???n kh??ng c???n ph???i d??nh h??ng gi??? m???i ng??y t???i ph??ng t???p th??? d???c ????? duy tr??
                                s???c kh???e tim m???ch v?? gi???m c??n. Cardio c?? th??? gi??p b???n th???c hi???n b??i t???p tim m???ch hi???u qu??? t???i nh??, ngay c??? khi b???n
                                kh??ng c?? nhi???u kh??ng gian ho???c thi???t b??? ????? t???p luy???n.</p>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Cardio.php"> Xem Th??m</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/muscle1.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Mucse Relax</h3>
                            <p class="mt-3">V???i b??i t???p th??? d???c Cardio, b???n kh??ng c???n ph???i d??nh h??ng gi??? m???i ng??y t???i ph??ng t???p th??? d???c ????? duy tr??
                                s???c kh???e tim m???ch v?? gi???m c??n. Cardio c?? th??? gi??p b???n th???c hi???n b??i t???p tim m???ch hi???u qu??? t???i nh??, ngay c??? khi b???n
                                kh??ng c?? nhi???u kh??ng gian ho???c thi???t b??? ????? t???p luy???n.</p>
                                
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="#"> Xem Th??m</button></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 col-12 text-center mb-5">
                <h6 data-aos="fade-up">l???ch t???p GYM h??ng tu???n c???a ch??ng t??i</h6>
                    <h2 data-aos="fade-up" data-aos-delay="200">Th???i gian bi???u t???p luy???n </h2><hr>
                </div>
                <div>
                <table style="width: 1225px; border: 1px; padding: 10px;">
                    <tr>
                    <td><b>M?? L???p</b></td>
                    <td><b>Ng?????i h?????ng d???n</b></td>
                    <td><b>T??n l???p</b></td>
                    <td><b>Ph??ng T???p</b></td>
                    <td style="text-align: center;"><b>Ng??y t???p</b></td>
                    <td style="text-align: center;"><b>Gi??? b???t ?????u</b></td>
                    <td style="text-align: center;"><b>Gi??? k???t th??c</b></td>
                    <td style="text-align: center;"><b>Ng??y B???t ?????u</b></td>
                    <td style="text-align: center;"><b>Ng??y K???t Th??c</b></td>
                   </tr>
                    <tr>
                    <?php foreach($class as $item){ ?>
        
                        <td ><?php echo $item['class_id']?></td>
                        <td><?php echo $item['trainer_name']?></td>
                        <td><?php echo $item['class_name']?></td>
                        <td><?php echo $item['room']?></td>
                        <td style="text-align: center;"><?php echo $item['date_of_week']?></td>
                        <td style="text-align: center;"><?php echo $item['start_time']?></td>
                        <td style="text-align: center;"><?php echo $item['end_time']?></td>
                        <td style="text-align: center;"><?php echo $item['start_date']?></td>
                        <td style="text-align: center;"><?php echo $item['end_date']?></td>
                  </tr>
    <?php } ?>
    </table>
    </div>
            </div>
        </div>
    </section>
    <section class="schedule section" id="schedule">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center">
                <h2 class="text-white" data-aos="fade-up" data-aos-delay="200">G???p g??? nh???ng chuy??n gia th??? h??nh h??ng ?????u</h2>
                <h6 data-aos="fade-up">D?? b???n y??u th??ch CrossFit, ??am m?? b??? m??n Cardio ?????y s??i ?????ng, hay m??n Powerlifting c???c m???nh m???. B???n s??? lu??n ???????c h?????ng d???n b???i nh???ng chuy??n gia h??ng ?????u. <br><br></h6>
                </div>
                <br><br><br>
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                        <img src="images/team/<?php echo $trainer1['type'] ?>" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">
                        <h4><?php echo $trainer1['trainer_name']?></h4>
                            <span><?php echo $trainer1['profs']?></span>
                            <p><?php echo $trainer1['description']?></p>
                        </div>
                    </div>
                </div>
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                <div class="team-thumb">
                        <img src="images/team/<?php echo $trainer2['type'] ?>" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                        <h4><?php echo $trainer2['trainer_name']?></h4> 
                            <span><?php echo $trainer2['profs']?></span>
                            <p><?php echo $trainer2['description']?></p>
                        </div>
                    </div>
                </div>
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                <div class="team-thumb">
                        <img src="images/team/<?php echo $trainer3['type'] ?>" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">
                        <h4><?php echo $trainer3['trainer_name']?></h4>
                            <span><?php echo $trainer3['profs']?></span>
                            <p><?php echo $trainer3['description']?></p>
                        </div>
                    </div>
                </div>
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                <div class="team-thumb">
                        <img src="images/team/<?php echo $trainer4['type'] ?>" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                        <h4><?php echo $trainer4['trainer_name']?></h4>
                            <span><?php echo $trainer4['profs']?></span>
                            
                            <p><?php echo $trainer4['description']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SCHEDULE -->
    


    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">H??y ?????t c??u h???i cho ch??ng t??i</h2>

                    <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="H??? v?? T??n">

                        <input type="email" class="form-control" name="cf-email" placeholder="Email">

                        <textarea class="form-control" rows="5" name="cf-message" placeholder="N???i Dung"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">G???i tin nh???n</button>
                        <hr>
                        <h3><img style="height: 100px; width: 100px;" src="./images/logo/logo.png" alt=""> HOTLINE: 1900 5798</h3>
                        <hr>
                    </form>
                </div>
                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">B???n c?? th??? t??m th???y ch??ng t??i ??? ????u?</h2>
                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.319350036688!2d106.66408561458914!3d10.786834792314457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1641390755645!5m2!1svi!2s" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>590 C??ch M???ng Th??ng T??m, Ph?????ng 11, Qu???n 3, Th??nh ph??? H??? Ch?? Minh</p>
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.956358425183!2d106.69232341458947!3d10.81465179229559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ebda22c199%3A0x599041b23a93b5cf!2zMzAyIE5ndXnhu4VuIFbEg24gxJDhuq11LCBQaMaw4budbmcgMTEsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1641391727149!5m2!1svi!2s" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>302 Nguy???n V??n ?????u, Ph?????ng 11, B??nh Th???nh, Th??nh ph??? H??? Ch?? Minh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-4 col-md-5">
                    <p class="copyright-text">Copyright &copy; 2022 FPTGYM Fitness Co.

                        <br>Design: <a href="FPTGYM.com">FPTGYM</a>
                    </p>
                </div>

                <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                    <p class="mr-4">
                        <i class="fa fa-envelope-o mr-1"></i>
                        <a href="em">FPTGYM@gmail.com</a>
                    </p>

                    <p><i class="fa fa-phone mr-1"></i> 010-020-0840</p>
                </div>

            </div>
        </div>
    </footer>

  <!-- Modal Regist -->
  <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">????ng k?? th??nh vi??n</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" name="form-register" role="form" action="registration.php"
                        method="POST">
                        <input type="text" class="form-control" name="cf-name" placeholder="H??? v?? T??n">
                        <select class="form-control" name="cf-gender">
                            <option selected>Ch???n gi???i t??nh</option>
                            <option class="form-control" value="Nam">Nam</option>
                            <option class="form-control" value="N???">N???</option>
                            <option class="form-control" value="Kh??c">Kh??c</option>
                        </select>

                        <input type="email" class="form-control" name="cf-email" placeholder="Email"
                            onchange="checkEmail()">
                        <small id="erMail" class="form-text text-muted" style="color: red !important;"></small>
                        <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890"
                            onchange="checkPhone()">
                        <small id="erPhone" class="form-text text-muted" style="color: red !important;"></small>

                        <input type="date" class="form-control" name="cf-age" placeholder="Ng??y sinh" 
                            onchange="checkAge()">
                        <small id="erUN" class="form-text text-muted" style="color: red !important;"></small>

                        <input type="text" class="form-control" name="cf-username" placeholder="T??n ????ng nh???p"
                            onchange="checkUsername()">
                        <small id="erUN" class="form-text text-muted" style="color: red !important;"></small>
                        <input type="password" class="form-control" name="cf-password" placeholder="M???t kh???u">

                        <input type="password" class="form-control" name="cf-confirm" placeholder="Nh???p l???i m???t kh???u">

                        <button type="submit" class="form-control" id="submit-button" name="data-register"
                            onclick="check(event)">????ng k??</button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signup-agree">
                            <label class="custom-control-label text-small text-muted" for="signup-agree">I agree to the
                                <a href="#">Terms &amp;Conditions</a>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>

    <!-- Login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">????ng nh???p</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form" action="login.php" method="POST">

                        <input type="text" class="form-control" name="cf-username" placeholder="T??n ????ng nh???p">

                        <input type="password" class="form-control" name="cf-password" placeholder="M???t kh???u">

                        <div class="form-group d-md-flex">
                            <div class="w-100 text-md-right">
                                <a href="#">Qu??n m???t kh???u?</a>
                            </div>
                        </div>

                        <button type="submit" class="form-control" id="submit-button" name="submit-login">????ng
                            nh???p</button>

                        <div class="w-100 text-center mt-4 text">
                            <p class="mb-0">B???n ch??a c?? t??i kho???n?</p>
                            <a href="#" data-toggle="modal" data-dismiss="modal" aria-label="Close" data-target="#membershipForm">????ng k??</a>
                        </div>

                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>
    <form name="formCheck" method="POST" style="display: none;">
        <input type="text" name="phone">
        <input type="text" name="email">
    </form>

    <script>
    function check(e) {
        if (document.getElementById('erPhone').innerText != '') {
            e.preventDefault();
        }
        if (document.getElementById('erMail').innerText != '') {
            e.preventDefault();
        }
        if (document.getElementById('erUN').innerText != '') {
            e.preventDefault();
        }
    }

    function checkPhone() {
        setTimeout(() => {
            $.ajax({
                url: 'registration.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    phone_check: document.forms['form-register']['cf-phone'].value
                }
            }).done(function(result) {
                document.getElementById('erPhone').innerText = result;
            });
        }, 1000);
    }

    function checkEmail() {
        setTimeout(() => {

            $.ajax({
                url: 'registration.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    mail_check: document.forms['form-register']['cf-email'].value
                }
            }).done(function(result) {
                document.getElementById('erMail').innerText = result;
            });
        }, 1000);
    }

    function checkUsername() {
        setTimeout(() => {

            $.ajax({
                url: 'registration.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    username_check: document.forms['form-register']['cf-username'].value
                }
            }).done(function(result) {
                console.log(result);
                document.getElementById('erUN').innerText = result;
            });
        }, 1000);
    }
    function checkAge() {
        setTimeout(() => {

            $.ajax({
                url: 'registration.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    age_check: document.forms['form-register']['cf-age'].value
                }
            }).done(function(result) {
                console.log(result);
                document.getElementById('erUN').innerText = result;
            });
        }, 1000);
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