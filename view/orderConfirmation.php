<?php
    require "../utility/connection.php";
    $sql = "SELECT id, details, totalPrice, shippingAddress, orderDate, deliveryDate FROM `order` WHERE id = (SELECT MAX(id) FROM `order`)";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->execute();
    $stmt->bind_result($id, $details, $total_price, $shipping_address, $order_date, $delivery_date);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation</title>
        <link rel="stylesheet" type="text/css" href="orderConfirmation.css">  
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="background">
            <div class="orederDetails-container">
                <h1>Order Confirmation</h1>
                <p class="orderDetails">
                    Thanks for the order!<br>
                    The order id is: <?php echo $id; ?>.<br>
                    Your package contains: <?php echo $details; ?>.<br>
                    It will arrive by the following day: <?php echo $delivery_date; ?>.<br>
                    It will be delivered to the address: <?php echo $shipping_address; ?>.
                </p>
                <button onclick=backHome()>Back to Home</button>
            </div>
        </div>
        <script>
            function backHome() {
                window.location = "../index.php";
            }
        </script>
        <?php include('footer.php'); ?>
    </body>
</html>