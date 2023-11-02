<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "../utility/connection.php";

$cart_items = $_SESSION['cart'];
$email = $_SESSION['email'];
$id = $_POST['product_id'];

$sql = "DELETE FROM cart WHERE userEmail = ? AND productId = ?";
$stmt = mysqli_prepare($conn, $sql);
$stmt->bind_param('ss', $email, $id);
$stmt->execute();

if(count($cart_items) == 1) {
    unset($_SESSION['cart']);
    $sql = "DELETE FROM cart WHERE userEmail = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
} else {    
    $vet = array(); 
    foreach($cart_items as $item) {
        if($item['id'] == $id) {
            continue;
        }
        $vet[] = array('id' => $item['id'], 'name' => $item['name'], 'amount' => $item['amount'], 'pic' => $item['pic'], 'quantity' => $item['quantity']);
        $_SESSION['cart'] = $vet;
    }   
}
?>