<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Login</title>
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">
<link rel="stylesheet" href="css/book_bed.css">
<style>
input{
	width: 100px;
}
</style>
</head>
<body>
<div id="container">
	<div id="nav-parent">
		<img id="bannerpic" src="images/banner.png">
		<div class="nav">
		<a href="login.php" style="font-size: 18px;padding: 10px;">Log out</a> 
		</div>
	</div>
	<br><br>
	
	<div class="paper2">
		<form action="" method="post">
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="50%">
			<?php 
			$n = $_SESSION['n'];
			require_once('dbconnect.php');
			$sql = "SELECT a.dcCode,a.name,a.fee FROM tests a, diagnostic_center_data_edit b WHERE b.operator= '" . $_SESSION['n'] . "' AND a.dcCode  = b.diagnostic_center;";
			$result = mysqli_query($conn, $sql);
			?>
			<tr style="background-color:transparent;"><td colspan="2"><b><center style="font-size: 16px;">Diagnostic Center Data</center></b></td></tr>
			<tr><th>Test</th><th>Fee</th></tr>
			<?php while($row = mysqli_fetch_array($result)){?>
			<tr><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td></tr>
			<?php } ?>
			<table>
			
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="50%">
			<tr style="background-color:transparent;">
			<td>Test:<input name="test"></input></td><td>Fee:<input name="fee"></input></td><td></td></tr>
			<tr style="background-color:transparent;">
			<td><center><button type="submit" name="edit_diag" class="loginbtn btn-1 btn">Edit</button></center></td>
			<td><center><button type="submit" name="add_diag" class="loginbtn btn-1 btn">Add</button></center></td>
			<td><center><button type="submit" name="delete_diag" class="loginbtn btn-1 btn">Delete</button></center></td>
			</tr>
			</table>
		</form>
		
		<?php 
		$n = $_SESSION['n'];
		
		$sql2 = "SELECT dcCode FROM diagnostic_center_data_edit a, tests b WHERE a.diagnostic_center = b.dcCode AND a.operator = $n;";
		$result2 = mysqli_query($conn, $sql2);
		
		while($row = mysqli_fetch_array($result2)){
			$diag = $row['dcCode'];
			}
					
		if (isset($_POST['edit_diag'])){
			require_once('dbconnect.php');
			if (isset($_POST['test']) && $_POST['test']!=""){
				$sql = "UPDATE tests SET fee = '".$_POST['fee']."' WHERE dcCode = $diag AND name = '".$_POST['test']."';";
				$sql = str_replace(", WHERE dcCode =", " WHERE dcCode =", $sql);
				$result = mysqli_query($conn, $sql);
				header("location:operator_diagnostic.php");
			}
			else{ ?>
			<center><h3>Please enter a valid test</h3></center>
			<?php }
			
		}
		
		if (isset($_POST['add_diag'])){
			require_once('dbconnect.php');
				$sql = "INSERT INTO Tests VALUES ( $diag, ";
				if (isset($_POST['test']) && $_POST['test']!=""){
					$sql .= "'".$_POST['test']."',";
				if (isset($_POST['fee']) && $_POST['fee']!=""){
				$sql .= "'".$_POST['fee']."')";
				$result = mysqli_query($conn, $sql);
				echo $sql;
				header("location:operator_diagnostic.php");
				}
				else{ ?>
			<center><h3>Please enter a valid id</h3></center>
		<?php }
				}
				
			else{ ?>
			<center><h3>Please enter a valid id</h3></center>
		<?php }}
		
		
		if (isset($_POST['delete_diag'])){
			require_once('dbconnect.php');
			if (isset($_POST['test']) && $_POST['test']!=""){
			$sql = "DELETE FROM tests WHERE name = '".$_POST['test']."';";
			$result = mysqli_query($conn, $sql);
			header("location:operator_diagnostic.php");
			}
			else{ ?>
			<center><h3>Please enter a valid id</h3></center>
			<?php }
			
		}
		
		?>
	
	</div>
</div>
</body>
</html>