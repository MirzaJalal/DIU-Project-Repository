<!DOCTYPE html>
<?php
include("connection.php");
session_start();
$error = [];
if (isset($_POST['submitt'])) {

	$id = $_POST['id'];
	$pass = $_POST['pass'];

	$query = "SELECT * FROM signup WHERE id='$id' and pass='$pass'";

	$result = mysqli_query($conn, $query);
	$rows = mysqli_num_rows($result);

	if ($rows == 1) {
		$data = mysqli_fetch_assoc($result);
		
		$_SESSION['login'] = true;
		$_SESSION['name'] = $data['name'];
		$_SESSION['id'] = $id;
		$_SESSION['pass'] = $pass;
		header("Location: index.php");
	}else {
		echo "Username or password not matched";
	}
}
?>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="id" placeholder="Student ID">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<p class="alert alert-warning" id="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, tempora.</p>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submitt">
							Sign in
						</button>
					</div>


					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Not Registered?
						</span>

						<a href="signup.php" class="txt2">
							Create an account
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('img/bg-01.jpg');"></div>
			</div>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function() {
			setTimeout(function(){
				$('#message').slideUp(500);
				},4000);
		});	
	</script>
</body>
</html>