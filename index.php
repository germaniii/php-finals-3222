<!DOCTYPE html>
<html>
<head>
	<title>Address Book</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Contact Tracer</h1>	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
		ID Number: <input type="text" name="id"><br><br>	
		<input type="submit" name="signin" value="sign in"><br><br><br>	
		Click here to register: <br><br>
		<input type="submit" name="register" value="register"><br><br>
		<input type="submit" name="dispall" value="display all contacts"><br><br>

	</form>
	<h1>Log Book</h1>	

	<?php
		date_default_timezone_set('Asia/Manila');
		error_reporting (E_ALL ^ E_NOTICE);	//remove notices
		include_once 'db.inc.php';		//database reference
		
		if(isset($_POST['dispall'])){		//display all
			$sql = "SELECT * from contact";		//SQL statement
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
				else if($resultcheck == 0 || $resultcheck == FALSE){			//if no contact in database display no result
					echo "No results";
				}
		}

		else if(isset($_POST['register'])){		//go to register.php
			header("Location: register.php");
		}
		
		else if(isset($_POST['signin'])){
			$id = $_POST['id'];
			$sql = "select * from contact where id = '$id'";		
			$result = mysqli_query($conn, $sql);		//send SQL statement to database
			$resultcheck = mysqli_num_rows($result);	//check if there is a result
			if($resultcheck > 0){
				while($row = mysqli_fetch_assoc($result)){
					
					
					$date = date("d-m-y, h:i:sa");
				
					$reg = "update contact set date='$date' where id='$id';";
					mysqli_query($conn, $reg);
					echo $row['id'], ", logged in at ", $date;
				}
			}
			else if($resultcheck == 0){			//if no contact in database display no result
				echo "ID number not registered";
			}
		}
		
	?>

	
</body>
</html>