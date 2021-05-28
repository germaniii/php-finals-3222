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
            <li id="navlist-item">Administrator Mode</li>
        </ul>
    </div>

	<div class="content-search">
        <div class="searchtable">
            <div class="searchtable-row">
                <div class="left">
                    <h2>Search City</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="text" placeholder="Lucena City" name="search_city" required>	
                        <input type="submit" name="search_city_button" value="Search City"><br>
                    </form>
                    <h2>Search Barangay</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="text" placeholder="San Isidro" name="search_brgy" required>	
                        <input type="submit" name="search_brgy_button" value="Search Brgy"><br>
                    </form>
                    <h2>Search Province</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="text" placeholder="Cebu" name="search_prov" required>
                        <input type="submit" name="search_prov_button" value="Search Province"><br>
                    </form>
                    <h2>Search ID Number</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="tel" pattern="[0-9]{8}" placeholder="16101002" name="search_id" required>	
                        <input type="submit" name="search_id_button" value="Search ID Number"><br>
                    </form>
                </div>
                <div class="right">
                    <h2>Search Name</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="text" placeholder="Juan Dela Cruz" name="search_name" required>	
                        <input type="submit" name="search_name_button" value="Search Name"><br>
                    </form>
                    <h2>Search Time and Day</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="datetime-local" name="search_time" required>
                        <input type="submit" name="search_time_button" value="Search Time and Day"><br>
                    </form>

                    <h2>Display Log Book</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input class="button" type="submit" name="dispall" value="Display All"><br><br>
                    </form>

                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
                        <input type="submit" name="back" value="Sign Out"><br><br>
                    </form>	
                </div>
            </div>
        </div>
	</div>

	<div class="content-log">
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
                        echo "<table class=\"table-log\">";
                        echo "<tr>
                                <th>ID
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Baranggay</th>
                                <th>City</th>
                                <th>Provine</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Sign-In</th>
                                <th>Sign-Out</th>";
						while($row = mysqli_fetch_assoc($result)){
							echo "<tr>";
							echo "<td>", $row['id'], "</td>";
							echo "<td>", $row['fname'], "</td>";
							echo "<td>", $row['lname'], "</td>";
							echo "<td>", $row['baddress'], "</td>";
							echo "<td>", $row['caddress'], "</td>";
							echo "<td>", $row['paddress'], "</td>";
							echo "<td>", $row['number'], "</td>";
							echo "<td>", $row['email'], "</td>";
							echo "<td>", $row['datein'], "</td>";	
							echo "<td>", $row['dateout'], "</td>";	
                            echo "</tr>";
						}
                        echo "</table>";
					}
					else if($resultcheck == 0 || $resultcheck == FALSE){			//if no contact in database display no result
						echo "No results";
					}
            }

            else if(isset($_POST['search_city_button'])){

            }else if(isset($_POST['search_brgy_button'])){
                
            }else if(isset($_POST['search_prov_button'])){
                
            }else if(isset($_POST['search_id_button'])){
                
            }else if(isset($_POST['search_name_button'])){
                
            }else if(isset($_POST['search_time_button'])){
                
            }

            else if(isset($_POST['back'])){
                header("Location: index.php");
            }
			
		?>

	</div>

	
</body>
</html>