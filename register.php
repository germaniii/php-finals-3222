<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<h1>Register Form</h1>		
		ID Number: <input type="text" name="id"><br><br>
		Name: <input type="text" name="name"><br><br>
		Address: <input type="text" name="address"><br><br>
		Number: <input type="text" name="number"><br><br>
		Email: <input type="text" name="email"><br><br>

		<input type="submit" name="submit" value="submit"><br><br>
		<input type="submit" name="back" value="back"><br><br>
	</form>	


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