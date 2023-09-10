<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Book Bed</title>
<link rel="stylesheet" href="css/book_bed.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel = "icon" href ="https://img.icons8.com/color/48/000000/treatment-plan.png" type = "image/x-icon">

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
			$sql = "SELECT * FROM reserve WHERE user = $n AND diagnostic_center IS NOT NULL;";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) !=0 ){
			?>
			<br><br>
			<b><center style="font-size: 17px;">Booked test</center></b>
				<?php if (isset($_SESSION['l']) && $_SESSION['l']=='true'){
				require_once('dbconnect.php');
				if(isset($_SESSION['n'])){
					
				$sql = "select a.user, c.name, b.name, a.testName, d.fee FROM reserve a, diagnostic_center b, user c, tests d WHERE a.user = $n AND a.diagnostic_center = b.dcCode AND c.NID = $n AND d.dcCode = b.dcCode AND d.name = a.testName;";

				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result) !=0 ){
				while($row = mysqli_fetch_array($result)){?>
				
				<table  border="0" rules="none" class="query center tdequal result" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="70%">
				<tr><th>Patient NID</th><th>Patient Name</th><th>Diagnostic Center</th><th>Test Name</th><th>Test Fee</th></tr>
				<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?> </td><td><?php echo $row[3]; ?> </td><td><?php echo $row[4]; ?> </td></tr>
				
				
				<?php } ?> 
				<tr style="background-color:transparent;"><td colspan="5"><center><button type="submit" name="delete_test" class="loginbtn btn-1 btn">Cancel</button></center></td></tr>
				<?php 
				}else{ ?> 
				<tr><td><center>No previous booking found</center></td></tr>
				<?php }}} ?>
				</table>
				<br>
				</form><?php
			} ?>
			
				
				<!--Booking selection-->
			<br><br><br>
			<form action="" method="post">
			<b><center style="font-size: 17px;">Diagnostic Center Information </center></b>
				<table border="0" style="border-collapse: collapse;" class="query center">
				<tr>
				<td><label>Thana:</label></td>
				<td>
						<select height="10px;" name="thana" id="thana">
						<option valu="All" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Ramna" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Ramna'){ echo "selected";} ?>>Ramna</option>
						<option value="Rajpara" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Rajpara'){ echo "selected";} ?>>Rajpara</option>
						<option value="Panchlaish" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Panchlaish'){ echo "selected";} ?>>Panchlaish</option>
						<option value="Akkelpur" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Akkelpur'){ echo "selected";} ?>>Akkelpur</option>
						<option value="Mirpur" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Mirpur'){ echo "selected";} ?>>Mirpur</option>
						<option value="Uttara" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Uttara'){ echo "selected";} ?>>Uttara</option>
						<option value="Mohakhali" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Mohakhali'){ echo "selected";} ?>>Mohakhali</option>
						<option value="Farmgate" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Farmgate'){ echo "selected";} ?>>Farmgate</option>
						</select>
				</td>
				<td><label>District:</label></td>
				<td>
						<select height="10px;" name="district" id="district">
						<option valu="All" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'All'){ echo "selected";} ?>>All</option>
						<option value="Dhaka" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Dhaka'){ echo "selected";} ?>>Dhaka</option>
						<option value="Rajshahi" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Rajshahi'){ echo "selected";} ?>>Rajshahi</option>
						<option value="Chittagong" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Chittagong'){ echo "selected";} ?>>Chittagong</option>
						<option value="Rangpur" <?php if (isset($_POST['testquery'])&& $_POST['places'] == 'Rangpur'){ echo "selected";} ?>>Rangpur</option>
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
				<?php 
				if (isset($_POST['loggedin'])){ ?> <input type="hidden" name="loggedin" value="signin"></input><input type="hidden" name="nid" value="<?php echo $_POST['nid'] ?>"></input>
				<?php } ?>
				<tr><td colspan="8"><center><button type="submit" value="hospitalq" name="testquery" class="loginbtn btn-1 btn">Filter</center></button></td></tr>
			</table>
			</form>
			
		
		<?php
		if (isset($_POST['testquery'])){
		require_once('dbconnect.php');
		$p = $_POST['thana'];
		$d = $_POST['district'];
		$t = $_POST['test'];
		$h = $_POST['hos'];
		$n = $_SESSION['n'];
		$_SESSION['booked_test']="false";

		$sql = "SELECT a.Name, c.Name, c.thana, c.district, b.name, a.contact, a.dcCode  FROM Diagnostic_center a, Tests b, hospital c WHERE b.dcCode = a.dcCode AND a.hospital = c.hCode";
		if (isset($p) && $p != 'All'){
			$sql .= " AND c.Thana = '$p'";
		}
		if (isset($t) && $t != 'All'){
			$sql .= " AND b.name = '$t'";
		}
		if (isset($h) && $h != 'All'){
			$sql .= " AND c.name = '$h'";
		}
		if (isset($d) && $d != 'All'){
			$sql .= " AND c.District = '$d'";
		}
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$sql2 = "SELECT diagnostic_center FROM reserve WHERE user = $n AND diagnostic_center IS NOT NULL;";
			$result2 = mysqli_query($conn, $sql2);
			if(mysqli_num_rows($result2) >0 ){
				$_SESSION['booked_test']="true";
			}
			else{
				$_SESSION['booked_test']="false";
			}
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
				$_SESSION['hos'] = $row[4];
			?>

			
			<tr id='<?php echo $row[6]; ?><?php echo $row[4]; ?>' onclick="select_test(<?php echo $row[6]; ?>,'<?php echo $row[4]; ?>');">
				<td>  <?php echo $row[0]; ?> </td>
				<td>  <?php echo $row[1]; ?> </td>
				<td>  <?php echo $row[2]; ?>, <?php echo $row[3]; ?></td>
				<td>  <?php echo $row[4]; ?> </td>
				<td>  <?php echo $row[5]; ?> </td>
				<?php if(isset($_SESSION['booked_test']) && ($_SESSION['booked_test'])=="false"){ ?>
			</tr>
			
			<script>
			var backup = 0;
			function select_test(diag,test){
				id = ''+diag+test;
				if (backup!=0){
				document.getElementById(backup).style.backgroundColor = backupCol;
				document.getElementById(backup).style.color = backupfont;}
				backupCol = document.getElementById(id).style.backgroundColor;
				backupfont = document.getElementById(id).style.color;
				document.getElementById(id).style.backgroundColor = "#ff6961";
				document.getElementById(id).style.color = "white";
				backup = id;
				document.getElementById('book_test_value').value = test;
				document.getElementById('book_diag').value = diag;
				if (document.getElementById('book_test').style.display=="block"){
					document.getElementById('book_test').style.display = "none";
					var delayInMilliseconds = 100; //1 second

					setTimeout(function() {
					document.getElementById('book_test').style.display = "block";
					}, delayInMilliseconds);
					
				}
				else{
					document.getElementById('book_test').style.display = "block";
				}
			}
			</script>
			

			<?php }} ?>
			<tr style="background-color:transparent;"><td colspan="5">
			<form method="post" style="display:none;" id="book_test" class="query center result">
			<input id="book_test_value" type="hidden" name="book_a_test" value=""></input>
			<input id="book_diag" type="hidden" name="diag" value=""></input>
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
				if (isset($_POST['book_a_test'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];
					$diag = $_POST['diag'];
					$test = $_POST['book_a_test'];

					$sql3 = "select user FROM reserve WHERE user = $n";
					$result3 = mysqli_query($conn, $sql3);
					
					$sql5 = "SELECT fee FROM tests WHERE dcCode = $diag AND name = '$test';";
					$result5 = mysqli_query($conn, $sql5);
					while($row = mysqli_fetch_array($result5)){
						$fee = $row['fee'];
					}
				
					if(mysqli_num_rows($result3) >0){
						require_once('dbconnect.php');
						$sql = "SELECT diagnostic_center FROM reserve WHERE user = $n AND diagnostic_center IS NOT NULL;";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result)>0 ){ ?>
							<center><b><br>Bed already booked</b><br></center><br><br>
						<?php }
						else{
							$sql = "UPDATE reserve SET diagnostic_center = $diag, testName = '$test',  fee= fee + $fee WHERE user = $n;";
							$result = mysqli_query($conn, $sql);
							header("location:book_test.php");
						}
						}
					else{
						date_default_timezone_set('Asia/Dhaka');
						$date = date('Y-m-d');
						$time = date('H:i:s');
						$sql = "INSERT INTO reserve values ($n, NULL, NULL, NULL, $diag, '$test', '$date', '$time', $fee);";
						$result = mysqli_query($conn, $sql);
						header("location:book_test.php");
						}} ?>
						
				<?php 

					if (isset($_POST['delete_test'])){
					require_once('dbconnect.php');
					$n = $_SESSION['n'];

					$sql2 = "SELECT hospital_bed_no FROM reserve WHERE user = $n AND hospital_bed_no IS NULL;";
					$result2 = mysqli_query($conn, $sql2);
					
					$sql5 = "SELECT a.fee FROM tests a, reserve b WHERE a.dcCode = b.diagnostic_center AND a.name = b.testName;";
					$result5 = mysqli_query($conn, $sql5);
					while($row = mysqli_fetch_array($result5)){
						$fee = $row['fee'];
					}
					
					$sql = "SELECT diagnostic_center FROM reserve WHERE user = $n;";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_array($result)){$hospital_no = $row['diagnostic_center'];}
					
					if(mysqli_num_rows($result2) >0 ){
						$sql = "DELETE FROM reserve WHERE user = $n";
						$result = mysqli_query($conn, $sql);
					}
					else{
						$sql = "UPDATE reserve SET diagnostic_center = NULL, testName = NULL, fee = ABS(fee-$fee) WHERE user = $n;";
						$result = mysqli_query($conn, $sql);
					}
					header("location:book_test.php");
					}?>
				
	</div>
	<br>
</body>
</html>