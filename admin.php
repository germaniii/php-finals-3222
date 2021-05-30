<!DOCTYPE html>
<html>
<head>
	<title>Address Book | Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="header">
		<h1>Contact Tracer</h1>	
		<ul id="navlist">
            <li id="navlist-item">Administrator Mode</li>
        </ul>
    </div>
	<?php
		if(isset($_POST['back'])){
			header("Location:index.php");
		}
	?>
	<div class="content-search">
        <div class="searchtable">
            <div class="searchtable-row">
                <div class="left">
                    <h2>Search City</h2>
                    <form method="post">
						<select name = "search_city" required>
							<option value="" hidden disabled selected>Choose City</option>
							<?php 
								include_once 'db.inc.php';
								$query = "SELECT * FROM city";		//sql statement to look for contacts with inputted brgy
								$result_city = mysqli_query($conn, $query);
								while($row1 = mysqli_fetch_array($result_city))
								echo "<option>", $row1[1], "</option>";
							?> 
						</select>
                        <input type="submit" name="search_city_button" value="Search City"><br>
                    </form>
                    <h2>Search Barangay</h2>
                    <form method="post">
						<select name = "search_brgy" required>
							<option value="" hidden disabled selected>Choose Baranggay</option>
							<?php 
								include_once 'db.inc.php';
								$query = "SELECT * FROM barangay";		//sql statement to look for contacts with inputted brgy
								$result_brgy = mysqli_query($conn, $query);
								while($row1 = mysqli_fetch_array($result_brgy))
								echo "<option>", $row1[1], "</option>";
							?> 
						</select>
						<input type="submit" name="search_brgy_button" value="Search Brgy"><br>
                    </form>
                    <h2>Search Province</h2>
						<form method="post">
							<select name = "search_prov" required>
								<option value="" hidden disabled selected>Choose Province</option>
								<option>Cebu</option>
								<option>Other</option>
							</select>
							<input type="submit" name="search_prov_button" value="Search Province"><br>
                    	</form>
                    <h2>Search ID Number</h2>
                    <form method="post">
                        <input type="tel" pattern="[0-9]{8}" placeholder="16101002" name="search_id" required>	
                        <input type="submit" name="search_id_button" value="Search ID Number"><br>
                    </form>
                </div>

                <div class="right">
                    <h2>Search Name</h2>
                    <form method="post">
                        <input type="text" placeholder="Surname" name="search_name" required>	
                        <input type="submit" name="search_name_button" value="Search Name"><br>
                    </form>
                    <h2>Search Date</h2>
                    <form method="post">
                        <input type="date" name="search_time" required>
                        <input type="submit" name="search_time_button" value="Search Time and Day"><br>
                    </form>

                    <h2>Display Log Book</h2>
                    <form method="post">
                        <input class="button" type="submit" name="dispall" value="Display All"><br><br>
                    </form>

                    <form method="post">	
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
			
		if(isset($_POST['dispall'])){		//display all
			$sql = "SELECT * from contact";		//SQL statement
			$result = mysqli_query($conn, $sql);		//send SQL statement to database
			writeMsg($result);			//function to check for results then display results
            	}

            	else if(isset($_POST['search_city_button'])){
					// city to search
					$city = $_POST['search_city'];
	
					// mysql search query
					$query = "SELECT * FROM contact WHERE caddress = '$city'";		//sql statement to look for contacts with inputted city
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);

            	}else if(isset($_POST['search_brgy_button'])){
                	// brgy to search
					$brgy = $_POST['search_brgy'];
					
					// mysql search query
					$query = "SELECT * FROM contact WHERE baddress = '$brgy'";		//sql statement to look for contacts with inputted brgy
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);
            	}else if(isset($_POST['search_prov_button'])){
                	// province to search
					$prov = $_POST['search_prov'];
	
					// mysql search query
					$query = "SELECT * FROM contact WHERE paddress = '$prov'";		//sql statement to look for contacts with inputted province
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);

            	}else if(isset($_POST['search_id_button'])){
                	// id to search
					$id = $_POST['search_id'];
	
					// mysql search query
					$query = "SELECT * FROM contact WHERE id = $id LIMIT 1";		//sql statement to look for contacts with inputted id 
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);							//Limit 1 because id is unique

            	}else if(isset($_POST['search_name_button'])){
                	// name to search
					$name = $_POST['search_name'];
	
					// mysql search query
					$query = "SELECT * FROM contact WHERE lname = '$name'";			//sql statement to look for contacts with inputted lastname
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);		
            	}else if(isset($_POST['search_time_button'])){					//work in progress sksksks
                	$date = $_POST['search_time'];

			// mysql search query
			$query = "SELECT * FROM contact WHERE date = '$date'";			//sql statement to look for contacts with inputted date
					$result = mysqli_query($conn, $query);		//send SQL statement to database
					writeMsg($result);
            	}
//-------------------------------  FUNCTION  ------------------------------------------//
	function writeMsg($result) {			//function to check for results then display results
 	$resultcheck = mysqli_num_rows($result);	//check if there is a result
		if($resultcheck > 0){
                echo "<table class=\"table-log\">";
                echo "<tr>
                                <th>ID
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Baranggay</th>
                                <th>City</th>
                                <th>Province</th>
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
		if($resultcheck == 0 || $resultcheck == FALSE){			//if no contact in database display no result
			echo "No results";
		}
	}
//-------------------------------  FUNCTION  ------------------------------------------//	
	?>
	</div>

	
</body>
</html>
