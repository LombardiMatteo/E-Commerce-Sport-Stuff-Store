<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}
require "../utility/utilityDB.php";
getUserInfo();
$userinfo = $_SESSION['userinfo'];
$first_name = $userinfo['firstname'];
$last_name = $userinfo['lastname'];
$gender = $userinfo['gender'];
$email = $userinfo['email'];
$phone = $userinfo['phone'];
$address = $userinfo['address'];
$dob = $userinfo['dob'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" type="text/css" href="profile.css">  
    </head>
    <body>
        <?php include('header.php'); ?>
        <div class="background">
            <div class="menu" >
	            <ul id="myDIV">
	                <li><a href="editProfile.php">Edit Profile</a></li>
	                <li><a href="changePassword.php">Change Password</a></li>
	                <li><a href="../actions/logout.php">Logout</a></li>
	            </ul>
	        </div>
            <div class="profile-container">
                <div class="profile-image">
                    <img src="../picture/userpicture.png" alt="User Picture">          
                </div>
                <div class="profile-details">
                    <h2><?php echo $first_name .' '. $last_name; ?></h2>
                    <p><?php echo $gender; ?></p>
                    <p><?php echo $dob; ?></p>
                    <p><?php echo $address; ?></p>
                    <p><?php echo $email; ?></p>
                    <p><?php echo $phone; ?></p>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>
