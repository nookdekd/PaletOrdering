<?php 
    session_start();
    include_once('../config/functions.php');
    include("../config/file-upload2.php"); 
    $updatedata = new DB_con();
    $order_id = $_GET['order_id'];
      $updateuser = new DB_con();
      $sql = $updateuser->fetchorder_detail($order_id);
      $row = mysqli_fetch_array($sql); 
    if (isset($_POST['update'])) {

        $userid = $_SESSION['id'];
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $email = $_POST['useremail'];
        $password = $_POST['password'];
        $date = $_POST['regdate'];

        $sql = $updatedata->update($fname, $uname, $email, $password, $date, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='Infomation.php'</script>";
        }
    }
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

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <?php include_once('../config/header.php'); ?> 
  <!-- ======= Hero Section ======= -->
  <section  class="d-flex flex-column justify-content-center align-items-center">
  <div class="hero-container" data-aos="fade-in">
  <div class="container">

 <hr>
 <!-- Main component for a primary marketing message or call to action -->

   <?php include_once('config/header.php'); ?> 
   <form action="" method="post" enctype="multipart/form-data" class="mb-3">
   <div class="mb-3">
   <input type="text" class="form-control" style="width: 300px; display: none;" id="order_id" name="order_id" value="<?php echo $row['order_id']; ?>">
   </div>
      
      <div class="mb-3">
            
            <select name="status_id" id="status_id" class="form-control" style="width: 300px; display: none;">
              <option value="1">ชำระเงิน</option>
            </select>
            </div>

            <div class="user-image mb-3 text-center">
        <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
          <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
        </div>
      </div>

      <div class="custom-file">
        <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" required>
        <label class="custom-file-label" for="chooseFile">เลือกสลิปที่ชำระเงิน</label>
      </div>

      <button type="submit" name="submit" class="btn btn-danger btn-block mt-4">
        Upload File
      </button>
    </form>

    <?php if(!empty($resMessage)) {?>
    <div class="alert <?php echo $resMessage['status']?>">
      <?php echo $resMessage['message']?>
    </div>
    <?php }?>
  </div>
    </form>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<table class="table table-hover table-dark">
<tr><br>
<th>ธนาคาร</th>
<th>ชื่อบัญชี</th>
<th>เลขที่บัญชี</th>
<th></th>
</tr>

<tr class = "  ">
<td>กรุงไทย</td>
<td>ชื่อร้าน</td>
<td>xxx-xxx-xxxx</td>
<td><img  height="80" width="80" src="https://tna.mcot.net/wp-content/uploads/2017/06/1497083701751.jpg" alt=""></td>
</tr>
</table>
 
<table class="table table-hover table-dark">
<tr><br>
<th>ลำดับ</th>
<th>ชื่อสินค้า</th>
<th>ราคาสินค้า</th>
<th>จำนวน</th>
<th>ราคาสุทธิ</th>
     
     
    </tr>
    
<?php 
$i = 0;
$total=0;

$order_id = $_GET['order_id'];
$updateuser = new DB_con();
$sql = $updateuser->fetchorder_detail($order_id);
while($row = mysqli_fetch_array($sql)) {$i++;
$sumqty= $row['order_detail_quantity']*$row['order_detail_price'];
$total+= $sumqty; ?>
<tr class = "  ">
<td><?=$i;?></td>
<td><?php echo $row['product_name']; ?></td>
<td><?php echo $row['order_detail_price']; ?></td>
<td><?php echo $row['order_detail_quantity']; ?></td>
<td align = 'right'><?php echo number_format( $sumqty)." บาท.-"; ?></td>
<?php } ?></tr></table>

<table class="table table-hover table-dark">
<tr class = ""><td colspan="3" align = 'right'><b><center>จำนวนเงินรวม</center></b></td>
<td><p align = "right"><?php echo number_format( $total).' บาท.-'; ?></p></td>
</tr>
</table>
</div>
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#chooseFile").change(function () {
      readURL(this);
    });
  </script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</section><!-- End Hero -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
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
