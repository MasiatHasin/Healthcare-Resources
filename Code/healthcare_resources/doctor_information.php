<?php
// Start the session
session_start();
?><html>
<head>
<title>Doctor Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
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
	<div id="form">
		<form action="" method="post">
		<b><center style="font-size: 17px;">Doctor Information</center></b>
			<table border="0" rules="none" class="center" width="70%" style="padding:10px;">
				<tr>
				<td><label>Thana:</label></td>
				<td>
						<select height="10px;" name="thana" id="thana">
						<option value="All" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Ramna" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Ramna'){ echo "selected";} ?>>Ramna</option>
						<option value="Rajpara" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Rajpara'){ echo "selected";} ?>>Rajpara</option>
						<option value="Panchlaish" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Panchlaish'){ echo "selected";} ?>>Panchlaish</option>
						<option value="Akkelpur" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Akkelpur'){ echo "selected";} ?>>Akkelpur</option>
						<option value="Mirpur" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Mirpur'){ echo "selected";} ?>>Mirpur</option>
						<option value="Uttara" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Uttara'){ echo "selected";} ?>>Uttara</option>
						<option value="Mohakhali" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Mohakhali'){ echo "selected";} ?>>Mohakhali</option>
						<option value="Farmgate" <?php if (isset($_POST['doctorq'])&& $_POST['thana'] == 'Farmgate'){ echo "selected";} ?>>Farmgate</option>
						</select>
				</td>
				<td><label>District:</label></td>
				<td>
						<select height="10px;" name="district" id="district">
						<option value="All" <?php if (isset($_POST['doctorq'])&& $_POST['district'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Dhaka" <?php if (isset($_POST['doctorq'])&& $_POST['district'] == 'Dhaka'){ echo "selected";} ?>>Dhaka</option>
						<option value="Rajshahi" <?php if (isset($_POST['doctorq'])&& $_POST['district'] == 'Rajshahi'){ echo "selected";} ?>>Rajshahi</option>
						<option value="Chittagong" <?php if (isset($_POST['doctorq'])&& $_POST['district'] == 'Chittagong'){ echo "selected";} ?>>Chittagong</option>
						<option value="Rangpur" <?php if (isset($_POST['doctorq'])&& $_POST['district'] == 'Rangpur'){ echo "selected";} ?>>Rangpur</option>
						</select>
				</td>
					<td><label>Department:</label></td>
					<td>
						<select name="dept" id="dept">
						<option value="All" <?php if (isset($_POST['doctorq'])&& $_POST['dept'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Cardiology" <?php if (isset($_POST['doctorq'])&& $_POST['dept'] == 'Cardiology'){ echo "selected";} ?>>Cardiology</option>
						<option value="Neurology" <?php if (isset($_POST['doctorq'])&& $_POST['dept'] == 'Neurology'){ echo "selected";} ?>>Neurology</option>
						<option value="Ophthalmology"<?php if (isset($_POST['doctorq'])&& $_POST['dept'] == 'Ophthalmology'){ echo "selected";} ?>>Ophthalmology</option>
						<option value="Pulmonology" <?php if (isset($_POST['doctorq'])&& $_POST['dept'] == 'Pulmonology'){ echo "selected";} ?>>Pulmonology</option>

						</select>
					</td>
					<td><label>Hospital:</label></td>
					<td>
						<select name="hos" id="hos">
						<option value="All" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="Dhaka Medical College Hospital" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'Dhaka Medical College Hospital'){ echo "selected";}} ?>>Dhaka Medical College Hospital</option>
						<option value="Rajshahi Medical College Hospital" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="Rangpur Medical College Hospital" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="National Heart Foundation" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="ICDDR Bangladesh" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'ICDDR Bangladesh'){ echo "selected";}} ?>>ICDDR Bangladesh</option>
						<option value="Ispahani Islamia Eye Institute and Hospital" <?php if (isset($_POST['doctorq'])){ if($_POST['hos'] == 'Ispahani Islamia Eye Institute and Hospital'){ echo "selected";}} ?>>Ispahani Islamia Eye Institute and Hospital</option>
						</select>
					</td>
					<td><label>Day:</label></td>
					<td><select name="day" id="day">
					<option value="All" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'All'){ echo "selected";}} ?>>All</option>
					<option value="Sun" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Sun'){ echo "selected";}} ?>>Sunday</option>
					<option value="Mon" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Mon'){ echo "selected";}} ?>>Monday</option>
					<option value="Tue" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Tue'){ echo "selected";}} ?>>Tuesday</option>
					<option value="Wed" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Wed'){ echo "selected";}} ?>>Wednesday</option>
					<option value="Thu" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Thu'){ echo "selected";}} ?>>Thursday</option>
					<option value="Fri" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Fri'){ echo "selected";}} ?>>Friday</option>
					<option value="Sat" <?php if (isset($_POST['doctorq'])){ if($_POST['day'] == 'Sat'){ echo "selected";}} ?>>Saturday</option>
					</select></td>
				</tr>
				<tr><td colspan="10"><center><button type="submit" value="hospitalq" name="doctorq" class="loginbtn2 btn-1 btn">Filter</center></button></td></tr>
			</table>
		</form>
		<?php
		if (isset($_POST['doctorq'])){
		require_once('dbconnect.php');
		$p = $_POST['thana'];
		$dis = $_POST['district'];
		$day = $_POST['day'];
		$d = $_POST['dept'];
		$h = $_POST['hos'];
		

		$sql = "SELECT a.Name,b.Name,a.Designation,a.Qualification,a.Specialization,a.Visiting_hour,a.visiting_fee,a.id, c.day FROM Doctor a, Hospital b, doctorSlots c WHERE a.hospital = b.hCode AND c.dCode = a.id";
		if (isset($p) && $p != 'All'){
			$sql .= " AND b.Thana = '$p'";
		}
		if (isset($dis) && $dis != 'All'){
			$sql .= " AND b.District = '$dis'";
		}
		if (isset($d) && $d != 'All'){
			$sql .= " AND a.Department = '$d'";
		}
		if (isset($h) && $h != 'All'){
			$sql .= " AND b.Name = '$h'";
		}
		if (isset($day) && $day != 'All'){
			$sql .= " AND c.day = '$day'";
		}
		
		$sql .= ";";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		?>
		<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
			<tr>
				<th>Name</th>
				<th>Hospital</th>
				<th>Designation</th>
				<th>Qualification</th>
				<th>Specialization</th>
				<th>Visiting Hour</th>
				<th>Visiting Fee</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)){
			?>

			<tr>
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[1]; ?> </td>
				<td>  <?php echo $row[2]; ?> </td>
				<td>  <?php echo $row[3]; ?> </td>
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
				<td colspan="7">
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