<?php 
    session_start();
    include_once('../../../config/functions.php');
    include_once('../../../config/connect.php');
    error_reporting(0);
    $updatedata = new DB_con();

    $sql44 = "SELECT sum(order_detail_price) as price FROM order_details,orders where order_details.order_id=orders.id and month(order_date) = month(now())";
    $result44 = $conn->query($sql44);
    $row44 = $result44 ->fetch_assoc();

    $sql5 = "SELECT sum(order_detail_price) as price FROM order_details";
    $result5 = $conn->query($sql5);
    $row5 = $result5 ->fetch_assoc();

    $sql6 = "SELECT count(id) as ord FROM orders";
    $result6 = $conn->query($sql6);
    $row6 = $result6 ->fetch_assoc();

    $sql7 = "SELECT count(id) as cid FROM tblusers";
    $result7 = $conn->query($sql7);
    $row7 = $result7 ->fetch_assoc();

    $sql8 = "SELECT * FROM products where userid>0";
    $result8 = $conn->query($sql8);

    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/thewooding/index'</script>";
  } else {
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Admin 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
  <div class="main-panel">
      
      <?php include '../config/header.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">รายได้ต่อเดือน</p>
                  <h3 class="card-title"><?php echo number_format($row44["price"]); ?> 
                    <small>บาท</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-warning">warning</i>
                    <a href="#pablo" class="warning-link">Get More Space...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">รายได้ทั้งหมด</p>
                  <h3 class="card-title"><?php echo number_format($row5["price"]); ?> 
                  <small>บาท</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">จำนวนออเดอร์</p>
                  <h3 class="card-title"><?php echo $row6["ord"]; ?>
                  <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Tracked from Github
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <p class="card-category">จำนวนสมาชิก</p>
                  <h3 class="card-title"><?php echo $row7["cid"]; ?>
                  <small>คน</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">สินค้าที่สั่งทำ</h4>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover" id="example"> 
                <hr>
                <thead>
                <tr>
                <th>แบบสินค้า</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                while($row8 = mysqli_fetch_array($result8)) {
                        ?>
                <tr>
                <td><?php echo $row8['product_name']; ?></td>
                <td><?php echo $row8['product_desc']; ?></td>
                <?php if($row8['status_id']==0) : ?>
                <td>รอดำเนินการ</td>
                <?php endif; ?> 
                <?php if($row8['status_id']==9) : ?>
                <td>กำลังดำเนินการ</td>
                <?php endif; ?> 
				 <?php if($row8['status_id']==8) : ?>
                <td>ไม่รับงาน</td>
                <?php endif; ?> 
                <?php if($row8['status_id']==9) : ?>
                <td>
                <a class="btn btn-light" href="#" role="button">
                รับงาน <i class="fa fa-plus-circle"></i></a>
                </td>
                <td>
                <a class="btn btn-light" href="#" role="button">
                ยกเลิก <i class="fa fa-plus-circle"></i></a>
                </td>
                <?php endif; ?> 
                <?php if($row8['status_id']!=9) : ?>
                <td>
                <a class="btn btn-success" href="../insert/getcustom.php?itemId=<?php echo $row8['id']; ?>" role="button">
                รับงาน <i class="fa fa-plus-circle"></i></a>
                </td>
                <td>
                <a class="btn btn-warning" href="../config/dontallow?itemId=<?php echo $row8['id']; ?>" role="button">
                ยกเลิก <i class="fa fa-minus-circle"></i></a>
                </td>
                <?php endif; ?> 
                <td>
                <a class="btn btn-danger" href="../delete/deletecustom?itemId=<?php echo $row8['id']; ?>" role="button">
                ลบ</a>
                </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>
                </div>
              </div>
            </div>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  
  </div>
  <!--   Core JS Files   -->
  <script>
  $('#example').dataTable( );
  </script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="/js/themes/gray.js"></script>
</body>
<?php }?>
</html>