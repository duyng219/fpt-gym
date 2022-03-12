<?php
session_start();
$name = '';
if ($_SESSION['login']) {
    $name = json_decode($_SESSION['member'])->name;
    $member_id = json_decode($_SESSION['member'])->member_id;
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
                    <a href="#" style="font-size: 25px; padding-left: 3px;">FPTGym Fitness</a></a>                  
            </div>            

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                
                    <li class="nav-item">
                        <a href="index.php" class="nav-link smoothScroll">Trang chủ</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Về chúng tôi</a>
                    </li>                  

                    <li class="nav-item">
                        <a href="class_register.php" class="nav-link smoothScroll">Đăng ký lớp</a>
                    </li>

                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link smoothScroll">Phản hồi</a>
                    </li>
                   <li class="nav-item">
                        <a href="<?= $name != '' ? 'memberprofile.php' : '#' ?>" 
                            class="nav-link smoothScroll"
                            class="btn custom-btn bg-color mt-3"
                            <?= $name != '' ? '' : 'data-toggle="modal" data-target="#login"' ?>>
                            <?= $name != '' ? $name : 'Đăng nhập' ?>
                        </a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com" class="fa fa-facebook"></a></li>
                    <li><a href="https://twitter.com/" class="fa fa-twitter"></a></li>
                    <li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li>
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

                        <h6 data-aos="fade-up" data-aos-delay="300">thay đổi cơ thể, thay đổi cuộc sống!</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">NÂNG CẤP CƠ THỂ CỦA BẠN TẠI FPTGym Fitness</h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Bắt đầu</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">Xem Thêm</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">SĂN CHẮC BỀN BỈ CÙNG NHAU</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">- Trên +80 bộ môn và lớp học để tập cùng bạn bè</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- Cùng xả stress, lấy dáng đẹp theo lịch tập cá nhân hóa</h6>
                    <h6 class="mb-4 text-white" data-aos="fade-up">- Cùng tận hưởng trải nghiệm Gym 5 sao chỉ có tại FPTGym</h6>                    
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                <div class="about-working-hours">
                        <div>
                            <h2 class="mb-4 text-white" data-aos="fade-down" data-aos-delay="400">Giờ Hoạt Động: </h2>
                            <strong class="d-block" data-aos="fade-down" data-aos-delay="600">Thứ 2 - Thứ 7:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1000" style="padding-left:5px">+ Buổi sáng: 6:00 - 12:00 </p>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="1500" style="padding-left:5px">+ Buổi sáng: 16:00 - 22:00 </p>
                            <strong class="d-block" data-aos="fade-down" data-aos-delay="2000">Chủ nhật:</strong>
                            <p class="d-block" data-aos="fade-down" data-aos-delay="2500" style="padding-left:5px">- Cả ngày: 6:00 - 22:00 </p>
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
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Xin chào, chúng tôi là FPTGYM</h2>

                    <b>Chúng tôi muốn chứng minh rằng để có được cuộc sống tốt và lành mạnh hơn, bạn không
                        nhất thiết phảI tuân theo kỷ luật thép hoặc phải hy sinh, thay vào đó, chỉ cần đưa vào lối sống của mình những thói quen
                        giúp nâng cao chất lượng cuộc sống, đồng thời giảm thiểu những thói quen không có lợi..</b>
                        <p>Năm 2022 FPTGYM trở phòng tập thể dục thể hình quốc tế đầu tiên và lớn nhất ra mắt tại Việt Nam. 
                        Với sứ mệnh “Làm Cho Cuộc Sống Tốt Đẹp Hơn”, FPTGYM không chỉ đơn thuần giống như bao phòng tập thông 
                        thường khác. Đây là trung tâm của phong cách sống năng động, nhằm truyền cảm hứng, mang lại niềm vui sảng khoái cũng như 
                        nguồn sinh khí mới cho cộng đồng.</p>
                        <p>Các thành viên trong đội ngũ quản lý cấp cao của CFYC đều từng là những nhân vật cực kỳ quan trọng đối với sự phát triển
                             của một số thương hiệu hàng đầu trong ngành thể dục thể hình, như: 24 Hour Fitness, California Fitness, Jackie Chan 
                             Sport, UFC Gyms, Crunch Fitness, Yoga Works và Les Mills.</p>
                             <p>Đây là nơi hội tụ của việc luyện tập, thời trang và giải trí trong một môi trường lành mạnh, tràn trề sinh lực. Từ
                             âm nhạc và ánh sáng cho tới các trang thiết bị hiện đại và đội ngũ huấn luyện viên đẳng cấp quốc tế, mỗi chi tiết đều
                              được chuẩn bị một cách tỉ mỉ và công phu, nhằm mang lại những trải nghiệm tích cực và tuyệt vời nhất cho khách hàng. 
                              Thành công vượt bậc của FPTGYM gắn liền với tầm nhìn và vai trò lãnh đạo của nhà sáng lập, đồng thời cũng là CEO – ông 
                              Nguyễn Trung Tuấn đã thổi bùng trong toàn công ty của ông ngọn lửa đam mê tận hưởng cuộc sống và giải trí, vốn đã tạo
                              nên một cuộc cách mạng trong cách luyện tập thể dục thể hình trên khắp châu Á.
                             </p>
                             <p>Với Hội đồng quản trị kết hợp của hơn 30 năm kinh nghiệm tại hàng chục quốc gia khác nhau, FPTGYM đã và đang sở hữu 
                                một đội ngũ lãnh đạo chuyên nghiệp và lão luyện bậc nhất trong ngành thể dục thể hình. Đó cũng là nguyên nhân chính 
                                giúp CFYC luôn trung thành và nhất quán trong việc thực hiện cam kết của thương hiệu: Làm Cho Cuộc Sống Tốt Đẹp Hơn.</p>
                </div>  
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                    <img style="height: 400px; width: 500px;" src="./images/logo/logo.png" alt="">
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
                    <h6 data-aos="fade-up">Có được một cơ thể hoàn hảo</h6>

                    <h2 data-aos="fade-up" data-aos-delay="200">Các lớp đào tạo của chúng tôi </h2>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/crossfit1.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Crossfit</h3>
                            <p class="mt-3">CrossFit là một bộ môn thể hình giúp bạn tăng cường sức mạnh thông qua các bài tập cực kỳ đa dạng và đầy
                                thách thức. Với khối lượng các bài tập đa dạng và cường độ cao liên tục, CrossFit là một bộ môn dành mọi người ở mọi
                                kích cỡ để cải thiện sức khỏe thể chất và tim mạch.</p>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Crossfit.php"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/power1.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Power Fitness</h3>
                            <p class="mt-3">Bạn đang dự định tập Powerlifting để nâng cao sức mạnh bản thân nhưng băn khoăn bộ môn này liệu có phù 
                                hợp với mình không? Hãy cùng chúng tôi tìm hiểu kỹ bài viết sau đây để hiểu rõ hơn về khái niệm này nhé !</p>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Power.php"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/cardio-class.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Cardio</h3>
                            <p class="mt-3">Với bài tập thể dục Cardio, bạn không cần phải dành hàng giờ mỗi ngày tại phòng tập thể dục để duy trì
                                sức khỏe tim mạch và giảm cân. Cardio có thể giúp bạn thực hiện bài tập tim mạch hiệu quả tại nhà, ngay cả khi bạn
                                không có nhiều không gian hoặc thiết bị để tập luyện.</p>
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Cardio.php"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/muscle1.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Mucse Relax</h3>
                            <p class="mt-3">Với bài tập thể dục Cardio, bạn không cần phải dành hàng giờ mỗi ngày tại phòng tập thể dục để duy trì
                                sức khỏe tim mạch và giảm cân. Cardio có thể giúp bạn thực hiện bài tập tim mạch hiệu quả tại nhà, ngay cả khi bạn
                                không có nhiều không gian hoặc thiết bị để tập luyện.</p>
                                
                                <button type="submit" class="form-control" id="submit-button" name="submit"><a href="Cardio.php"> Xem Thêm</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
  


    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Hãy đặt câu hỏi cho chúng tôi</h2>

                    <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="Họ và Tên">

                        <input type="email" class="form-control" name="cf-email" placeholder="Email">

                        <textarea class="form-control" rows="5" name="cf-message" placeholder="Nội Dung"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Gửi tin nhắn</button>
                        <hr>
                        <h3><img style="height: 100px; width: 100px;" src="./images/logo/logo.png" alt=""> HOTLINE: 1900 5798</h3>
                        <hr>
                    </form>
                </div>
                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Bạn có thể tìm thấy chúng tôi ở đâu?</h2>
                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.319350036688!2d106.66408561458914!3d10.786834792314457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1641390755645!5m2!1svi!2s" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>590 Cách Mạng Tháng Tám, Phường 11, Quận 3, Thành phố Hồ Chí Minh</p>
                        <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.956358425183!2d106.69232341458947!3d10.81465179229559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ebda22c199%3A0x599041b23a93b5cf!2zMzAyIE5ndXnhu4VuIFbEg24gxJDhuq11LCBQaMaw4budbmcgMTEsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1641391727149!5m2!1svi!2s" width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i>302 Nguyễn Văn Đậu, Phường 11, Bình Thạnh, Thành phố Hồ Chí Minh</p>
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

    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">Đăng ký thành viên</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                <form class="membership-form webform" role="form" action="registration.php" method="POST">
                        <input type="text" class="form-control" name="cf-name" placeholder="Họ và Tên">
                        <select class="form-control" name="cf-gender">
                            <option selected>Chọn giới tính</option>
                            <option class="form-control" value="nam">Nam</option>
                            <option class="form-control" value="nu">Nữ</option>
                            <option class="form-control" value="khac">Khác</option>
                        </select>

                        <input type="email" class="form-control" name="cf-email" placeholder="Nhập email">

                        <input type="tel" class="form-control" name="cf-phone" placeholder="123-456-7890">

                        <input type="text" class="form-control" name="cf-age" placeholder="Nhập tuổi">

                        <input type="text" class="form-control" name="cf-username" placeholder="Tên đăng nhập">

                        <input type="password" class="form-control" name="cf-password" placeholder="Mật khẩu">

                        <input type="password" class="form-control" name="cf-confirm" placeholder="Nhập lại mật khẩu">

                        <button type="submit" class="form-control" id="submit-button" 
                        name="data-register">Đăng ký</button>

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
                    <h2 class="modal-title" id="membershipFormLabel">Đăng nhập</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form" action="login.php" method="POST">

                        <input type="text" class="form-control" name="cf-username" placeholder="Tên đăng nhập">

                        <input type="password" class="form-control" name="cf-password" placeholder="Mật khẩu">

                        <div class="form-group d-md-flex">
                            <div class="w-100 text-md-right">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>

                        <button type="submit" class="form-control" id="submit-button" name="submit-login">Đăng
                            nhập</button>

                        <div class="w-100 text-center mt-4 text">
                            <p class="mb-0">Bạn chưa là thành viên?
                            <a href="#" data-toggle="modal" data-dismiss="modal" aria-label="Close" 
                            data-target="#membershipForm"><b> Đăng ký tài khoản </b></a></p>
                        </div>

                    </form>
                </div>

                <div class="modal-footer"></div>

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