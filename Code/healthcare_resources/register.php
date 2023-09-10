<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/book_bed.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">
<style>
input{
	width: 295px;
}
#genderm, #genderf{
	width: 80px;
}
</style>
</head>
<body>
<div id="container">
	<div id="nav-parent">
		<img id="bannerpic" src="images/banner.png">
	</div>
	<br>
	<div class="center paper">
			<form action="" method="post" id="registration">
			<b><center style="font-size: 17px;">Register</center></b>
				<table class="center" border="0" width="300px" height="60px">
				<tr><td></td></tr>
				<tr><td><label>Name:</label></td></tr>
				<tr><td><input type="text" id="name" name="name" value="<?php if (isset($_POST['name'])){echo $_POST['name'];} ?>"></input></td></tr>
				<tr><td><label>NID:</label></td></tr>
				<tr><td><input type="number" id="nid" name="nid"></input></td></tr>
				<tr><td><label>Date of Birth:</label></td></tr>
				<tr><td><input type="text" id="dob" name="dob" placeholder="dd-mm-yyyy" value= "<?php if (isset($_POST['dob'])){echo $_POST['dob'];} ?>"></input></td></tr>
				<tr><td><label>Gender:</label></td><tr>
				<tr><td>
					<input type="radio" id="genderm" name="gender" value="Male"></input>
					<label for="genderm">Male</label>
				</td></tr>
				<tr><td>
					<input type="radio" id="genderf" name="gender" value="Female"></input>
					<label for="genderf">Female</label>
				</td></tr>
				<tr><td><label>Address:</label></td></tr>
				<tr><td><input type="text" id="address" name="address" value= "<?php if (isset($_POST['address'])){echo $_POST['address'];} ?>"></input></td></tr>
				<tr><td><label>Phone:</label></td></tr>
				<tr><td><input type="tel" id="phone" name="phone" value= "<?php if (isset($_POST['phone'])){echo $_POST['phone'];} ?>"></input></td></tr>
				<tr><td><label>Password:</label></td></tr>
				<tr><td><input type="text" id="password" name="pass"></input></td></tr>
				<tr><td><center><button type="submit" name="register" value="yes" class="loginbtn btn btn-1">Register</button></center></td></tr>
				</table>
			</form>
			
			<?php
				if (isset($_POST['register'])){
					require_once('dbconnect.php');
					
					if (isset($_POST['nid']) && (isset($_POST['pass'])) && (isset($_POST['name'])) && (isset($_POST['gender']))
						&& (isset($_POST['dob'])) && (isset($_POST['address'])) && (isset($_POST['phone']))){
					
					$nid = $_POST['nid'];
					$pass = $_POST['pass'];
					$n = $_POST['name'];
					$g = $_POST['gender'];
					$dob = $_POST['dob'];
					$dob1 = $_POST['dob'];
					$dob1 = date('Y-m-d', strtotime($dob1));
					$dob = explode("-", $dob);
					$age = (date("md", date("U", mktime(0, 0, 0, $dob[0], $dob[1], $dob[2]))) > date("md")
					? ((date("Y") - $dob[2]) - 1)
					: (date("Y") - $dob[2]));
					$add = $_POST['address'];
					$p = $_POST['phone'];
					
					$sql = "SELECT * FROM user WHERE nid = $nid;";
					$result = mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) ==0 ){
					
					$sql = "INSERT INTO user VALUES( '$nid', '$pass', '$n', '$g', '$dob1', '$age', '$add', $p)";
					$result = mysqli_query($conn, $sql);
					?>
					<br><center>Account created successfully.</center>
					<?php 
					header("location:login.php");
					} 
					else{ ?>
						<br><center><b>NID is already in use</b></center>
					<?php }
				}
				else{ ?>
					<br><center><b>Please fill up all the fields</b></center>
				<?php }
				} ?>
			<div id="logreg">
		<center>Already have an account? <a href="login.php"><button>Login</button></a></center><br>
		<center>Skip login? <b>Some features will be missing.</b> <a href="dashboard.php"><button>Skip</button></a></center></div>
		<br><br>
	</div>
</div>
</body>
</html>