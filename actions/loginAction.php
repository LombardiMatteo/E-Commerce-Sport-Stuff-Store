<?php

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    require "../utility/connection.php";

    // campi mancanti
    if(empty($_POST["email"]) || empty($_POST["password"])) {
        throw new Exception("You must fill in all fields!", 0);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // recupero l'hash della password per verificare l'accesso
    $sql = "SELECT username, password FROM userinfo WHERE email = \"$email\"";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->execute();
    $stmt->bind_result($usr, $pswd);
    if(!$stmt->fetch()) {
        throw new Exception("Incorrect Email!", 1);
    }
    $stmt->close();

    // verifico l'hash della password con quello inviato dall'utente
    if(password_verify($password, $pswd)){
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $usr;
        if(isset($_SESSION['cart'])) {
            $cart_items = $_SESSION['cart'];       
            foreach($cart_items as $item) {
                $sql = "SELECT quantity, amount FROM cart WHERE userEmail = ? AND productId = ?";
                $stmt = mysqli_prepare($conn, $sql);
                $stmt->bind_param('ss', $email, $item['id']);
                $stmt->execute();
                $stmt->bind_result($quantity, $amount); 
                if($stmt->fetch()) {                
                    $quantity += $item['quantity'];
                    $amount += $item['amount'];
                    $stmt->close();
                    $sql = "UPDATE cart SET quantity = ?, amount = ? WHERE userEmail = ? AND productId = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    $stmt->bind_param('ssss', $quantity, $amount, $email, $item['id']);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    $stmt->close();
                    $sql = "INSERT INTO cart VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);
                    $stmt->bind_param('ssssss', $email, $item['id'], $item['name'], $item['pic'], $item['quantity'], $item['amount']);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
        $sql = "SELECT productId, productName, productPic, quantity, amount FROM cart WHERE userEmail = \"$email\"";
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->execute();
        $stmt->bind_result($id, $name, $pic, $quantity, $amount);
        if($stmt->fetch()) {
            $vet = array();
            $vet[] = array('id' => $id, 'name' => $name, 'amount' => $amount, 'pic' => $pic, 'quantity' => $quantity);
            while($stmt->fetch()) {
                $vet[] = array('id' => $id, 'name' => $name, 'amount' => $amount, 'pic' => $pic, 'quantity' => $quantity);
            }
            $_SESSION['cart'] = $vet;
        }
        
        $response = [
            'logged' => true,
            'username' => $usr,
            'msg' => 'Login succesful!'
        ];
    } else {    
        throw new Exception("Incorrect Password!", 1);
    }
        
} catch (Exception $e) {
    $response = [
        'logged' => false,
        'msg' => 'Login failed! -> '. $e->getMessage(),
        'error' => $e->getCode()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}

?>