<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
</head>
<body>
	<h1>Contact Tracer</h1>	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				
		<input type="submit" name="register" value="register"><br><br>
		<input type="submit" name="dispall" value="display all contacts"><br><br>

	</form>
	<h1>Log Book</h1>	

	<?php
		
		error_reporting (E_ALL ^ E_NOTICE);	//remove notices
		include_once 'db.inc.php';		//database reference

		
		if(isset($_POST['dispall'])){		//display all
		$sql = "select * from contact";		//SQL statement
		$result = mysqli_query($conn, $sql);		//send SQL statement to database
		$resultcheck = mysqli_num_rows($result);	//check if there is a result
		if($resultcheck > 0){
			while($row = mysqli_fetch_assoc($result)){
				
				echo $row['id'], ", ";
				echo $row['name'], ", ";
				echo $row['address'], ", ";
				echo $row['number'], ", ";
				echo $row['email'], ", ";
				echo $row['date'], ", ";	
				echo "<br><br>";
			}
		}
		else if($resultcheck == 0){			//if no contact in database display no result
		echo "No results";
		}
		}

		else if(isset($_POST['register'])){		//go to register.php
		header("Location: register.php");
		
		}
		
		
	?>

	
</body>
</html>