<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION["username"])) {
	$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>	
	<a href="../index.php"><img src="../picture/logo.png" id="logo" alt="Sport_Stuff_Store_logo"></a>	
	<header>
		<div class="container">			
			<nav>
				<ul>
					<li><a href="../index.php" >Home</a></li>
					<li><a href="cart.php" >Cart</a></li>
					<li><a href="manual.html" >About Us</a></li>
					<li>
						<div class="search-container">
						  <form method="GET" action="home.php" >
						  	<ul>
						    	<li><input type="text" placeholder="Search product..." name="search"></li>
						    	<li><button type="submit" id="search">Search</button></li>
						    </ul>
						  </form>
						</div>
					</li>
				</ul>				
			</nav>			
			<div class="profile-pic-logged" onclick="showDropdown()">
				<p><?php echo $username ?></p>
				<img src="../picture/userpicture.png" alt="Profile Picture" class="userpic">
			</div>			
			<div id="dropdown" class="dropdown-logged">
				<a href="profile.php">View Profile</a>
				<a href="viewOrders.php">View Orders</a>
				<a href="../actions/logout.php">Logout</a>
			</div>
			<script>
				function showDropdown() {
					var dropdown = document.getElementById("dropdown");
					if (dropdown.style.display === "block") {
						dropdown.style.display = "none";
					} else {
						dropdown.style.display = "block";
					}
				}
			</script>
		</div>
	</header>
</body>
</html>

<?php
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>
	<div id="logo_container">
		<a href="../index.php"><img src="../picture/logo.png" id="logo"></a>
	</div>		
	<header>
		<div class="container">		
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="cart.php">Cart</a></li>
					<li><a href="manual.html">About Us</a></li>

					<li>
						<div class="search-container">
						  <form method="GET" action="home.php" >
						    <ul>
						    	<li><input type="text" placeholder="Search product..." name="search"></li>
						    	<li><button type="submit" id="search">Search</button></li>
						    </ul>
						  </form>
						</div>
					</li>
				</ul>
			</nav>
			<div class="profile-pic" onclick="showDropdown()">				
				<img src="../picture/userpicture.png" alt="Profile Picture" class="userpic">			
			</div>
			<div id="dropdown" class="dropdown">
				<a href="login.php">Login</a>
				<a href="registration.php">Sign Up</a>
			</div>
			<script>
				function showDropdown() {
					var dropdown = document.getElementById("dropdown");
					if (dropdown.style.display === "block") {
						dropdown.style.display = "none";
					} else {
						dropdown.style.display = "block";
					}
				}
			</script>
		</div>
	</header>
</body>
</html>
<?php
}
?>