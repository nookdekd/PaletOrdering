<?php 

    // Database connection
    include("../../../config/connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../../assets/img/product/";
        $product_code = basename($_POST['product_code']);
        $product_name = basename($_POST['product_name']);
        $product_desc = basename($_POST['product_desc']);
        $product_price = basename($_POST['product_price']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");
               
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "INSERT INTO products (product_code,product_name,product_desc,product_img_name,product_price,catId) 
                VALUES ('$product_code','$product_name','$product_desc','$uploadpic','$product_price','1')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                        "status" => "alert-success",
                        "message" => "Image uploaded successfully."
                    );                 
                 }
            } else {
                $resMessage = array(
                    "status" => "alert-danger",
                    "message" => "Image coudn't be uploaded."
                );
            }
        

    }

?>