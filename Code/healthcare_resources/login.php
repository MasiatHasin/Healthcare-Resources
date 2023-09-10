<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">
<link rel="stylesheet" href="css/book_bed.css">
<style>
input{
	width: 295px;
}
</style>
</head>
<body>
<div id="container">
	<div id="nav-parent">
		<img id="bannerpic" src="images/banner.png">
	</div>
	<br>

	<div id="form" class="center">
		<form action="" spellcheck="false" method="post">
			<table class="center" border="0" width="300px" height="60px">
			<tr><td><center><h3>Login</h3></center></td></tr>
			<tr><td></td></tr>
			<tr><td><label for="nid">ID:</label></td></tr>
			<tr><td><input type="text" name="nid" /></td></tr>
			<tr><td><label for="pass">Password:</label></td></tr>
			<tr><td><input type="password" name="pass" /></td></tr>
			<tr><td><center><button class="loginbtn btn btn-1" type="submit" value="signin" name="loggedin">Login</button></center></td></tr>
			</table>
		</form>
		<?php 
		$_SESSION['l'] = 'false';
		if (isset($_POST['loggedin'])){
			require_once('dbconnect.php');
			if(isset($_POST['nid']) && isset($_POST['pass'])){
				$_SESSION['l'] = 'true';
				$_SESSION['n'] = $_POST['nid'];
				$_SESSION['p'] = $_POST['pass'];
				

				$sql = "SELECT * FROM user WHERE NID = '" . $_SESSION['n'] . "' AND Password = '" . $_SESSION['p'] . "';";
				$result = mysqli_query($conn, $sql);
				
				if(mysqli_num_rows($result) !=0 ){
					
					header("location:dashboard.php");
				}
				else{
				$sql = "SELECT * FROM operator a, hospital_data_edit b WHERE a.id = '" . $_SESSION['n'] . "' AND a.Password = '" . $_SESSION['p'] . "' AND a.id=b.operator;";
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) !=0 ){
					header("location:operator_hospital.php");
				}
				else{
					$sql = "SELECT * FROM operator a, diagnostic_center_data_edit b WHERE a.id = '" . $_SESSION['n'] . "' AND a.Password = '" . $_SESSION['p'] . "' AND a.id=b.operator;";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) !=0 ){
					header("location:operator_diagnostic.php");
					}
					else{ ?> <center><b>Incorrect NID or Password</b><br><br><br><br></center><br>
					<?php
					}
				}
				}
			}
		} ?>
		
		<center>Don't have an account? <button onclick="document.location.href='register.php';return false;">Register</button></a></center><br>
		<center>Skip login? <b>Some features will be missing.</b> <button onclick="document.location.href='dashboard.php';return false;">Skip</button></a></center>
	</div>
</div>
</body>
</html>