<!DOCTYPE html>
<html>
<head>
	<title>Address Book | Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>
	<div class="header">
		<h1>Contact Tracer</h1>	
		<ul id="navlist">
            <li id="navlist-item">Home</li>
        </ul>
    </div>

	<div class="content">
		<h2>Sign In/Out</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			ID Number: <input type="tel" pattern="[0-9]{8}" placeholder="16101002"name="id" required><br><br>	
			<input type="submit" name="signin" value="Sign-In">
		</form>
		<h2>Register</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input class="button" type="submit" name="register" value="Register Now">
		</form>
		<h2>Administrator Login</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input class="button" type="submit" name="adlogin" value="Admin Login">
		</form>
	</div>

	<div class="content">
		<h2>Log Book</h2>
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
						echo $row['id'], ", signed in at ", $date;
					}
				}
				else if($resultcheck == 0){			//if no contact in database display no result
					echo "ID number not registered";
				}
			}

			else if(isset($_POST['adlogin'])){		//go to register.php
				header("Location: admin-login.php");
			}
			
		?>

	</div>

	
</body>
</html>