<?php 
    session_start();
    include_once('../config/functions.php');
    error_reporting(0);
    $updatedata = new DB_con();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include_once('../config/header.php'); ?>

     <main id="main">
      <section id="contact" class="contact">
        <div class="container">
        <div class="container mt-5">
        <div class="section-title">
          <center><h2>Category</h2></center>
        </div>
        </div>

         <div class="row">
          <?php
          $userid = $_SESSION['id'];
          $products = new DB_con();
          $sql = $products->fetchdata_category($userid);
          while($row = mysqli_fetch_array($sql)) 
          {
          ?>

          <div class="col-lg-3 col-md-3 mb-1 mt-2">
            <div class="card h-100">
              <a><center><img height="200" width="200" src="/thewooding/dbadmin/assets/img/category/<?php echo $row['catPic']; ?>" ></center></a>
              <div class="card-body">
                <h4 class="card-title">
                <a style="display: none;"><?php echo $row['catId']; ?></a>
                <center><?php echo $row['catName']; ?></center>
                </h4>
                <center><a class="btn btn-light" href="product.php?catId=<?php echo $row['catId']; ?>" role="button">
                <span class="glyphicon glyphicon-shopping-cart"></span>เลือกสินค้า</a></center>
              </div>
            </div>
          </div>
         <?php } ?>
        </div>
       </div>
      </div>
     </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-2.2.4.min.js"></script>
<script src="asset/js/popper.js"></script>
<script src="asset/asset/js/bootstrap.min.js"></script>
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
