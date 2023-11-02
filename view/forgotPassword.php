<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Forgot Password</title>
		<link rel="stylesheet" type="text/css" href="forgotPassword.css">
	</head>

<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}

if(!isset($_SESSION['email'])) {
?>

	<body>
		<?php include('header.php'); ?>
		
		<div class="background">		
			<div class="form-container">
				<h1>Forgot Password</h1>
				<form enctype="multipart/form-data" id="emailForm">
				<div class="form-group">
					<label for="email">Enter your Email</label>
					<input type="text" id="email" name="email">
				</div>
				<div class="buttons">
					<button type="submit" name="confirm">Confirm</button>
					<button id="back" name="back">Back to Login</button>
	            </div>
				<!-- Error -->                
                <p class="err" id="wrongEmail" hidden>The email entered is incorrect!</p>	            
			</form>
		</div>
	</div>
	
	<script src="checkEmail.js"></script>
	
	<?php include('footer.php'); ?>
</body>

<?php
} else {
	$question = $_SESSION['question'];
?>

	<body>
		<?php include('header.php'); ?>
		
		<div class="background">		
			<div class="form-container">
				<h1>Forgot Password</h1>
				<form enctype="multipart/form-data" id="answerForm">
				<div class="form-group">
					<label for="answer"><?php echo $question ?></label>
					<input type="text" id="answer" name="answer" placeholder="Answer">
				</div>
				<div class="buttons">
					<button type="submit" name="confirm">Confirm</button>
					<button id="back" name="back">Back to Login</button>
	            </div>
				<!-- Error -->                
                <p class="err" id="wrongAnswer" hidden>The answer is wrong!</p>	            
				</form>
			</div>
		</div>
	
		<script src="checkAnswer.js"></script>
	
		<?php include('footer.php'); ?>
	</body>

<?php
}
?>

</html>