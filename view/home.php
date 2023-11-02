<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<div id="check_msg"></div>
	<?php include('header.php'); ?>
	
	<div class="background">
		<?php
			$searchQuery = isset($_GET["search"]) ? $_GET["search"] : "";

				if(empty($searchQuery)){

					require "../utility/utilityDB.php";

					$flag = getAllProductsInfo();
					if($flag === true){
					    $productInfo = $_SESSION['allProductsInfo'];
					    foreach ($productInfo as $record) {
					        $productId = $record['id'];
					        $productName = $record['name'];
					        $price = $record['price'];
					        $pic = $record['pic'];
		?>
					        <div class='product'>
								<a href='productInfo.php?productId=<?php echo $productId; ?>'><img src="../<?php echo $pic; ?>" alt="<?php echo $productName; ?> picture"></a>
                				<h3><?php echo $productName; ?></h3>
                				<p class='price'>€<?php echo $price ?></p>
                				<form class="addForm">
					                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
					                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
					                <input type="hidden" name="product_price" value="<?php echo $price; ?>">
									<input type="hidden" name="product_pic" value="<?php echo $pic; ?>">
					                <input type="submit" value="Add to cart" name="add_to_cart" class="add-to-cart">
					            </form>
                			</div>
							
		<?php
						}
					}
				} else{
					require "../utility/utilityDB.php";

					$flag = searchProduct($searchQuery);
					if($flag === true){ 
					    $productInfo = $_SESSION['searchProduct'];
					    foreach ($productInfo as $record) {
					        $productId = $record['id'];
					        $productName = $record['name'];
					        $price = $record['price'];
					        $pic = $record['pic'];
		?>
					        <div class='product'>
								<a href='productInfo.php?productId=<?php echo $productId; ?>'><img src="../<?php echo $pic; ?>" alt="<?php echo $productName; ?> picture"></a>
                				<h3><?php echo $productName; ?></h3>
                				<p class='price'>€<?php echo $price ?></p>
                				<form class="addForm">
					                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
					                <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
					                <input type="hidden" name="product_price" value="<?php echo $price; ?>">
									<input type="hidden" name="product_pic" value="<?php echo $pic; ?>">
					                <input type="submit" value="Add to cart" name="add_to_cart" class="add-to-cart">
					            </form>
                			</div>
		<?php
						}
					}
				}
		?>
	</div>

	<?php include('footer.php'); ?>
	<script src="addToCart.js"></script>
</body>
</html>