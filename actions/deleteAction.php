<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cart_items = $_SESSION['cart'];

if(count($cart_items) == 1) {
    unset($_SESSION['cart']);
} else {
    $id = $_POST['product_id'];
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