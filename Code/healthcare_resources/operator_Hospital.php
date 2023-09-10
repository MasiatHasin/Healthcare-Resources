<?php
// Start the session
ob_start();
session_start();
?>
<html>
<head>
<title>Login</title>
<link rel = "icon" href ="https://img.icons8.com/color/48/000000/treatment-plan.png" type = "image/x-icon">
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
	
	<div class="paper">
		<form action="" spellcheck="false" method="post">
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="50%">
			<?php 
			$n = $_SESSION['n'];
			require_once('dbconnect.php');
			$sql = "SELECT a.available_beds,a.bed_amount,a.bed_fee,a.hCode,a.name FROM hospital a, hospital_data_edit b WHERE b.operator= '" . $_SESSION['n'] . "' AND a.hCode  = b.hospital;";
			$result = mysqli_query($conn, $sql);
			?>
			<?php while($row = mysqli_fetch_array($result)){?>
			<tr style="background-color: transparent;font-size:18px;"><td colspan="3">[<?php echo $row[3]; ?>] <?php echo $row[4]; ?></td></tr>
			<tr style="background-color: transparent"><td colspan="3"><b><center style="font-size: 16px;">Hospital Data</center></b></td></tr>
			<tr><th>Available Beds</th><th>Bed Amount</th><th>Bed Fee</th></tr>
			<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td></tr>
			<?php } ?>
			</table>
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="50%">
			<tr style="background-color:transparent;">
			<td></input>Available Beds:<input name="av_bed"></input></td><td>Bed Amount:<input name="bed_amnt"></input></td><td>Bed Fee:<input name="bed_fee"></input></td></tr>
			<tr style="background-color:transparent;">
			<td colspan="3"><center><button type="submit" name="edit_hos" class="loginbtn btn-1 btn">Edit</button></center></td>
			</tr>
			</table>
		
			<b><center style="font-size: 16px;">Doctor Data</center></b>
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="100%">
			<?php 
			require_once('dbconnect.php');
			$sql = "SELECT a.id,a.name,a.designation,a.qualification,a.specialization,a.department,a.visiting_hour,a.visiting_fee,a.hospital FROM doctor a, hospital_data_edit b WHERE b.operator= '" . $_SESSION['n'] . "' AND a.hospital  = b.hospital;";
			$result = mysqli_query($conn, $sql);
			?>
			<tr><th>ID</th><th>Name</th><th>Designation</th><th>Qualification</th><th>Specialization</th><th>Department</th><th>Visiting Hour</th><th>Visiting Fee</th><tr>
			<?php while($row = mysqli_fetch_array($result)){?>
			<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td><td><?php echo $row[3]; ?></td><td><?php echo $row[4]; ?></td>
			<td><?php echo $row[5]; ?></td><td><?php echo $row[6]; ?></td><td>Tk. <?php echo $row[7]; ?></td>
			<?php } ?>
			</table>
			<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="50%">
			<tr style="background-color:transparent;">
			<td><center>ID:<input name="id"></input></center></td>
			<td>Name:<input name="Name"></input></td>
			<td>Designation:<input name="Designation"></input></td>
			<td>Qualification:<input name="Qualification"></input></td>
			</tr>
			<tr style="background-color:transparent;">
			<td>Specialization:<input name="Specialization"></input></td>
			<td>Department:<input name="Department"></input></td>
			<td>Visiting hour:<input name="Visiting_Hour"></input></td>
			<td>Visiting Fee:<input name="Visiting_Fee"></input></td>
			<input type="hidden" name="hos" value= "<?php echo $row[7]; ?>"></input>
			</tr>
			<tr style="background-color:transparent;">
			<td><center><button type="submit" name="edit_doc" class="loginbtn btn-1 btn">Edit</button></center></td>
			<td colspan="2"><center><button type="submit" name= "add_doc" class="loginbtn btn-1 btn">Add</button></center></td>
			<td><center><button type="submit" name= "delete_doc" class="loginbtn btn-1 btn">Delete</button></center></td>
			</tr>
			</table>
		</form>
		
		<?php 
		$n = $_SESSION['n'];
		
		$sql = "SELECT hCode FROM hospital a, hospital_data_edit b WHERE hCode = b.hospital AND b.operator = $n;";
		$result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_array($result)){
			$hCode = $row['hCode'];
			}
			
		if (isset($_POST['edit_hos'])){
			require_once('dbconnect.php');
			if (isset($hCode) && $hCode!=0){
				$sql = "UPDATE hospital SET ";
				if (isset($_POST['av_bed']) && $_POST['av_bed']!=""){
					$sql .= "available_beds = '".$_POST['av_bed']."',";
				}
				if (isset($_POST['bed_amnt']) && $_POST['bed_amnt']!=""){
					$sql .= "bed_amount = '".$_POST['bed_amnt']."',";
				}
				if (isset($_POST['bed_fee']) && $_POST['bed_fee']!=""){
					$sql .= "bed_fee = '".$_POST['bed_fee']."',";
				}
				$sql .= " WHERE hCode = $hCode;";
				$sql = str_replace(", WHERE hCode =", " WHERE hCode =", $sql);
				$result = mysqli_query($conn, $sql);
				header("location:operator_hospital.php");
			}
			else{ ?>
			<center><h3>Please enter a valid ID</h3></center>
			<?php }
		}
		
		if (isset($_POST['edit_doc'])){
			require_once('dbconnect.php');
			if (isset($_POST['id']) && $_POST['id']!=0){
				$sql = "UPDATE doctor SET ";
				if (isset($_POST['Name']) && $_POST['Name']!=""){
					$sql .= "Name = '".$_POST['Name']."',";
				}
				if (isset($_POST['Designation']) && $_POST['Designation']!=""){
					$sql .= "Designation = '".$_POST['Designation']."',";
				}
				if (isset($_POST['Qualification']) && $_POST['Qualification']!=""){
					$sql .= "Qualification = '".$_POST['Qualification']."',";
				}
				if (isset($_POST['Specialization']) && $_POST['Specialization']!=""){
					$sql .= "Specialization = '".$_POST['Specialization']."',";
				}
				if (isset($_POST['Visiting_Hour']) && $_POST['Visiting_Hour']!=""){
					$sql .= "Visting_Hour= '".$_POST['Visiting_Hour']."',";
				}
				if (isset($_POST['Visiting_Fee']) && $_POST['Visiting_Fee']!=""){
					$sql .= "Visiting_Fee = '".$_POST['Visiting_Fee']."'";
				}
				$sql .= " WHERE id = ".$_POST['id'].";";
				$sql = str_replace(", WHERE id =", " WHERE id =", $sql);
				echo $sql;
				$result = mysqli_query($conn, $sql);
				header("location:operator_hospital.php");
			}
			else{ ?>
			<center><h3>Please enter a valid ID</h3></center>
			<?php }
		}
		
		if (isset($_POST['add_doc'])){
			
			require_once('dbconnect.php');
			if (isset($_POST['id']) && $_POST['id']!=0){
				$sql = "INSERT INTO doctor VALUES ( ".$_POST['id'].", ";
				if (isset($_POST['Name']) && $_POST['Name']!=""){
					$sql .= "'".$_POST['Name']."',";
				}
				else{$sql .= "'',";}
				if (isset($_POST['Designation']) && $_POST['Designation']!=""){
					$sql .= "'".$_POST['Designation']."',";
				}
				else{ $sql .= "'',";}
				if (isset($_POST['Qualification']) && $_POST['Qualification']!=""){
					$sql .= "'".$_POST['Qualification']."',";
				}
				else{ $sql .= "'',";}
				$spec = "''";
				if (isset($_POST['Specialization']) && $_POST['Specialization']!=""){
					$spec = $_POST['Specialization'];
					$sql .= "'".$_POST['Specialization']."',";
				}
				else{ $sql .= "'',";}
				if (isset($_POST['Visiting_Hour']) && $_POST['Visiting_Hour']!=""){
					$sql .= "'".$_POST['Visiting_Hour']."',";
				}
				else{ $sql .= "'',";}
				if (isset($_POST['Visiting_Fee']) && $_POST['Visiting_Fee']!=""){
					$sql .= "'".$_POST['Visiting_Fee']."',";
				}
				if (isset($_POST['Department']) && $_POST['Department']!=""){
					$sql .= "'".$_POST['Department']."',";
				}
				else{ $sql .= "'',";}
				
				$sql2 = "SELECT a.hospital FROM doctor a, hospital_data_edit b WHERE a.hospital = b.hospital AND b.operator = $n";
				$result2 = mysqli_query($conn, $sql2);
				
				while($row = mysqli_fetch_array($result2)){
						$hos = $row['hospital'];
					}
				$sql .= "$hos);";
				echo $sql;
				
				$result = mysqli_query($conn, $sql);
				
			}
			
			else{ ?>
			<center><h3>Please enter a valid ID</h3></center>
			<?php }
		}
		
		if (isset($_POST['delete_doc'])){
			require_once('dbconnect.php');
			if (isset($_POST['id']) && $_POST['id']!=0){
			$sql = "DELETE FROM doctor WHERE id = ".$_POST['id'].";";
			$result = mysqli_query($conn, $sql);
			header("location:operator_hospital.php");
			}
			else{ ?>
			<center><h3>Please enter a valid ID</h3></center>
			<?php }
			
		}
		
		?>
	</div>
	<br><br><br>
</div>
</body>
</html>