<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cart_items = $_SESSION['cart'];
$shipping_info = $_SESSION['shipping_info'];
$order_details = '';
$subtotal = 0;
foreach ($cart_items as $item) {
    if($order_details == '') {
        $order_details = $item['quantity']." ".$item['name'];
    }
    else {
        $order_details = $order_details.", ".$item['quantity']." ".$item['name'];
    }
    $subtotal += $item['amount'];
}
$tot_price = $shipping_info['type'] == "standard" ? $subtotal : $subtotal + 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="order.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="background">		
		<div class="form-container">
			<h1>Order Summary</h1>

            <div class="row">
                <p class="label">Products: </p> <p class="data"><?php echo $order_details ?></p>
            </div>
            <div class="row">
                <p class="label">Subtotal: </p> <p class="data">€<?php echo $subtotal ?></p>
            </div>
            <div class="row">
                <p class="label">Shipping Address: </p> <p class="data"><?php echo $shipping_info['addr'] ?></p>
            </div>
            <div class="row">
                <p class="label">Shipping Type: </p> <p class="data"> <?php if($shipping_info['type'] == "standard") {
                                                                                echo "Standard (7 days) - GRATIS";
                                                                            } else {
                                                                                echo "Express (2-3 days) - €5.00";
                                                                            }?> </p>
            </div>
            <div class="row">
                <p class="label">Total Price: </p> <p class="data">€<?php echo $tot_price ?></p>
            </div>

			<form id="orderForm">
                <input type="hidden" name="products" value="<?php echo $order_details; ?>">
				<input type="hidden" name="shipping_addr" value="<?php echo $shipping_info['addr']; ?>">
				<input type="hidden" name="shipping_type" value="<?php echo $shipping_info['type']; ?>">
				<input type="hidden" name="total_price" value="<?php echo $tot_price; ?>">
                <div class="buttons">
					<button type="submit" name="confirm">Confirm the Order</button>
					<button id="cancel">Cancel</button>
	            </div>
			</form>	
		</div>
	</div>
	<script src="order.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>