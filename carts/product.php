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
          <center><h2>Products</h2></center>
        </div>
        </div>
          <div class="row">
              <?php
              $userid = $_SESSION['id'];
              //$catId = $_GET['catId'];
              $products = new DB_con();
              $sql = $products->fetchdata_product();
              while($row = mysqli_fetch_array($sql)) 
              {
              ?>
          
          <div class="col-lg-3 col-md-3 mb-1 mt-2">
            <div class="card h-100">
              <a><img class="card-img-top" height="200" width="200" src="/thewooding/dbadmin/assets/img/product/<?php echo $row['product_img_name']; ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                <?php echo $row['product_name']; ?>
                </h4>
                <h5>ราคา <?php echo number_format($row['product_price'],2); ?></h5>
                <p class="card-text"><?php echo $row['product_desc']; ?></p>
                <?php if($row['qty']<=0) : ?>
                <p class="card-text">สินค้าหมด</p>
                <?php endif; ?> 
                <?php if($row['qty']>=1) : ?>
                <p class="card-text">คงเหลือจำนวน <?php echo $row['qty']; ?></p>
                <?php endif; ?> 
                <div class="col-m-6">

                <?php if($row['qty']<=0) : ?>
                <a class="btn btn-light" href="#" role="button">
                <i class="fa fa-minus-circle"></i></a>
                <?php endif; ?> 

                <?php if($row['qty']>=1) : ?>
                <a class="btn btn-light" href="config/updatecart.php?catId=<?php echo $catId; ?>&itemId=<?php echo $row['id']; ?>" role="button">
                <i class="fa fa-plus-circle"></i></a>
                <?php endif; ?> 
                <a class="btn btn-light"
                  data-toggle="modal"
                  data-target="#exampleModal"
                  data-id="<?php echo $row['id']; ?>">รายละเอียดสินค้า</a>
                </div>
              </div>
            </div>
          </div>
         <?php } ?>
        </div>
      </div>
    </div>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title" id="memberModalLabel"></h4>
                   <div class="dash">
                   </div>
            </div>
        </div>
     </div>
  </div>
</div>
</section>
</main>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attribute    
          var rid = button.data('id')
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "popup_model.php?repair_id="+rid,
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script> 
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
