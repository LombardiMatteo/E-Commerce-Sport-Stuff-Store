<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="forgotPassword.css">
	</head>
	<body>
		<?php include('header.php'); ?>
		
		<div class="background">		
			<div class="form-container">
				<h1>Reset Password</h1>
				<form enctype="multipart/form-data" id="resetPasswordForm">
				<div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                    <label for="re_password">Retype Password</label>
                    <input type="password" id="re_password" name="re_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
				<div class="buttons">
					<button type="submit" name="confirm">Confirm</button>
					<button id="back" name="back">Cancel</button>
	            </div>
				<!-- Error -->                
                <p class="err" id="pswdError" hidden>Passwords do not match!</p>            
			</form>
		</div>
	</div>
	
	<script src="resetPassword.js"></script>
	
	<?php include('footer.php'); ?>
</body>
</html>