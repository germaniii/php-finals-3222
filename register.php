<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>
	<div class="header">
		<h1>Contact Tracer</h1>	
    </div>

	<div class="content">
		<h2>Register Form</h2>	
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<input size="50" type="tel" pattern="[0-9]{8}" placeholder="ID Number (16101002)" name="id" required><br><br>
			<input size="50" type="text" placeholder="Name (Juan Dela Cruz)" name="name" required><br><br>
			<input size="50" type="text" placeholder="Address (Purok Karne, San Isidro, Lucena City, Cebu)" name="address" required><br><br>
			<input size="50" type="tel" pattern="[0-9]{11}" placeholder="Number (09123456789)" name="number" required><br><br>
			<input size="50" type="email" placeholder="USC Email (xyz@usc.edu.ph)" name="email" required><br><br>
			<input type="submit" name="submit" value="submit"><br><br>
		</form>	

		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<input type="submit" name="back" value="back"><br><br>
		</form>	
	</div>


	<?php
		session_start();
		date_default_timezone_set('Asia/Manila');
		error_reporting (E_ALL ^ E_NOTICE);	//remove notices
		include_once 'db.inc.php';		//database reference
		
		
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
				$name = $_POST['name'];
			$address = $_POST['address'];
				$number = $_POST['number'];
			$email = $_POST['email'];
			$date = date("d-m-y, h:i:sa");
				
			$reg = "insert into contact (id, name, address, number, email, date) VALUES ('$id', '$name', '$address', '$number', '$email', '$date');";
			mysqli_query($conn, $reg);
			echo "Logbook updated";
		}
		else if(isset($_POST['back'])){
			header("Location: index.php");
		}
	?>
</body>
</html>