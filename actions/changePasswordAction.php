<?php

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require "../utility/connection.php";

    $old_password = $_POST['old_password'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $re_password = $_POST['re_password'];
    $email = $_SESSION['email'];
    
    $sql = "SELECT password FROM userinfo WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('s', $email); 
    $stmt->execute();
    $stmt->bind_result($old_pass);
    $stmt->fetch();
    if(!password_verify($old_password, $old_pass)) {
        throw new Exception("Old password wrong!", 0);
    }
    
    if(!password_verify($re_password, $new_password)) {
        throw new Exception("Passwords do not match!", 1);
    }
    $stmt->close();

    $sql = "UPDATE userinfo SET password = ? WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('ss', $new_password, $email); 
    $stmt->execute();
    $stmt->close();

    $response = [
        'check' => true,
        'msg' => 'Password change successful!'
    ];
} catch (Exception $e) {
    $response = [
        'check' => false,
        'msg' => 'Password change failed! -> '. $e->getMessage(),
        'error' => $e->getCode()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}

?>