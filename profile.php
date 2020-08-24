<?php require_once "app/autoload.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name']; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php 
	/**
	 * Logout System
	 */
	if ( isset($_GET['logout']) AND $_GET['logout'] == 'ok') {
		
		session_destroy();
		header('location:index.php');
	}

	 ?>

	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="data.php">All Users</a>
		<div class="card shadow-sm">
			<div class="card-body">
				<img class="shadow-sm" style=" width:200px; height: 200px; border-radius: 50%; border:10px solid #fff; margin: auto; display: block;" src="photo/<?php echo $_SESSION['photo']; ?>" alt="">
				<h2><?php echo $_SESSION['name']; ?></h2>
				<hr>
				<table class="table table-stiped">
					<tr>
						<td>Name :</td>
						<td><?php echo $_SESSION['name']; ?></td>
					</tr>
					<tr>
						<td>Username :</td>
						<td><?php echo $_SESSION['uname']; ?></td>
					</tr>
					<tr>
						<td>Email :</td>
						<td><?php echo $_SESSION['email']; ?></td>
					</tr>
					
				</table>
				<div class="card-footer">
				<a href="?logout=ok">Logout</a>
			</div>
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