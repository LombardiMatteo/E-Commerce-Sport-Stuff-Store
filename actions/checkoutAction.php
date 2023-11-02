<?php

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(empty($_POST["shipping-addr"])) {
        throw new Exception("Please, enter a shipping address!", 0);
    }
    if(empty($_POST["shipping-type"])) {
        throw new Exception("Please, choose a shipping type!", 1);
    }

    $shipping_addr = $_POST['shipping-addr'];
    $shipping_type = $_POST['shipping-type'];

    if(isset($_SESSION['shipping_info'])) {
        unset($_SESSION['shipping_info']);
    }

    $_SESSION['shipping_info'] = ['addr' => $shipping_addr, 'type' => $shipping_type];

    $response = [
        'check' => true,
        'msg' => 'Shipping address -> '.$shipping_addr.', '.'Shipping type -> '.$shipping_type
    ];        
} catch (Exception $e) {
    $response = [
        'check' => false,
        'msg' => 'Attenction -> '. $e->getMessage(),
        'error' => $e->getCode()
    ];

} finally {
    echo json_encode($response);
}

?>