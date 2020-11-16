<?php 
    session_start();
    include_once('../config/functions.php');
    include_once('../config/connect.php');
    if ($_SESSION['id'] == "") {
      header("location: /thewooding/config/signin.php");
  } else 
    
    $updatedata = new DB_con();
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</head>
<body>
<?php include_once('../config/header.php'); ?>     

<div class="container">
      <div class="container mt-5">
        <div class="section-title">
          <center><h2><center><h2>รายการสินค้าของ <?php echo $_SESSION['fname']; ?></h2></center></h2></center>
        </div>
        </div>
<div class="container">
<?php
 $perpage = 10;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
 $sql = "SELECT orders.id ,order_date,fullname,status_name,orders.status_id,color FROM orders,tblusers,status_cash 
 where status_cash.status_id=orders.status_id and tblusers.id=orders.cust_id order by orders.id DESC limit {$start} , {$perpage}  ";
 $query = mysqli_query($conn, $sql);
 ?>

<div class="container">
<table class="table table-hover mt-5" id="example">
<thead>
<tr>
<th>#</th>
<th>วันที่สั่งซื้อ</th>
<th>ชื่อลูกค้า</th>
<th>สถานะ</th>
<th></th>
<th></th>
<th></th>
</tr>
</thead>
<tbody>

<?php 
$userid = $_SESSION['id'];
$updateuser = new DB_con();                         
if($userid==1)  
{ 
    $sql = $updateuser->fetchdata_order_detail_admin($userid);
    while($row = mysqli_fetch_assoc($query)){ $status_id=$row['status_id']; ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
<td>
<a class="btn btn-success" href="orderbill?order_id=<?php echo $row['id']; ?>" role="button">
ใบเสร็จ <i class="fa fa-file"></i></a>
</td>

<?php if($status_id==0) : ?>
<td>
<a class="btn btn-info" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>
<?php endif; ?>
</tr>
<?php }}
else
{
    $sql = $updateuser->fetchdata_order_detail($userid);
    while($row = mysqli_fetch_array($sql)) { $status_id=$row['status_id']; ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td><?php echo $_SESSION['fname']; ?></td> 
<td><?php echo $row['status_name']; ?></td>
<td><span class="badge badge-secondary" style="background-color:<?php echo $row['color']; ?>"><?php echo $row['status_name']; ?></span></td>
<td>
<a class="btn btn-dark" href="orderbill?order_id=<?php echo $row['id']; ?>" role="button">
ใบเสร็จ <i class="fa fa-file"></i></a>
</td>

<?php if($status_id==0) : ?>
<td>
<a class="btn btn-dark" href="cashout?order_id=<?php echo $row['id']; ?>" role="button">
ชำระเงิน <i class="fa fa-credit-card"></i></a>
</td>
<?php endif; ?> 
</tr>

<?php }
}?>
</table>

 <?php
 $sql2 = "select * from orders where status_id = 0 and cust_id=$userid";
 $query2 = mysqli_query($conn, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
 ?>
 
 <nav aria-label="...">
 <ul class="pagination">
 <li class="page-item disabled">
 <a class="page-link" href="order_detail?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="page-item"><a class="page-link" href="order_detail?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li class="page-item">
 <a class="page-link" href="order_detail?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
      </div>
    </div>
  </div>
<script>
$('#example').dataTable( );
</script>
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
