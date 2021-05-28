<!DOCTYPE html>
<html>
<head>
	<title>Address Book | Admin</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>
	<div class="header">
		<h1>Contact Tracer</h1>	
		<ul id="navlist">
            <li id="navlist-item">Administrator Log-in</li>
        </ul>
    </div>

	<div class="content">
		<h2>Admin Login</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Username: <input type="text" name="user" required><br><br>	
			Password: <input type="password" name="pass" required><br><br>
			<input type="submit" name="loginButton" value="Sign in"><br><br>
		</form>
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<input type="submit" name="back" value="Go Back">
		</form>	

		<?php
			if(isset($_POST['loginButton'])){		//display all
				if($_POST['user'] == "admin" && $_POST['pass'] == "admin"){
					header("Location: admin.php");
				}else{
					echo "<p>Wrong Credentials!</p>";
				}
			}
			
            else if(isset($_POST['back'])){
                header("Location: index.php");
            }
		?>

	</div>
</body>
</html>