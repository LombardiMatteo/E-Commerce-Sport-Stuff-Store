<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = $_SESSION['email'];

require "../utility/connection.php";
$sql = "SELECT id, details, totalPrice, shippingAddress, orderDate, deliveryDate FROM `order` WHERE userEmail = \"$email\"";
$stmt = mysqli_prepare($conn, $sql);
$stmt->execute();
$stmt->bind_result($id, $details, $total_price, $shipping_address, $order_date, $delivery_date);
$orders = array();
while($stmt->fetch()) {
    $orders[] = array('id' => $id, 'details' => $details, 'totalPrice' => $total_price, 'shippingAddress' => $shipping_address, 'orderDate' => $order_date, 'deliveryDate' => $delivery_date);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>
        <link rel="stylesheet" type="text/css" href="viewOrders.css">  
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="background">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Details</th>
                    <th>Total Price</th>
                    <th>Shipping Address</th>
                    <th>Order Date</th>
                    <th>Delivery Date</th>
                </tr>
            <?php
            foreach($orders as $order_info) {
            ?>
                <tr>
                    <td><?php echo $order_info['id']; ?></td>
                    <td><?php echo $order_info['details']; ?></td>
                    <td>€<?php echo $order_info['totalPrice']; ?></td>
                    <td><?php echo $order_info['shippingAddress']; ?></td>
                    <td><?php echo $order_info['orderDate']; ?></td>        
                    <td><?php echo $order_info['deliveryDate']; ?></td>        
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
        
        <?php include('footer.php'); ?>
    </body>
</html>