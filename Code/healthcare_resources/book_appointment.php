<?php
// Start the session
ob_start();
session_start();
?>
<html>
<head>
<title>Book Appointment</title>
<link rel="stylesheet" href="css/book_bed.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">
<style>
select{
	width: 100px;
}
</style>
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
			$n = $_SESSION['n'];
			require_once('dbconnect.php');
			$sql = "SELECT * FROM appointment WHERE patient = $n;";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) !=0 ){
			?>
			<br><br><br>
			<b><center style="font-size: 17px;">Booked Appointment </center></b>
				<?php if (isset($_SESSION['l']) && $_SESSION['l']=='true'){
				require_once('dbconnect.php');
				if(isset($_SESSION['n'])){
					
				$sql = "select DISTINCT a.patient, e.name, b.name, c.name, d.day, b.visiting_fee, b.id FROM appointment a, doctor b, hospital c, doctorSlots d, user e WHERE patient = $n AND a.doctor = b.id AND b.hospital = c.hCode AND d.day = a.Appointment_Day AND e.NID = $n;";

				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) !=0 ){
				while($row = mysqli_fetch_array($result)){?>
				
				<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
				<tr><th>Patient NID</th><th>Patient Name</th><th>Doctor</th><th>Hospital</th><th>Appointment Day</th><th>Visiting Fee</th></tr>
				<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td><td><?php echo $row[3]; ?> </td><td><?php echo $row[4]; ?> </td><td><?php echo $row[5]; ?> </td></tr>
				<tr><td><input type="hidden" name="doc" value= "<?php echo $row[6]; ?>"></input></td></tr>
				<tr><td><input type="hidden" name="day2" value= "<?php echo $row[4]; ?>"></input></td></tr>
				
				<?php } ?> 
				<tr style="background-color: transparent;"><td colspan="6" style="background-color:transparent;"><center><button type="submit" name="delete_appn" class="loginbtn btn-1 btn">Cancel</button></center></td></tr>
				<?php 
				}else{ ?> 
				<tr><td><center>No previous appointment found</center></td></tr>
				<?php }}} ?>
				</table>
				<br>
				</form><?php
			} ?>
				
				<!--Booking selection-->
			<br><br><br>
			<form action="" method="post">
			<b><center style="font-size: 17px;">Doctor Information</center></b>
				<table border="0" style="border-collapse: collapse;" class="query center">
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
				<tr style="background-color: transparent;"><td colspan="10"><center><button type="submit" value="hospitalq" name="doctorq" class="loginbtn btn-1 btn">Filter</center></button></td></tr>
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
		$n = $_SESSION['n'];

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
		
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$sql2 = "SELECT * FROM appointment WHERE patient = $n;";
			$result2 = mysqli_query($conn, $sql2);
			if(mysqli_num_rows($result2) >0 ){
				$_SESSION['booked_appn']="true";
			}
			else{
				$_SESSION['booked_appn']="false";
			}
		?>
		<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
			<tr>
				<th>Name</th>
				<th>Hospital</th>
				<th>Designation</th>
				<th>Qualification</th>
				<th>Specialization</th>
				<th>Visiting Hour</th>
				<th>Visiting_Day</th>
				<th>Visiting Fee</th>
			</tr>
			<?php
			while($row = mysqli_fetch_array($result)){
				$_SESSION['doc'] = $row[7];
			?>

			
			<tr id='<?php echo $row[7]; ?><?php echo $row[8]; ?>' onclick="select_doc(<?php echo $row[7]; ?>,'<?php echo $row[8]; ?>');">
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[1]; ?> </td>
				<td>  <?php echo $row[2]; ?> </td>
				<td>  <?php echo $row[3]; ?> </td>
				<td>  <?php echo $row[4]; ?> </td>
				<td>  <?php echo $row[5]; ?> </td>
				<td>  <?php echo $row[8]; ?> </td>
				<td>  Tk. <?php echo $row[6]; ?> </td>
				<?php if(isset($_SESSION['booked_appn']) && ($_SESSION['booked_appn'])=="false"){ ?>
			</tr>
			
			<script>
			var backup = 0;
			function select_doc(doc,day){
				id = ''+doc+day;
				if (backup!=0){
				document.getElementById(backup).style.backgroundColor = backupCol;
				document.getElementById(backup).style.color = backupfont;}
				backupCol = document.getElementById(id).style.backgroundColor;
				backupfont = document.getElementById(id).style.color;
				document.getElementById(id).style.backgroundColor = "#ff6961";
				document.getElementById(id).style.color = "white";
				backup = id;
				document.getElementById('book_appn_value').value = doc;
				document.getElementById('book_appn_value2').value = day;
				if (document.getElementById('book_appn').style.display=="block"){
					document.getElementById('book_appn').style.display = "none";
					var delayInMilliseconds = 100; //1 second

					setTimeout(function() {
					document.getElementById('book_appn').style.display = "block";
					}, delayInMilliseconds);
					
				}
				else{
					document.getElementById('book_appn').style.display = "block";
				}
			}
			</script>
			

			<?php }} ?>
			<tr style="background-color: transparent;"><td colspan="9">
			<form method="post" style="display:none;" id="book_appn" class="query center result">
			<input id="book_appn_value" type="hidden" name="book_a_appn" value=""></input>
			<input id="book_appn_value2" type="hidden" name="day" value="" placeholder="dd-mm"></input>
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
			<br><br>
			<!--Booking selection END -->
			
			<?php
				if (isset($_POST['book_a_appn'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];
					$doc= $_POST['book_a_appn'];
					$day = $_POST['day'];
					
					date_default_timezone_set('Asia/Dhaka');
					$date = date('Y-m-d');
					$time = date('H:i:s');

					$sql = "SELECT * FROM doctorSlots WHERE dCode = $doc AND day = '$day' AND Availability >0;";
					$result = mysqli_query($conn, $sql);
					
					echo $sql;
					if(mysqli_num_rows($result)>0){
						$sql = "INSERT INTO appointment values ($doc, $n, '$date', '$time', '$day');";
						$result = mysqli_query($conn, $sql);
						echo $sql;
						$sql = "UPDATE doctorSlots SET Availability = Availability -1 WHERE dCode = $doc AND day = '$day';";
						$result = mysqli_query($conn, $sql);
						header("location:book_appointment.php");
					}
					else{ ?>
					No more slots left.
				<?php }}
					
					if (isset($_POST['delete_appn'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];
					$doc = $_POST['doc'];
					$day2 = $_POST['day2'];
					
					$sql = "SELECT * FROM appointment WHERE patient = $n;";
					$result = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($result) >0 ){
						$sql = "DELETE FROM appointment WHERE patient = $n";
						$result = mysqli_query($conn, $sql);
						$sql = "UPDATE doctorSlots SET Availability = Availability +1 WHERE dCode = $doc AND day = '$day2';";
						$result = mysqli_query($conn, $sql);
						header("location:book_appointment.php");
					}
					}?>
				
	</div>
	<br>
</body>
</html>