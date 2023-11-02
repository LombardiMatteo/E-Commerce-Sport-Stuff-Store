<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "../utility/connection.php";

$details = $_POST['products'];
$shipping_addr = $_POST['shipping_addr'];
$shipping_type = $_POST['shipping_type'];
$total_price = $_POST['total_price'];

$current_date =  new DateTime;
$order_date = $current_date->format("Y-m-d H:i:s");

if($shipping_type == "standard") {
    $current_date->modify('+7 days');
} else {
    $current_date->modify('+3 days');
}
$delivery_date = $current_date->format('Y-m-d');

$email = $_SESSION['email'];

$sql = "INSERT INTO `order` (userEmail, details, totalPrice, shippingAddress, orderDate, deliveryDate) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ssssss', $email, $details, $total_price, $shipping_addr, $order_date, $delivery_date);
$stmt->execute();
$stmt->close();

unset($_SESSION['cart']);
$sql = "DELETE FROM cart WHERE userEmail = ?";
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->close();

$conn->close();
?>