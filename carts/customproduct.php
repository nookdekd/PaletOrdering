<?php 
    session_start();
    include("config/addcustom.php"); 
    include_once('../config/functions.php');
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
          <center><h2>The Custom</h2></center>
        </div>
        </div>
          <div class="row">
          <div class="card-body table-responsive">
          <div class="form-group">
          <form action="" method="post" enctype="multipart/form-data" class="mb-3">
     
          <div class="row">
            <div class="col-sm">
            <div class="mb-3">
                    <label for="product_code" class="form-label">รูปแบบงาน</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value=""  >
                </div>
            </div>
            <div class="col-sm">
            <div class="mb-3">
                    <label for="product_name" class="form-label">ความกว้าง</label>
                    <input type="text" class="form-control" id="product_w" name="product_w" onblur="checkusername(this.value)">
                    <span id="usernameavailable"></span>
                </div>
            </div>
            <div class="col-sm">
            <div class="mb-3">
                <label for="product_desc" class="form-label">ความสูง</label>
                    <input type="text" class="form-control" id="product_h" name="product_h">
                </div>
            </div>
          </div>
          
          <div class="mb-3">
              <label for="product_price" class="form-label">รายละเอียด</label>
              <input type="text" class="form-control" id="product_desc" name="product_desc">
          </div>

      <button type="submit" name="submit" class="btn btn-danger btn-block mt-4">
        Upload File
      </button>
    </form>
  </div>
</div>
        </div>
      </div>
    </div>
   
</section>
</main>


<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
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
