<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
} else {
    die("Product ID not specified.");
}

require "../utility/utilityDB.php";
getProductInfo($productId);
$product_info = $_SESSION['productInfo'];
$name = $product_info['name'];
$price = $product_info['price'];
$pic = $product_info['pic'];
$details = $product_info['details'];
unset($_SESSION['productInfo']); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Info</title>
        <link rel="stylesheet" type="text/css" href="productInfo.css">  
    </head>
    <body>
        <div id="check_msg"></div>
        <?php include('header.php'); ?>
        <div class="background">
            <div class="product-container">
                <div class="product-image">
                    <img src="../<?php echo $pic; ?>" alt="Product Picture">          
                </div>
                <div class="product-details">
                    <h1><?php echo $name; ?></h1>
                    <p><?php echo $details; ?></p>
                    <h3>€<?php echo $price; ?></h3>
                    <form class="addForm">
					    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
					    <input type="hidden" name="product_name" value="<?php echo $name; ?>">
					    <input type="hidden" name="product_price" value="<?php echo $price; ?>">
						<input type="hidden" name="product_pic" value="<?php echo $pic; ?>">
					    <input type="submit" value="Add to cart" name="add_to_cart" class="add-to-cart">
					</form>
                </div>
            </div>
        </div>
        <script src="addToCart.js"></script>
        <?php include('footer.php'); ?>
    </body>
</html>