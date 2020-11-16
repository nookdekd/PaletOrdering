<?php 

include_once('../../../config/functions.php'); 

    if (isset($_GET['itemId'])) {
        $cid = $_GET['itemId'];
        $status_id = '8';
        $dontallow = new DB_con();
        $sql = $dontallow->dontallow($cid,$status_id);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='../view/viewcustom'</script>";
        }
    }

?>