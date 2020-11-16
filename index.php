<?php
session_start();
error_reporting(0);
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if(isset($_SESSION['qty'])){
$meQty = 0;
foreach($_SESSION['qty'] as $meItem){
$meQty = $meQty + $meItem;
}
}else{
$meQty=0;
}

$userid = $_SESSION['id'];
$role = $_SESSION['role_id'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="asset/img/favicon.png" type="image/png">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/themify-icons.css">
    <link rel="stylesheet" href="asset/css/flaticon.css">
    <link rel="stylesheet" href="asset/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="asset/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="asset/vendors/popup/magnific-popup.css">
    <!-- main css -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
</head>
<body>

    <?php include 'config/header.php' ?>

    <section class="fullwidth-block area-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid"  src="asset/img/magazine/1.jpg" alt="">
                        </div>
                        <div class="short_details">
                            <div class="meta-top d-flex">
                                <a href="#">เตียงนอนไม้พาเลท ทำจากไม้คุณภาพ</a>
                            </div>
                            <a class="d-block" href="#">
                                <h4>เเข็งเเรงทนทานไม่หักง่ายเเม้รับน้ำหนักเยอะ</h4>
                            </a>
                            <div class="meta-bottom d-flex" >
                                <a href="#">March 12 , 2020 . </a>
                                <a class="dark_font" href="#">By admin</a>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="single-blog style_two">
                        <div class="thumb">
                            <img class="img-fluid" style="opacity: 0.6"  src="asset/img/magazine/2.jpg" alt="">
                        </div>
                        <div class="short_details text-center ">

                            <div class="meta-top d-flex justify-content-center dark_font">
                                <a class="dark_font" href="#">เตียงนอนไม้พาเลท ทำจากไม้คุณภาพ</a>
                            </div>
                            <a class="d-block dark_font" href="#">
                                <h4>เเข็งเเรงทนทานไม่หักง่ายเเม้รับน้ำหนักเยอะ
                                </h4>
                            </a>
                            <div class="meta-bottom d-flex justify-content-center dark_font">
                                <a class="dark_font" href="#">March 12 , 2020 . </a>
                                <a class="dark_font" href="#">By เจ้าของร้าน</a>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                            <div class="single-blog style-three m_b_30">
                                <div class="thumb">
                                    <img class="img-fluid" src="asset/img/magazine/3.jpg" alt="">
                                </div>
                                <div class="short_details">

                                    <div class="meta-top d-flex justify-content-center">
                                        <a href="#">Lifestyle</a>
                                    </div>
                                    <a class="d-block" href="#">
                                        <h4>เเข็งเเรงทนทานไม่หักง่ายเเม้รับน้ำหนักเยอะ</h4>
                                    </a>
                                </div>
                            </div>

                        </div>
<!--                        <div class="col-12 col-md-6 col-lg-6 col-xl-12">-->
<!--                            <div class="single-blog style-three">-->
<!--                                <div class="thumb">-->
<!--                                    <img class="img-fluid" src="asset/img/magazine/4.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="short_details">-->
<!---->
<!--                                    <div class="meta-top d-flex justify-content-center">-->
<!--                                        <a href="#">Lifestyle</a>-->
<!--                                    </div>-->
<!--                                    <a class="d-block" href="#">-->
<!--                                        <h4>เหมาะสำหรับ: ทุกไลฟ์สไตล์</h4>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>    -->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
            </div>
        </div>
    </section>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-2.2.4.min.js"></script>
<script src="asset/js/popper.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/stellar.js"></script>
<script src="asset/vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="asset/js/jquery.ajaxchimp.min.js"></script>
<script src="asset/js/waypoints.min.js"></script>
<script src="asset/js/mail-script.js"></script>
<script src="asset/js/contact.js"></script>
<script src="asset/js/jquery.form.js"></script>
<script src="asset/js/jquery.validate.min.js"></script>
<script src="asset/js/mail-script.js"></script>
<script src="asset/js/theme.js"></script>
</body>
</html>