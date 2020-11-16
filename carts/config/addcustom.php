<?php 

    // Database connection
    include("../config/connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $userid = basename($_SESSION['id']);
        $product_name = basename($_POST['product_name']);
        $product_desc = basename($_POST['product_desc']." "."Width : ".$_POST['product_w']." "."Height : ".$_POST['product_h']);
        // Get file path
        
                
                $sql = "INSERT INTO products (product_code,product_name,product_desc,product_img_name,product_price,catId,userid) 
                VALUES ('CST','$product_name','$product_desc','0','0','0','$userid')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                              
                 }
					header('location:order_custom');
                }
          

?>