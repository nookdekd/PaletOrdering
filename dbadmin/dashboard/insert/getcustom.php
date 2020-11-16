<?php 
session_start();
include_once('../../../config/functions.php');
    include_once('../../../config/connect.php'); 
    
    $customid=$_GET['itemId'];
    $userdata = new DB_con();

    if (isset($_POST['submit'])) {
      $product_id = $_POST['product_id'];
      $product_price = $_POST['product_price'];
      $status_id = '9';
      

      $sql = $userdata->allowcustom($product_id, $product_price, $status_id);

      if ($sql) {
          echo "<script>alert('Successful!');</script>";
          echo "<script>window.location.href='../view/viewcustom'</script>";
      } else {
          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='customer'</script>";
      }
  }


  $sql8 = "SELECT * FROM products where id=$customid";
  $result8 = $conn->query($sql8);
  $row8 = $result8 ->fetch_assoc();

    $role = $_SESSION['role_id'];
    if ($role!=1) {
      echo "<script>window.location.href='/thewooding/index'</script>";
    } else {

?>
<!-- head -->

<body class="dark-edition">
  <div class="wrapper ">
    <?php include '../config/nav.php'; ?>
    </div>
    <div class="main-panel">

    
      
      <?php include '../config/header.php'; ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row"></div>
          <div class="row">
            <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">อนุมัติรายการ</h4>
            </div>
            <div class="card-body table-responsive">
            <table class="table table-bordered" id="example"> 
                <hr>
                <thead>
                <tr>
                <th>แบบสินค้า</th>
                <th>รายละเอียด</th>
                <th>สถานะ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td><?php echo $row8['product_name']; ?></td>
                <td><?php echo $row8['product_desc']; ?></td>
                <?php if($row8['status_id']==0) : ?>
                <td>รอดำเนินการ</td>
                <?php endif; ?> 
                <?php if($row8['status_id']==9) : ?>
                <td>กำลังดำเนินการ</td>
                <?php endif; ?> 
                </tr>
                </tbody>
                </table>
            <div class="form-group">
            <form method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label" style="color:">เลขที่สินค้า</label>
                <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $row8['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="fullname" class="form-label" style="color:">ราคาสินค้า</label>
                <input type="text" class="form-control" id="product_price" name="product_price">
            </div>
            
            <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึก</button>
          </form>
            </div>
            </div>
            </div>
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
  <script src="../assets/js/core/jquery.min.js"></script>
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

  <script src="assets/script.js"></script>
</body>
<?php }?>
</html>