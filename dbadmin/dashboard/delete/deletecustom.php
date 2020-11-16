<?php 

include_once('../../../config/functions.php'); 

    if (isset($_GET['itemId'])) {
        $cid = $_GET['itemId'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletecustom($cid);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='../view/viewcustom'</script>";
        }
    }

?>