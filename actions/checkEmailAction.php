<?php 
try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require "../utility/connection.php";
      
    $email = $_POST['email'];

    $sql = "SELECT question, answer FROM userinfo WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('s', $email); 
    $stmt->execute();
    $stmt->bind_result($question, $answer);
    if(!$stmt->fetch()) {
        throw new Exception("The email entered is incorrect!");
    }
    
    $_SESSION['email'] = $email;
    $_SESSION['question'] = $question;
    $_SESSION['answer'] = $answer;

    $response = [
        'check' => true,
        'msg' => 'Check successful!'
    ];
} catch (Exception $e) {
    $response = [
        'check' => false,
        'msg' => 'Check failed! -> '. $e->getMessage()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}
?>