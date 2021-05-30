<!DOCTYPE html>
<html>
<head>
	<title>Address Book | Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="header">
		<h1>Contact Tracer</h1>	
		<ul id="navlist">
            <li id="navlist-item">Register</li>
        </ul>
    </div>

	<div class="content">
		<h2>Registration Form</h2>	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<input size="50" type="tel" pattern="[0-9]{8}" placeholder="ID Number (16101002)" name="id" required><br><br>
			<input size="22" type="text" placeholder="First Name (Juan)" name="fname" required> 
			<input size="22" type="text" placeholder="Last Name (Juan)" name="lname" required> <br><br>
			
			<?php 		include_once 'db.inc.php';
					
					$query = "SELECT * FROM barangay";		//sql statement to look for contacts with inputted brgy
					$result_brgy = mysqli_query($conn, $query);?>

					
					<select name = "barangay">
					<?php while($row1 = mysqli_fetch_array($result_brgy))
					echo "<option>", $row1[1], "</option>";?> 
					</select>
			
			
			
			<input size="22" type="text" placeholder="City (Cebu City)" name="caddress" required><br><br>
			<input size="50" type="text" placeholder="Province (Cebu)" name="paddress" required><br><br>
			<input size="50" type="tel" pattern="[0-9]{11}" placeholder="Number (09123456789)" name="number" required><br><br>
			<input size="50" type="email" placeholder="USC Email (xyz@usc.edu.ph)" name="email" required><br><br>
			<?php
				session_start();
				date_default_timezone_set('Asia/Manila');
				error_reporting (E_ALL ^ E_NOTICE);	//remove notices
				include_once 'db.inc.php';		//database reference
			
				if(isset($_POST['submit_register'])){
					$id = $_POST['id'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$baddress = $_POST['barangay'];
					$caddress = $_POST['caddress'];
					$paddress = $_POST['paddress'];
					$number = $_POST['number'];
					$email = $_POST['email'];
					$date = date("y-m-d\TG:i");
					$searchdate = date("Y-m-d");
					$reg = "insert into contact (id, fname, lname, baddress, caddress, paddress, number, email, datein, dateout, date) VALUES ('$id', '$fname', '$lname', '$baddress', '$caddress', '$paddress', '$number', '$email', '$date', '', '$searchdate');";
					mysqli_query($conn, $reg);
					echo '<i style="color:green;">Logbook Updated</i>', "<br><br>";
				}
				else if(isset($_POST['back'])){
					header("Location: index.php");
				}
			?>
			<input type="submit" name="submit_register" value="Submit Registration"><br><br>
		</form>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<input type="submit" name="back" value="Go Back"><br><br>
		</form>	
	</div>
</body>
</html>