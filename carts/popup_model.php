<?php
    session_start();
    include_once('../config/functions.php');
    include_once('../config/connect.php');
//    $id = $_GET['id'];
    $rid = $_GET['repair_id'];
	
    //session_start();
    //$_SESSION["empid"] = $user->id;
	
    //$sql = "SELECT * FROM toolsquantity AS tq LEFT JOIN tools AS tl ON tq.tools_id=tl.tools_id WHERE `toolsQuantity_id`='$id'";
    //$mem = mysqli_fetch_assoc($members);


    $sql = "SELECT * FROM products  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>เลือกหมวดหมู่</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <title></title>
</head>
<body>
  <main id="main">
    <section id="contact" class="contact">
      <div class="container">
        <center>
		  
					<img height="250" width="250" src="/thewooding/dbadmin/assets/img/product/<?php echo $mem['product_img_name'];?>">
		
        </center> 
                <table class="table table-hover">
                <thead>
                <tr>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียดสินค้า</th>
                <th>ราคา</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                <td><?php echo $mem['product_name']; ?></td>
                <td><?php echo $mem['product_desc']; ?></td>
                <td><?php echo $mem['product_price']; ?></td>
                </table>

</div>
    <center>
<div class="container">
  <button type="button" class="btn btn-light" data-dismiss="modal">ปิด</button>
</div>
    </center>    
</div>
</div>
</div>
</section><!-- End Contact Section -->
</main><!-- End #main -->
</body>
</html>
