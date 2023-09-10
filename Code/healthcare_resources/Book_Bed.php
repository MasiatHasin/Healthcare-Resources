<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Book Bed</title>
<link rel="stylesheet" href="css/book_bed.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
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
			<form action="" method="post">
			<?php 
			require_once('dbconnect.php');
			$n = $_SESSION['n'];
			$sql = "SELECT * FROM reserve WHERE user = $n AND hospital_bed_no IS NOT NULL;";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) !=0 ){
			?>
			<br><br>
			<b><center style="font-size: 17px;">Booked Bed</center></b>
				<?php if (isset($_SESSION['l']) && $_SESSION['l']=='true'){
				require_once('dbconnect.php');
				if(isset($_SESSION['n'])){
					
				$sql = "select a.user, c.name, b.name, a.hospital_bed_no, b.bed_fee FROM reserve a, Hospital b, user c WHERE a.user = $n AND a.hospital = b.hcode AND c.NID = $n;";

				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) !=0 ){
				while($row = mysqli_fetch_array($result)){?>
				
				<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
				<tr><th>Patient NID</th><th>Patient Name</th><th>Hospital</th><th>Bed Number</th><th>Bed Fee</th></tr>
				<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?> </td><td><?php echo $row[3]; ?> </td><td><?php echo $row[4]; ?> </td></tr>
				
				
				<?php } ?> 
				<tr style="background-color:transparent;"><td colspan="5"><center><button type="submit" name="delete_bed" class="loginbtn btn-1 btn">Cancel</button></center></td></tr>
				<?php 
				}else{echo $sql; ?> 
				<tr><td><center>No previous booking found</center></td></tr>
				<?php }}} ?>
				</table>
				<br>
				</form><?php
			} ?>
			
				
				<!--Booking selection-->
			<br><br><br>
			<form action="" method="post">
			<b><center style="font-size: 17px;">Hospital Information</center></b>
				<table border="0" style="border-collapse: collapse;" class="query center">
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
				<tr><td colspan="8"><center><button type="submit" value="hospitalq" name="hosquery" class="loginbtn btn-1 btn">Filter</center></button></td></tr>
			</table>
			</form>
			
		
		<?php
		if (isset($_POST['hosquery'])){
		require_once('dbconnect.php');
		$p = $_POST['thana'];
		$dis = $_POST['district'];
		$d = $_POST['dept'];
		$b = $_POST['bed'];
		$n = $_SESSION['n'];
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
			$sql2 = "SELECT hospital_bed_no FROM reserve WHERE user = $n AND hospital_bed_no IS NOT NULL;";
			$result2 = mysqli_query($conn, $sql2);
			if(mysqli_num_rows($result2) >0 ){
				$_SESSION['booked_bed']="true";
			}
			else{
				$_SESSION['booked_bed']="false";
			}
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
				$_SESSION['hos'] = $row[4];
			?>

			
			<tr id="<?php echo $row[7]; ?>" onclick="select_bed(<?php echo $row[7]; ?>);">
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[1]; ?>, <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[4]; ?> </td>
				<td>  <?php echo $row[5]; ?> </td>
				<td>  <?php echo $row[6]; ?> </td>
				<?php if(isset($_SESSION['booked_bed']) && ($_SESSION['booked_bed'])=="false"){ ?>
			</tr>
			
			<script>
			var backup = 0;
			function select_bed(hos){
				if (backup!=0){
				document.getElementById(backup).style.backgroundColor = backupCol;
				document.getElementById(backup).style.color = backupfont;}
				hos = hos.toString()
				backupCol = document.getElementById(hos).style.backgroundColor;
				backupfont = document.getElementById(hos).style.color;
				document.getElementById(hos).style.backgroundColor = "#ff6961";
				document.getElementById(hos).style.color = "white";
				backup = hos;
				document.getElementById('book_bed_value').value = hos;
				if (document.getElementById('book_bed').style.display=="block"){
					document.getElementById('book_bed').style.display = "none";
					var delayInMilliseconds = 100; //1 second

					setTimeout(function() {
					document.getElementById('book_bed').style.display = "block";
					}, delayInMilliseconds);
					
				}
				else{
					document.getElementById('book_bed').style.display = "block";
				}
			}
			</script>
			

			<?php }} ?>
			<tr style="background-color:transparent;"><td colspan="6">
			<form method="post" style="display:none;" id="book_bed" class="query center result">
			<input id="book_bed_value" type="hidden" name="book_a_bed" value=""></input>
			<button type="submit" class="loginbtn btn-1 btn" id="submitbtn">Book</button>
			</form>
			</td></tr>
		</table>
		
		<?php }
		else{
			?>
			
			<table border="0" class="query center" style="border-collapse: collapse; text-align:center;">
			<tr>
				<td colspan="4">
				<center><h3>Results</h3>
				<font  size="3.5px">0 Results Found<br><img class="icon" src="https://img.icons8.com/color/48/000000/nothing-found.png"/><br><br></font></center>
			</tr>
			</table>
			<?php } 
		} ?>
			<br>
			<!--Booking selection END -->
			
			<?php
				if (isset($_POST['book_a_bed'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];
					$hos = $_POST['book_a_bed'];

					$sql3 = "select user FROM reserve WHERE user = $n";
					$result3 = mysqli_query($conn, $sql3);
					
					$sql4 = "SELECT bed_amount FROM hospital WHERE hCode = $hos;";
					$result4 = mysqli_query($conn, $sql4);
					while($row = mysqli_fetch_array($result4)){
						$bed_limit = $row['bed_amount'];
					}
					
					$sql5 = "SELECT fee FROM hospital_bed WHERE hCode = $hos AND ward = 1;";
					$result5 = mysqli_query($conn, $sql5);
					while($row = mysqli_fetch_array($result5)){
						$fee = $row['fee'];
					}
					
					$sql = "SELECT * FROM hospital WHERE hCode = $hos AND available_beds>0;";
					$result= mysqli_query($conn, $sql);
					
					$sql2 = "SELECT hospital_bed_no FROM reserve WHERE hospital = $hos;";
					$result2 = mysqli_query($conn, $sql2);
					
					$bed_id = range(1,$bed_limit); 
					$bed_no = array();
					
					while($row = mysqli_fetch_array($result2)){
						$bed_no[] = $row['hospital_bed_no'];
					}
					
					$sql = "SELECT available_beds FROM hospital WHERE hCode = $hos;";
					$result= mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)){
						$available_bed = $row['available_beds'];
					}
					
	
					if(mysqli_num_rows($result3) >0){
						require_once('dbconnect.php');
						if (sizeOf($bed_no)<$bed_limit && $available_bed >0){
							foreach ($bed_id as $id) {
								if (in_array($id, $bed_no)){}
								else{
									$new_bed = $id;
									$sql = "SELECT hospital_bed_no FROM reserve WHERE user = $n AND hospital_bed_no IS NOT NULL;";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result)>0 ){ ?>
										<center><b><br>Bed already booked</b><br></center><br><br>
									<?php }
									else{
										$sql = "UPDATE reserve SET hospital_bed_no = $new_bed, hospital = $hos, ward = 1, fee = fee+$fee WHERE user = $n;";
										$result = mysqli_query($conn, $sql);
										$sql = "UPDATE hospital SET available_beds = available_beds -1 WHERE hCode = $hos;";
										$result = mysqli_query($conn, $sql);
										header("location:book_bed.php");
									}
									break;
								}
							} ?>
							<?php 
						}
						else{ ?>
							
							<center><b>No beds available</b><br></center><br><br>
							<?php
						}
					} 
					else{
						if ($available_bed>0){
						foreach ($bed_id as $id) {
							if (in_array($id, $bed_no)){}
							else{
								$new_bed = $id;
								date_default_timezone_set('Asia/Dhaka');
								$date = date('Y-m-d');
								$time = date('Y-m-d H:i:s');
								$sql = "INSERT INTO reserve values ($n, $hos, 1, $new_bed, NULL, NULL, '$date', '$time', $fee);";
								$result = mysqli_query($conn, $sql);
								echo $sql;
								$sql = "UPDATE hospital SET available_beds = available_beds -1 WHERE hCode = $hos;";
								$result = mysqli_query($conn, $sql);
								header("location:book_bed.php");
								break;
							}
						}}
						else{ ?>
							
							<center><b>No beds available</b><br></center><br><br>
							<?php
						}
						
						}}

					if (isset($_POST['delete_bed'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];
					
					$sql5 = "SELECT a.fee FROM hospital_bed a, reserve b WHERE a.hCode = b.hospital AND a.ward = 1;";
					$result5 = mysqli_query($conn, $sql5);
					while($row = mysqli_fetch_array($result5)){
						$fee = $row['fee'];
					}
					
					$sql2 = "SELECT diagnostic_center FROM reserve WHERE user = $n AND diagnostic_center is NULL;";
					$result2 = mysqli_query($conn, $sql2);
					
					$sql = "SELECT hospital FROM reserve WHERE user = $n;";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)){$hospital_no = $row['hospital'];}
					$sql = "UPDATE hospital SET available_beds = available_beds +1 WHERE hCode = $hospital_no;";
					$result = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($result2) > 0 ){
						$sql = "DELETE FROM reserve WHERE user = $n";
						$result = mysqli_query($conn, $sql);
					}
					else{
						$sql = "UPDATE reserve SET hospital_bed_no = NULL, hospital = NULL, ward = NULL, fee = fee-$fee WHERE user = $n;";
						$result = mysqli_query($conn, $sql);
					}
					header("location:book_bed.php");
					}?>
				
	</div>
	<br>
</body>
</html>