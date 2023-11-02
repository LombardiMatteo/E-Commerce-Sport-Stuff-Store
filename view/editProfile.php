<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}
require "../utility/utilityDB.php";
getUserInfo();
$userinfo = $_SESSION['userinfo'];
$username = $userinfo['username'];
$first_name = $userinfo['firstname'];
$last_name = $userinfo['lastname'];
$phone = $userinfo['phone'];
$address = $userinfo['address'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="editProfile.css">
</head>
<body>
	<?php include('header.php'); ?>

	<div class="background">		
		<div class="form-container">
			<h1>Edit Profile</h1>
			<form enctype="multipart/form-data" id="editForm">
				<div class="form-group">
	                    <label for="username">Username</label>
	                    <input type="text" id="username" name="username" value="<?php echo $username?>">
	                </div>
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" id="first_name" name="first_name" pattern="^[a-zA-Z]+$" title="Must contain only alphabetic characters!" value="<?php echo $first_name ?>">
				</div>
	            <div class="form-group">
	                <label for="last_name">Last Name</label>
	                <input type="text" id="last_name" name="last_name" pattern="^[a-zA-Z]+$" title="Must contain only alphabetic characters!" value="<?php echo $last_name ?>">
	            </div>
	            <div class="form-group">
					<label for="phone">Phone</label>
	                <input type="tel" id="phone" name="phone" pattern="^[0-9]{10}$" title="Must contain 10 digits!" value="<?php echo $phone ?>">
	            </div>
	            <div class="form-group">
					<label for="address">Address</label>
	                <input type="text" id="address" name="address" value="<?php echo $address ?>">
	            </div>
				<div class="buttons">
					<button type="submit" name="update">Update</button>
					<button id="cancel" name="cancel">Cancel</button>
	            </div>
				<!-- Errors -->                
                <p class="err" id="noData" hidden>You must fill in all fields!</p>	            
                <p class="err" id="usernameUsedYet" hidden>Username not available!</p>
			</form>
		</div>
	</div>

	<script src="editProfile.js"></script>

	<?php include('footer.php'); ?>
</body>
</html>