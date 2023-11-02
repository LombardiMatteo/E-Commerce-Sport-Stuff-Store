<?php

try {
    require "../utility/connection.php";

    // campi mancanti
    if(empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["dob"]) || empty($_POST["address"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["question"]) || empty($_POST["answer"])) {
        throw new Exception("You must fill in all fields!", 3);
    }
      
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $re_password = $_POST['re_password'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // controllo che le password siano uguali
    if(!password_verify($re_password, $password)) {
        throw new Exception("Passwords do not match!", 0);
    }
    
    // controllo se la mail e lo username non siano già in uso
    $sql = "SELECT email, username FROM userinfo";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt->execute()) {
        $stmt->bind_result($e_mail, $usr);
        while($stmt->fetch()) {
            if($email == $e_mail) {
                throw new Exception("Email not available!", 1);
            }
            else if($username == $usr) {
                throw new Exception("Username not available!", 2);
            }
        }
    }
    
    // registro l'utente
    $sql = "INSERT INTO userinfo (firstname, lastname, gender, email, phone, dob, address, username, password, question, answer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param('sssssssssss', $firstname, $lastname, $gender, $email, $phone, $dob, $address, $username, $password, $question, $answer); 
    $stmt->execute();
    
    $response = [
        'sign' => true,
        'email' => $email,
        'msg' => 'Registration successful!'
    ];
} catch (Exception $e) {
    $response = [
        'sign' => false,
        'msg' => 'Registration failed! -> '. $e->getMessage(),
        'error' => $e->getCode()
    ];
} finally {
    echo json_encode($response);
    $conn->close();
}
?>