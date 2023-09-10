<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Hospital Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=">
<link rel="stylesheet" href="css/book_bed.css">
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
	<br><br>
	<div class="paper2">
		<form action="" method="post">
			<b><center style="font-size: 17px;">Hospital Information </center></b>
				<table border="0" rules="none" class="center" width="70%" style="padding:10px;">
				<tr>
				<td><label>Thana:</label></td>
				<td>
						<select height="10px;" name="thana" id="thana">
						<option value="All" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Ramna" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Ramna'){ echo "selected";} ?>>Ramna</option>
						<option value="Rajpara" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Rajpara'){ echo "selected";} ?>>Rajpara</option>
						<option value="Panchlaish" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Panchlaish'){ echo "selected";} ?>>Panchlaish</option>
						<option value="Akkelpur" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Akkelpur'){ echo "selected";} ?>>Akkelpur</option>
						<option value="Mirpur" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Mirpur'){ echo "selected";} ?>>Mirpur</option>
						<option value="Uttara" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Uttara'){ echo "selected";} ?>>Uttara</option>
						<option value="Mohakhali" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Mohakhali'){ echo "selected";} ?>>Mohakhali</option>
						<option value="Farmgate" <?php if (isset($_POST['hosquery'])&& $_POST['thana'] == 'Farmgate'){ echo "selected";} ?>>Farmgate</option>
						</select>
				</td>
				<td><label>District:</label></td>
				<td>
						<select height="10px;" name="district" id="district">
						<option value="All" <?php if (isset($_POST['hosquery'])&& $_POST['district'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Dhaka" <?php if (isset($_POST['hosquery'])&& $_POST['district'] == 'Dhaka'){ echo "selected";} ?>>Dhaka</option>
						<option value="Rajshahi" <?php if (isset($_POST['hosquery'])&& $_POST['district'] == 'Rajshahi'){ echo "selected";} ?>>Rajshahi</option>
						<option value="Chittagong" <?php if (isset($_POST['hosquery'])&& $_POST['district'] == 'Chittagong'){ echo "selected";} ?>>Chittagong</option>
						<option value="Rangpur" <?php if (isset($_POST['hosquery'])&& $_POST['district'] == 'Rangpur'){ echo "selected";} ?>>Rangpur</option>
						</select>
				</td>
					<td><label>Speciality:</label></td>
					<td>
						<select name="dept" id="dept">
						<option value="All" <?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="General" <?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'General'){ echo "selected";} ?>>General</option>
						<option value="Cardiac" <?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'Cardiac'){ echo "selected";} ?>>Cardiac</option>
						<option value="COVID"<?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'COVID'){ echo "selected";} ?>>COVID</option>
						<option value="Diarrhoea" <?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'Diarrhoea'){ echo "selected";} ?>>Diarrhoea</option>
						<option value="Eye"<?php if (isset($_POST['hosquery'])&& $_POST['dept'] == 'Eye'){ echo "selected";} ?>>Eye</option>
						</select>
					</td>
					<td><label>Bed:</label></td>
					<td>
						<select name="bed" id="bed">
						<option value="All" <?php if (isset($_POST['hosquery'])&& $_POST['bed'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Available" <?php if (isset($_POST['hosquery'])&& $_POST['bed'] == 'Available'){ echo "selected";} ?>>Available</option>
						<option value="Unavailable" <?php if (isset($_POST['hosquery'])&& $_POST['bed'] == 'Unavailable'){ echo "selected";} ?>>Unavailable</option>
						</select>
					</td>
				</tr>
				<?php 
				if (isset($_POST['loggedin'])){ ?> <input type="hidden" name="loggedin" value="signin"></input><input type="hidden" name="nid" value="<?php echo $_POST['nid'] ?>"></input>
				<?php } ?>
				<tr><td colspan="8"><center><button type="submit" value="hospitalq" name="hosquery" class="loginbtn2 btn-1 btn">Filter</center></button></td></tr>
			</table>
			</form>
		<?php
		if (isset($_POST['hosquery'])){
		require_once('dbconnect.php');
		$p = $_POST['thana'];
		$dis = $_POST['district'];
		$d = $_POST['dept'];
		$b = $_POST['bed'];
		$_SESSION['booked_bed']="false";

		$sql = "SELECT Name, Thana, District, Speciality, Contact, Available_Beds, Bed_Fee, hCode FROM Hospital WHERE hCode = hCode";
		if (isset($p) && $p != 'All'){
			$sql .= " AND Thana = '$p'";
		}
		if (isset($dis) && $dis != 'All'){
			$sql .= " AND District = '$dis'";
		}
		if (isset($d) && $d != 'All'){
			$sql .= " AND Speciality = '$d'";
		}
		if ($b == "Available"){
			$sql .= " AND Available_Beds > 0";
		}
		if ($b == "Unavailable"){
			$sql .= " AND Available_Beds = 0";
		}

		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		?>
		<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
			<tr>
				<th>Hospital</th>
				<th>Specialization</th>
				<th>Location</th>
				<th>Contact</th>
				<th>Bed</th>
				<th>Fee</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)){
			?>

			<tr>
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[1]; ?>, <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[4]; ?> </td>
				<td>  <?php echo $row[5]; ?> </td>
				<td>  Tk. <?php echo $row[6]; ?> </td>
			</tr>

			<?php } ?>
		</table>
		<?php }
		else{
			?>
			
			<table border="0" class="query center fail" style="border-collapse: collapse; text-align:center;">
			<tr>
				<td colspan="4">
				<center><h3>Results</h3>
				<font  size="3.5px">0 Results Found<br><img class="icon" src="https://img.icons8.com/color/48/000000/nothing-found.png"/><br><br></font>
			</tr>
			</center>
			</table>
			<?php } 
		} ?>
	</div>
	<br><br>
</div>
</body>
</html>