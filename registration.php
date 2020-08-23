<?php
	require_once "app/autoload.php";
 ?>
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
		 * Visitors Registration form setup
		 */
		if ( isset( $_POST['reg'] ) ) {

			//Get Value
		 	$name 	= $_POST['name'];
		 	$uname 	= $_POST['uname'];
		 	$email 	= $_POST['email'];
		 	$pass 	= $_POST['pass'];

		 	//Password Hash

		 	$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

		 	

		 	/**
		 	 * Form Validation
		 	 */
		 	if ( empty($name) || empty($uname) || empty($email) || empty($pass)) {
		 		$message = validation('All fields are required !!', 'danger');
		 	}elseif(filter_var( $email, FILTER_VALIDATE_EMAIL ) == false){
		 		$message = validation('Invalid email address !!', 'warning');
		 	}elseif(dataCheck($connection, 'visitors', 'email', $email) == false){
		 		$message = validation('Email already exists !!', 'warning');
		 	}elseif(dataCheck($connection, 'visitors', 'uname', $uname ) ==false){
		 		$message = validation('User name already exists !!', 'warning');
		 	}else {

		 		//Photo Upload System
		 		$photo 	= fileUpload($_FILES['photo'], 'photo/');

		 		$file_name = $photo['file_name'];
		 		$photo['message'];

		 		if ( !empty( $photo['message'] ) ) {
		 			$message = $photo['message'];
		 		}else {
		 			$sql = "INSERT INTO visitors (name, uname, email, pass, photo) VALUES ('$name', '$uname', '$email', '$pass_hash', '$file_name')";
		 			$connection -> query($sql);

		 			$message = validation('User Registration Successful', 'success');
		 		}
		 	}
		 }
		 	
		 	
		 

		 ?>
	
	

	<div class="wrap ">
		<div class="card shadow-sm">
			<div class="card-body">
				<h2>Create an Account</h2>
				<?php 
				 if (isset($message)) {
				 	echo $message;
				 }
				 ?>

				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="form-group">
						<input name="reg" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<a href="index.php">Login Now</a>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>