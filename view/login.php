<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<?php include('header.php'); ?>
	<div class="background">		
		<div class="form-container">
			<h1>Login</h1>

			<form id="loginForm">
				<div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
            	</div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters">
				</div>
				<div class="show-pass">
					<label for="showpassword">Show Password</label>
					<input type="checkbox" id="showpassword" onchange="showPassword()">
				</div>
				<button type="submit" name="login">Login</button>
				<!-- Errors -->
				<p class="err" id="noData" hidden>You must fill in all fields!</p>
				<p class="err" id="loginError" hidden>Incorrect Email or Password!</p>
			</form>	
			<br><br>
			<div id="links">
				<a href="forgotPassword.php" id="forgot-password">Forgot Password?</a>
				<a href="registration.php" id="sign-up">Sign Up</a>
			</div>
		</div>
	</div>
	<script src="login.js"></script>
	<?php include('footer.php'); ?>
</body>
</html>