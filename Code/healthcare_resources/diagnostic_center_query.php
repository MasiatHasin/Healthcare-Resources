<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Diagnostic Center Information</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="css/Book_Bed.css">
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
		<b><center style="font-size: 17px;">Diagnostic Center Query</center></b>
			<table border="0" rules="none" class="center" width="70%" style="padding:10px;">
				<tr>
				<td><label>Thana:</label></td>
				<td>
						<select height="10px;" name="thana" id="thana">
						<option valu="All" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Ramna" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Ramna'){ echo "selected";} ?>>Ramna</option>
						<option value="Rajpara" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Rajpara'){ echo "selected";} ?>>Rajpara</option>
						<option value="Panchlaish" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Panchlaish'){ echo "selected";} ?>>Panchlaish</option>
						<option value="Akkelpur" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Akkelpur'){ echo "selected";} ?>>Akkelpur</option>
						<option value="Mirpur" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Mirpur'){ echo "selected";} ?>>Mirpur</option>
						<option value="Uttara" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Uttara'){ echo "selected";} ?>>Uttara</option>
						<option value="Mohakhali" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Mohakhali'){ echo "selected";} ?>>Mohakhali</option>
						<option value="Farmgate" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Farmgate'){ echo "selected";} ?>>Farmgate</option>
						</select>
				</td>
				<td><label>District:</label></td>
				<td>
						<select height="10px;" name="district" id="district">
						<option valu="All" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Dhaka" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Dhaka'){ echo "selected";} ?>>Dhaka</option>
						<option value="Rajshahi" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Rajshahi'){ echo "selected";} ?>>Rajshahi</option>
						<option value="Chittagong" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Chittagong'){ echo "selected";} ?>>Chittagong</option>
						<option value="Rangpur" <?php if (isset($_POST['hosquery'])&& $_POST['places'] == 'Rangpur'){ echo "selected";} ?>>Rangpur</option>
						</select>
				</td>
					<td><label>Test:</label></td>
					<td>
						<select name="test" id="test">
						<option value="All" <?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="Body Fluid Analysis" <?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'Body Fluid Analysis'){ echo "selected";}} ?>>Body Fluid Analysis</option>
						<option value="CT Scan"<?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'CT Scan'){ echo "selected";}} ?>>CT Scan</option>
						<option value="COVID Test"<?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'COVID Test'){ echo "selected";}} ?>>COVID Test</option>
						<option value="ECG"<?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'ECG'){ echo "selected";}} ?>>ECG</option>
						<option value="Tomography"<?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'Tomography'){ echo "selected";}} ?>>Tomography</option>
						<option value="X-Ray"<?php if (isset($_POST['testquery'])){ if($_POST['test'] == 'X-Ray'){ echo "selected";}} ?>>X-Ray</option>
						</select>
					</td>
					<td><label>Hospital:</label></td>
					<td>
						<select name="hos" id="hos">
						<option value="All" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'All'){ echo "selected";}} ?>>All</option>
						<option value="Dhaka Medical College Hospital" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'Dhaka Medical College Hospital'){ echo "selected";}} ?>>Dhaka Medical College Hospital</option>
						<option value="Rajshahi Medical College Hospital" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="Rangpur Medical College Hospital" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="National Heart Foundation" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'Rajshahi Medical College Hospital'){ echo "selected";}} ?>>Rajshahi Medical College Hospital</option>
						<option value="ICDDR Bangladesh" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'ICDDR Bangladesh'){ echo "selected";}} ?>>ICDDR Bangladesh</option>
						<option value="Ispahani Islamia Eye Institute and Hospital" <?php if (isset($_POST['testquery'])){ if($_POST['hos'] == 'Ispahani Islamia Eye Institute and Hospital'){ echo "selected";}} ?>>Ispahani Islamia Eye Institute and Hospital</option>
						</select>
					</td>
				</tr>
				<tr><td colspan="8"><center><button type="submit" value="hospitalq" name="testquery" class="loginbtn2 btn-1 btn">Filter</center></button></td></tr>
			</table>
		</form>
		<?php
		if (isset($_POST['testquery'])){
		require_once('dbconnect.php');
		$p = $_POST['thana'];
		$d = $_POST['district'];
		$t = $_POST['test'];
		$h = $_POST['hos'];
		
		$_SESSION['booked_test']="false";

		$sql = "SELECT a.Name, c.Name, c.thana, c.district, b.name, a.contact, a.dcCode  FROM Diagnostic_center a, Tests b, hospital c WHERE b.dcCode = a.dcCode AND a.hospital = c.hCode";
		if (isset($p) && $p != 'All'){
			$sql .= " AND c.Thana = '$p'";
			if (isset($t) && $t != 'All'){
			$sql .= " AND b.name = '$t'";}
			if (isset($h) && $h != "All"){
			$sql .= " AND c.Name = '$h'";}
			if (isset($d) && $d != "All"){
			$sql .= " AND c.District = '$d'";}
		}
		elseif (isset($t) && $t != 'All'){
			$sql .= " AND b.name = '$t'";
			if (isset($p) && $p != 'All'){
			$sql .= " AND c.Thana = '$p'";}
			if (isset($h) && $h != "All"){
			$sql .= " AND c.Name = '$h'";}
			if (isset($d) && $d != "All"){
			$sql .= " AND c.District = '$d'";}
		}
		elseif (isset($h) && $h != 'All'){
			$sql .= " AND c.name = '$h'";
			if (isset($p) && $p != 'All'){
			$sql .= " AND c.Thana = '$p'";}
			if (isset($t) && $t != 'All'){
			$sql .= " AND b.name = '$t'";}
			if (isset($d) && $d != "All"){
			$sql .= " AND c.District = '$d'";}
		}
		elseif (isset($d) && $d != 'All'){
			$sql .= " AND c.District = '$d'";
			if (isset($p) && $p != 'All'){
			$sql .= " AND c.Thana = '$p'";}
			if (isset($t) && $t != 'All'){
			$sql .= " AND b.name = '$t'";}
			if (isset($h) && $h != "All"){
			$sql .= " AND c.Name = '$h'";}
		}
		else{}
		
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		?>
		<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
			<tr>
				<th>Diagnostic Center</th>
				<th>Hospital</th>
				<th>Location</th>
				<th>Test</th>
				<th>Contact</th>
				
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)){
			?>

			<tr>
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[1]; ?> </td>
				<td>  <?php echo $row[2]; ?>, <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[4]; ?> </td>
				<td>  <?php echo $row[5]; ?> </td>
				
			</tr>

			<?php } ?>
		</table>
		<?php }
		else{
			?>
			
			<table border="0" class="query center fail" style="border-collapse: collapse; text-align:center;">
			<tr>
				<td colspan="5">
				<center><h3>Results</h3>
				<font  size="3.5px">0 Results Found<br><img class="icon" src="https://img.icons8.com/color/48/000000/nothing-found.png"/><br><br></font>
			</tr>
			</center>
			</table>
			<?php } 
		} ?>
		<br><br>
	</div>
</div>
</body>
</html>