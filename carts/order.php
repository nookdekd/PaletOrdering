<?php
session_start();
require '../config/connect.php';
include_once('../config/functions.php');
error_reporting(0);
  $userdata = new DB_con();
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());
if (isset($_SESSION['qty'])) {
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem) {
$meQty = $meQty + $meItem;
}
} else {
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0) {
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId) {
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else {
$meCount = 0;
}
?>

<?php
$sql1 = "SELECT MAX(`id`) AS `lastid` FROM `orders`";
$result1 = $conn->query($sql1);
$row1 = $result1 ->fetch_assoc();
$idf = $row1['lastid'];
$date = date('ym-d');
$code = sprintf($date.'-%04d', $idf);
?>

<script type="text/javascript">
function updateSubmit(){

if(document.formupdate.order_address.value == ""){
alert('โปรดใส่ที่อยู่ด้วย!');
document.formupdate.order_address.focus();
return false;
}
if(document.formupdate.order_phone.value == ""){
alert('โปรดใส่เบอร์โทรด้วย!');
document.formupdate.order_phone.focus();
return false;
}
document.formupdate.submit();
return false;
}
</script>

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
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
<?php include_once('../config/header.php'); ?>     

  <div class="container">
    <div class="row">
     <div class="container">
      <h3>รายการสั่งซื้อ</h3>
 <hr>
 <?php
 if ($action == 'removed')
 {
 echo "<div class=\"alert alert-warning\">ลบสินค้าเรียบร้อยแล้ว</div>";
 }
  
 if ($meCount == 0)
 {
 echo "<div class=\"alert alert-warning\">ไม่มีสินค้าอยู่ในตะกร้า</div>";
 } else
 {
 ?>
 <form action="config/updateorder.php" method="post" name="formupdate" role="form" id="formupdate" onsubmit="JavaScript:return updateSubmit();">
 
 <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" style="width: 300px; display: none;" name="order_fullname" value="<?php echo $_SESSION['id']; ?>" >
 
 <table class="table table-bordered table-dark">
 <thead>
 <tr>
 <th>เลขที่ใบสั่งซื้อ</th>
 <th>ชื่อ - นามสกุล</th>

 </tr>
 </thead>
 <tbody>
 
 <tr>
 <td><input type="text" class="form-control" id="report_id" placeholder="" style="width: 200px;" name="report_id" value="<?php echo $code; ?>"></td>
 <td> <input type="text" class="form-control" id="order_fullname" placeholder="ใส่ชื่อนามสกุล" style="width: 200px;" name="order_fullname2" value="<?php echo $_SESSION['fname']; ?>"></td>
 </tr>
 </tbody>
 </table>

 
 </div>
 <div class="container mt-5">
 <table class="table table-bordered table-dark">
 <thead>
 <tr>
 <th>รหัสลูกค้า</th>
 <th>รหัสสินค้า</th>
 <th>ชื่อสินค้า</th>
 <th>รายละเอียด</th>
 <th>จำนวน</th>
 <th>ราคาต่อหน่วย</th>
 <th>จำนวนเงิน</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $total_price = 0;
 $num = 0;
 while($meResult = mysqli_fetch_array($result)) 
 {
 $key = array_search($meResult['id'], $_SESSION['cart']);
 $total_price = $total_price + ($meResult['product_price'] * $_SESSION['qty'][$key]);
 ?>
 <tr>
 <td><?php echo $_SESSION['id']; ?></td>
 <td><?php echo $meResult['product_code']; ?></td>
 <td><?php echo $meResult['product_name']; ?></td>
 <td><?php echo $meResult['product_desc']; ?></td>
 <td>
 <?php echo $_SESSION['qty'][$key]; ?>
 <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
 <input type="hidden" name="product_id[]" value="<?php echo $meResult['id']; ?>" />
 <input type="hidden" name="product_price[]" value="<?php echo $meResult['product_price']; ?>" />
 </td>
 <td><?php echo number_format($meResult['product_price'], 2); ?></td>
 <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]), 2); ?></td>
 </tr>
 <?php
 $num++;
 }
 ?>
 <tr>
 <td colspan="8" style="text-align: right;">
 <h4>ราคารวม <?php echo number_format($total_price, 2); ?> บาท</h4>
 </td>
 </tr>
 <tr>
 <td colspan="8" style="text-align: right;">
 <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
 <a href="cart.php" type="button" class="btn btn-light ">ย้อนกลับ</a>
 <button type="submit" class="btn btn-light ">บันทึกการสั่งซื้อสินค้า</button>
 </td>
 </tr>
 </tbody>
 </table>
      </div>
    </div>
  </div>
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
<?php } ?>
</html>
