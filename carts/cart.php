<?php
session_start();
error_reporting(0);
require '../config/connect.php';
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
if (isset($_SESSION['qty']))
{
$meQty = 0;
foreach ($_SESSION['qty'] as $meItem)
{
$meQty = $meQty + $meItem;
}
} else
{
$meQty = 0;
}
if (isset($_SESSION['cart']) and $itemCount > 0)
{
$itemIds = "";
foreach ($_SESSION['cart'] as $itemId)
{
$itemIds = $itemIds . $itemId . ",";
}
$inputItems = rtrim($itemIds, ",");
$meSql = "SELECT * FROM products WHERE id in ({$inputItems})";
$result = $conn->query($meSql); 
$meCount = mysqli_num_rows($result);
} else
{
$meCount = 0;
}
?>

<script type="text/javascript">
function updateSubmit(){
if(document.formupdate.order_fullname.value == ""){
alert('โปรดใส่ชื่อนามสกุลด้วย!');
document.formupdate.order_fullname.focus();
return false;
}
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
      <div class="section-title">
          <center><h2>Carts</h2></center>
        </div>
 <!-- Main component for a primary marketing message or call to action -->
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
 <form action="config/updatecart.php" method="post" name="fromupdate">
 <table class="table table-hover table-dark mt-5">
 <thead>
 <tr>
 <th></th>
 <th>รหัสสินค้า</th>
 <th>ชื่อสินค้า</th>
 <th>รายละเอียด</th>
 <th>จำนวน</th>
 <th>ราคาต่อหน่วย</th>
 <th>จำนวนเงิน</th>
 <th>&nbsp;</th>
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
 <td><img height="70" width="70" src="/thewooding/dbadmin/assets/img/product/<?php echo $meResult['product_img_name']; ?>" border="0"></td>
 <td><?php echo $meResult['product_code']; ?></td>
 <td><?php echo $meResult['product_name']; ?></td>
 <td><?php echo $meResult['product_desc']; ?></td>
 <td>
 <input type="number" name="qty[<?php echo $num; ?>]" value="<?php echo $_SESSION['qty'][$key]; ?>" class="form-control" style="width: 60px;text-align: center;">
 <input type="hidden" name="arr_key_<?php echo $num; ?>" value="<?php echo $key; ?>">
 </td>
 <td><?php echo number_format($meResult['product_price'],2); ?></td>
 <td><?php echo number_format(($meResult['product_price'] * $_SESSION['qty'][$key]),2); ?></td>
 <td>
 <a class="btn btn-light " href="config/removecart.php?itemId=<?php echo $meResult['id']; ?>" role="button">
 <i class="fa fa-minus-circle">ลบ</i></a>
 </td>
 </tr>
 <?php
 $num++;
 }
 ?>
 <tr>
 <td colspan="8" style="text-align: right;">
 <h4>ราคารวม <?php echo number_format($total_price,2); ?> บาท</h4>
 </td>
 </tr>
 <tr>
 <td colspan="8" style="text-align: right;">
 
 <a href="category" type="button" class="btn btn-light ">เลือกสินค้า</a>
 <button type="submit" class="btn btn-light ">คำนวณราคาใหม่ <a class="fa fa-repeat"></a></button>
 <a href="order" type="button" class="btn btn-light">สั่งซื้อสินค้า</a>
 </td>
 </tr>
 </tbody>
 </table>
 </form>
 <?php
 }
 ?>
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
</html>
