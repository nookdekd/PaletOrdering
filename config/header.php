<?php
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


 <section class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-6 col-lg-4">
                    <div class="float-left">
                        <ul class="header_social">
                            <li><a href="#"><i class="ti-facesbook"></i></a></li>
                            <li><a href="#"><i class="ti-twistter"></i></a></li>
                            <li><a href="#"><i class="ti-insstagram"></i></a></li>
                            <li><a href="#"><i class="ti-skypse"></i></a></li>
                            <li><a href="#"><i class="ti-vismeo"></i></a></li>
                        </ul>   
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6 col-sm-6 logo-wrapper">
                    <a href="/thewooding/" class="logo">
                        <img src="asset/img/P.png" alt="">
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 search-trigger">
                    <div class="right-button">
                        <ul>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </section>
    <header id="header" class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="/thewooding/">หน้าหลัก</a></li> 
                            <li class="nav-item"><a class="nav-link" href="/thewooding/carts/product">สินค้าของทางร้าน</a></li> 
                            <li class="nav-item"><a a class="nav-link" href="/thewooding/carts/order_custom">สั่งทำสินค้า</a></li>
                            <li class="nav-item"><a class="nav-link" href="/thewooding/carts/cart"><i class="bx bx-cart"></i>ตระกร้าสินค้า ( <?php echo $meQty; ?> ชิ้น )</a></li>
							<?php if($role!=1) : ?>
                                 <li class="nav-item"><a a class="nav-link" href="/thewooding/carts/order_detail">รายการสั่งซื้อ</a></li>
                            <?php endif; ?> 
                           
                            <?php if($role==1) : ?>
                                <li class="nav-item"><a class="nav-link" href="/thewooding/dbadmin/dashboard">ตั้งค่าระบบ</a></li>
                            <?php endif; ?>  
                            
                            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                                <li class="nav-item"><a class="nav-link" href="/thewooding/config/logout"><i class="bx bx-log-out-circle"></i> ออกจากระบบ</a></li>
                            <?php endif; ?> 

                            <?php if(empty($_SESSION['id'])) : ?>
                                    <li class="nav-item"><a class="nav-link" href="/thewooding/config/signin"><i class="bx bx-log-out-circle"></i> เข้าสู่ระบบ</a></li>
                            <?php endif; ?>         
                        </ul>
					</div>
                </div>
            </nav>
			<center class="mb-5"><h2> Welcome <?php echo $_SESSION['fname']; ?> </h2></center>
        </div>
    </header>
	

    </div>
  </header>