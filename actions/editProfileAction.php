<?php 
try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require "../utility/connection.php";

    // campi mancanti
    if(empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["phone"]) || empty($_POST["address"]) || empty($_POST["username"])) {
        throw new Exception("You must fill in all fields!", 0);
    }
      
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    
    if($username != $_SESSION['username']) {
        $sql = "SELECT username FROM userinfo";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt->execute()) {
            $stmt->bind_result($usr);
            while($stmt->fetch()) {
                if($username == $usr) {
                    throw new Exception("Username not available!", 1);
                }
            }
        }
    }

    $sql = "UPDATE userinfo SET firstname = ?, lastname = ?, phone = ?, address = ?, username = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('ssssss', $firstname, $lastname, $phone, $address, $username, $_SESSION['email']); 
    $stmt->execute();
    
    $_SESSION['username'] = $username;

    $response = [
        'sign' => true,
        'username' => $username,
        'msg' => 'Update successful!'
    ];
} catch (Exception $e) {
    $response = [
        'sign' => false,
        'msg' => 'Update failed! -> '. $e->getMessage(),
        'error' => $e->getCode()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}
?>
