<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['username'])){
    header("Location: ../view/login.php");
    exit();
}

session_unset();
session_destroy();
header("Location: ../index.php");
exit();
?>