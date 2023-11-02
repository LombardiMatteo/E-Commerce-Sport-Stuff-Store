<?php

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require "../utility/connection.php";

    $email = $_SESSION['email'];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $re_password = $_POST['re_password'];

    // controllo che le password siano uguali
    if(!password_verify($re_password, $password)) {
        throw new Exception("Passwords do not match!");
    }
    
    // registro l'utente
    $sql = "UPDATE userinfo SET password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('ss', $password, $email); 
    $stmt->execute();
    
    session_unset();
    session_destroy();

    $response = [
        'check' => true,
        'msg' => 'Password reset successful!'
    ];
} catch (Exception $e) {
    $response = [
        'check' => false,
        'msg' => 'password reset failed! -> '. $e->getMessage()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}

?>