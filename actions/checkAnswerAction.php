<?php 
try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
      
    $answer = $_POST['answer'];

    if($answer != $_SESSION['answer']) {
        throw new Exception("The answer is wrong!");
    }

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
}
?>