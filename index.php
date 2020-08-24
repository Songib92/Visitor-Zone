<?php require_once "app/autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	

		<?php 

		/**
		 * Login From Setup
		 */
		if ( isset($_POST['login']) ) {
			$ue 	= $_POST['ue'];
			$pass 	= $_POST['pass'];

			if ( empty($ue) || empty( $pass)) {
				$message = validation('All fields are required !!');
			}else{

				$sql = "SELECT * FROM visitors WHERE uname='$ue' || email='$ue'";
				$data = $connection -> query($sql);
				$vis_num = $data -> num_rows;
				$login_user_data = $data -> fetch_assoc();

				// Username or Email Check
				if ($vis_num == 1) {

					// Password Check
					if (password_verify($pass, $login_user_data['pass'])) {

						// Gone to Profile page
						header('location:profile.php');
						
					}else{
						$message = validation('Password is incorrect !!', 'warning');
					}
					
				}else{
					$message = validation('Username or email is incorrect !!');
				}


			}

		}


		 ?>
	



	<div class="wrap ">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Log In</h2>
				<?php 
				if (isset($message)) {
					echo $message;
				} 
				 ?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="">Username / Email</label>
						<input name="ue" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<input name="login" class="btn btn-primary" type="submit" value="Login">
					</div>
				</form>
			</div>
			<div class="card-footer"> 
				<a href="registration.php">Create an Account</a>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>