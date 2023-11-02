<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
    $tot = 0;
    $items = 0
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="cart.css">  
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="background">
            <table>
            <?php
            foreach($cart_items as $product) {
                $tot += $product['amount'];
                $items += $product['quantity'];
            ?>
                <tr>
                    <td><a href='productInfo.php?productId= <?php echo $product['id']; ?>'><img src="../<?php echo $product['pic']; ?>" height="100px" width="100px" alt="<?php echo $product['name']; ?> picture"></a></td>
                    <td><?php echo $product['name']; ?></td>
                    <td>Qt. <?php echo $product['quantity']; ?></td>
                    <td>€<?php echo $product['amount']; ?></td>
                    <td>
                        <form class="deleteForm">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button class="delete-button" type="submit" name="delete_cart_item">Delete</button>
                        </form>
                    </td>        
                </tr>
            <?php
            }
            ?>
                <tr>
                    <td colspan="2">Subtotal (<?php echo $items; ?> items): €<?php echo $tot; ?></td>
                    <td colspan="3">
                        <button id="proceedCheckout-button" type="submit" name="proceed-to-checkout">Proceed to Checkout</button>
                    </td>
                </tr>
            </table>
        </div>
        
        <?php
        if(isset($_SESSION['username'])) {
        ?>    
            <script src="loggedCart.js"></script>
        <?php
        } else {
        ?>
            <script src="cart.js"></script>
        <?php    
        }

        include('footer.php'); 
        ?>
    </body>
</html>
<?php
} else {
?>    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="cart.css">  
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="background">
            <p id="empty">Your cart is empty.</p>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>
<?php
}
?>