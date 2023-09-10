<?php
// Start tde session
session_start();
?>
<html>
<head>
<title>Patient Information</title>
<link rel="stylesheet" href="css/book_bed.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">

</head>
<body>

<div id="container">
	<div id="nav-parent">
		<img id="bannerpic" src="images/banner.png">
		<div class="nav">
		<a href="dashboard.php" style="font-size: 18px;padding: 10px;">Dashboard</a> 
		</div>
	</div>
	
	<div class="paper2">
	<br><br><br>
	<b><center style="font-size: 17px;">Patient Information </center></b>
			<?php 
			$n = $_SESSION['n'];
			require_once('dbconnect.php');
			$sql = "SELECT name,nid,age,gender,address FROM user WHERE nid = $n;";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) !=0 ){
			while($row = mysqli_fetch_array($result)){?>
		<table border="0" rules="none" class="query center result" width="40%" style="font-size:14px; text-align:center;">
		<tr><th>Name: </th><td> <?php echo $row[0]; ?> </td></tr>
		<tr><th>NID: </th><td> <?php echo $row[1]; ?> </td></tr>
		<tr><th>Age: </th><td> <?php echo $row[2]; ?> </td></tr>
		<tr><th>Gender: </th><td> <?php echo $row[3]; ?> </td></tr>
		<tr><th>Address: </th><td> <?php echo $row[4]; ?> </td></tr>
		<!--<tr><th>Phone: </th><td> <?php echo $row[5]; ?> </td></tr>-->
			<?php }} ?>
		</table>
		<br><br>
		<b><center style="font-size: 17px;">Patient Medical History </center></b>
			<?php 
			require_once('dbconnect.php');
			$sql = "SELECT time,date,prescription,reports FROM user_medical_history WHERE nid = $n;";
			$result = mysqli_query($conn, $sql);
			?>
			<table border="0" rules="none" class="query center result" width="50%" style="font-size:14px; text-align:center;">
			<?php 
			if(mysqli_num_rows($result) !=0 ){
			while($row = mysqli_fetch_array($result)){?>
		<tr><th>Time: </th><td> <?php echo $row[0]; ?> </td></tr>
		<tr><th>Date: </th><td> <?php echo $row[1]; ?> </td></tr>
		<tr><th>Prescription: </th><td> <?php echo $row[2]; ?> </td></tr>
		<tr><th>Reports: </th><td> <?php echo $row[3]; ?> </td></tr>
		<tr style="background-color:transparent;"><td></td><td> </td></tr>
			<?php }} else{ ?>
			<center>No medical history</center> <?php } ?>
		</table>
		
	<br><br>
	</div>
	</div>
	</body>
	</html>
	