<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="background">		
		<div class="form-container">
			<h1>Shipping</h1>
			<form id="shippingForm">
				<div class="form-group">
                    <label for="shipping-addr">Shipping Address</label>
                    <input type="text" id="shipping-addr" name="shipping-addr">
            	</div>
				<div class="form-group">
					<h4>Shipping Type</h4>
            		<input type="radio" name="shipping-type" id="standard" value="standard">
            		<label for="standard" class="radio">Standard (7 days) - GRATIS</label>
            		<br>
            		<input type="radio" name="shipping-type" id="express" value="express">
            		<label for="express" class="radio">Express (2-3 days) - €5.00</label>
            	</div>
				<button type="submit" name="continue">Continue</button>
				<p class="err" id="noAddr" hidden>Please, enter a shipping address!</p>
				<p class="err" id="noType" hidden>Please, choose a shipping type!</p>
			</form>
		</div>
	</div>
	<script src="checkout.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>