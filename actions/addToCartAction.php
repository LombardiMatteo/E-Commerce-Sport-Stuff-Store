<?php

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['username'])) {
        require "../utility/connection.php";
        $email = $_SESSION['email'];
    }

    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $pic = $_POST['product_pic']; 

    if(isset($_SESSION['cart'])) {
        $vet = $_SESSION['cart'];
        $i = 0;
        for($i; $i<count($vet); $i++) {
            if($vet[$i]['id'] == $id) {
                $vet[$i]['amount'] += $price;
                $vet[$i]['quantity']++;
                if(isset($_SESSION['username'])) {                    
                    $sql = "UPDATE cart SET quantity = ?, amount = ? WHERE userEmail = ? AND productId = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    $stmt->bind_param('ssss', $vet[$i]['quantity'], $vet[$i]['amount'], $email, $id);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                }
                break;
            }
        }
        if($i == count($vet)) {
            $vet[] = array('id' => $id, 'name' => $name, 'amount' => $price, 'pic' => $pic, 'quantity' => 1);
            if(isset($_SESSION['username'])) {
                $sql = "INSERT INTO cart VALUES (?, ?, ?, ?, '1', ?)";
                $stmt = mysqli_prepare($conn, $sql);
                $stmt->bind_param('sssss', $email, $id, $name, $pic, $price);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
        }
        $_SESSION['cart'] = $vet;
    } else {
        $vet[] = array('id' => $id, 'name' => $name, 'amount' => $price, 'pic' => $pic, 'quantity' => 1);
        if(isset($_SESSION['username'])) {
            $sql = "INSERT INTO cart VALUES (?, ?, ?, ?, '1', ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('sssss', $email, $id, $name, $pic, $price);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
        $_SESSION['cart'] = $vet;
    }

    $response = [
        'added' => true,
        'msg' => 'The product has been added to the cart.'
    ];        
} catch (Exception $e) {
    $response = [
        'added' => false,
        'msg' => 'Unfortunately it was not possible to add the product to the cart.'
    ];
} finally {
    echo json_encode($response);
}

?>