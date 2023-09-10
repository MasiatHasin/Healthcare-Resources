<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel = "icon" href ="images/treatment-plan.png" type = "image/x-icon">
<link rel="stylesheet" href="css/book_bed.css">
</head>
<body>

<div id="container">
	<div id="nav-parent">
		<img id="bannerpic" src="images/banner.png">
		<div class="nav">
		<?php
		if (isset($_SESSION['l']) && $_SESSION['l']=='true'){ ?> 
		<a href="login.php" style="font-size: 18px;padding: 10px;">Logout</a> 
		<?php } 
		else{ ?>
		<a href="login.php" style="font-size: 18px;padding: 10px;">Login</a> 
		<?php } ?>
		</div>
	</div>
	
	
	<div class="paper" style="height: auto; margin-top:80px;">
		<table  border="0" rules="none" class="query center tdequal" id="result" style="border-collapse: collapse;text-align:center; font-size: 14px;" border="1" width="80%">
			
			<?php if (isset($_SESSION['l']) && $_SESSION['l']=='true'){ ?>
			<tr style="background-color:#F7FBFC;">
				<td><a href="book_bed.php"><img class="icon" src="images/hospital-bed.png"/><br><center style="color:#4C4C4C;">Hospital Information</center></a></td>
				<td><a href="book_test.php"><img class="icon" src="images/health-checkup.png"/><br><center style="color:#4C4C4C;">Diagnostic Center Information</center></a></td>
				<td><a href="book_appointment.php"><img class="icon" src="images/planner.png"/><br><center style="color:#4C4C4C;">Doctor Information</center></a></td>
				<td><a href="patient_info.php"><img class="icon" src="images/treatment-plan.png"/><br><center style="color:#4C4C4C;">Patient Information</center></a></td>
			</tr>
			<tr style="background-color: #bcd4e6; font-size:12px;">
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any hospital<br><br>-Book a bed in any hospital with available seats</td>
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any diagnostic center.<br><br>-Book a test in any one of them</td>
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any Doctor<br><br>-Book the doctor you need</td>
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-See your recent medical history<br><br></td>
				<!--<td colspan="3"><img class="icon" src="https://img.icons8.com/color/72/000000/treatment-plan.png"/><br>Patient Records</td>-->
			</tr>
			<?php } 
			else{ ?>
			<tr style="background-color:#F7FBFC;">
				<td><a href="hospital_query.php"><img class="icon" src="images/hospital-3.png"/><br><center style="color:#4C4C4C;">Hospital Information</center></a></td>
				<td><a href="diagnostic_center_query.php"><img class="icon" src="images/organization.png"/><br><center style="color:#4C4C4C;">Diagnostic Center Information</center></a></td>
				<td><a href="doctor_information.php"><img class="icon" src="images/doctor.png"/><br><center style="color:#4C4C4C;">Doctor Information</center><a></td>
			</tr>
			<tr style="background-color: #bcd4e6; font-size:12px;">
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any hospital<br></td>
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any diagnostic center<br></td>
				<td style="text-align:left;color:#4C4C4C;vertical-align: top">-Filter and find information about any Doctor who is available<br></td>
				<!--<td colspan="3"><img class="icon" src="https://img.icons8.com/color/72/000000/treatment-plan.png"/><br>Patient Records</td>-->
			</tr>
			<tr><td colspan="3"><center><br><a href="login.php"><button>Login</button></a> to get access to more features</center></td></tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>