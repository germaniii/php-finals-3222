<!FELISARTA, German III E  16101002 CpE 3222>
<html>
<head>
    <title> 7-3 Address Book</title>
    <meta name = "keywords" content = "German, Felisarta, PHP, Practice"> 
    <meta name = "description" content = "This webpage is a practice page for PHP functions">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php
        // Instantiate Variables
        session_start();
        if(empty($_SESSION['fName_arr']) && empty($_SESSION['lName_arr']) && empty($_SESSION['contact_arr'])
                                            && empty($_SESSION['brgy_arr']) && empty($_SESSION['city_arr'])){

            $_SESSION['fName_arr'] = array();       // FirstName Array
            $_SESSION['lName_arr'] = array();       // LastName Array
            $_SESSION['contact_arr'] = array();     // Contact Num Array
            $_SESSION['brgy_arr'] = array();        // Brgy Array
            $_SESSION['city_arr'] = array();        // City Array

        }


        if(isset($_POST['submit_form'])){
            //Appending to Session (main) array
            array_push($_SESSION['fName_arr'], strtolower($_POST['fName']));
            array_push($_SESSION['lName_arr'], strtolower($_POST['lName']));
            array_push($_SESSION['contact_arr'], strtolower($_POST['contact']));
            array_push($_SESSION['brgy_arr'], strtolower($_POST['brgy']));
            array_push($_SESSION['city_arr'], strtolower($_POST['city']));
        } 
    ?>
    <h1>7-3 Address Book</h1>
    <h2>German E Felisarta III | 16101002 | CpE 3222</h2>
    <hr>
    <h2>Add Entry</h2>
    <form method="POST">
        <label for="fName">First Name:</label>
        <input type="text" placeholder="Juan" name="fName" id="fName" required><br><br>
        <label for="lName">Last Name:</label>
        <input type="text" placeholder="Cruz"name="lName" id="lName" required><br><br>
        <label for="contact">Contact No.: +63</label>
        <input type="tel" placeholder="9xxxxxxxxx"name="contact" id="contact" pattern="9[0-9]{2}[0-9]{3}[0-9]{4}" required><br><br>
        <label for="brgy">Baranggay:</label>
        <input type="text" placeholder="Guadalupe"name="brgy" id="brgy" required><br><br>
        <label for="n">City:</label>
        <input type="text" placeholder="Cebu"name="city" id="city" required><br><br>
        <input type="submit" name="submit_form" value="Submit">
    </form>
    <hr>
    <h2>Search Entry</h2>
    <form method="POST">
        <input type="text" placeholder="Juan" name="fName_search" id="fName_search">
        <input type="submit" name="fName_button" value="Search First Name"><br><br>
        <input type="text" placeholder="Cruz" name="lName_search" id="lName_search">
        <input type="submit" name="lName_button" value="Search Last Name"><br><br>
        <input type="text" placeholder="Guadalupe"name="brgy_search" id="brgy_search">
        <input type="submit" name="brgy_button" value="Search Baranggay"><br><br>
        <input type="text" placeholder="Cebu"name="city_search" id="city_search">
        <input type="submit" name="city_button" value="Search City"><br><br>
    </form>
    <?php
        // this php is for search feature
        $search_index = array();
        $temp_fName_array = $_SESSION['fName_arr'];
        $temp_lName_array = $_SESSION['lName_arr'];
        $temp_contact_array = $_SESSION['contact_arr'];
        $temp_brgy_array = $_SESSION['brgy_arr'];
        $temp_city_array = $_SESSION['city_arr'];

        if(isset($_POST['fName_button'])){                      // Search First Name
            $search_index = array_keys($_SESSION['fName_arr'], strtolower($_POST['fName_search']));
            if(!empty($search_index))
                echo "<h3>Search Results for " . $_POST['fName_search']. ":</h3>";
            else
                echo "<h3>No Results Found!</h3>";
            
        }elseif(isset($_POST['lName_button'])){                 // Search Last Name
            $search_index = array_keys($_SESSION['lName_arr'], strtolower($_POST['lName_search']));
            if(!empty($search_index))
                echo "<h3>Search Results for " . $_POST['lName_search']. ":</h3>";
            else
                echo "<h3>No Results Found!</h3>";
            

        }elseif(isset($_POST['brgy_button'])){                  // Search Baranggay
            $search_index = array_keys($_SESSION['brgy_arr'], strtolower($_POST['brgy_search']));
            if(!empty($search_index))
                echo "<h3>Search Results for " . $_POST['brgy_search']. ":</h3>";
            else
                echo "<h3>No Results Found!</h3>";

        }elseif(isset($_POST['city_button'])){                  // Search City
            $search_index = array_keys($_SESSION['city_arr'], strtolower($_POST['city_search']));
            if(!empty($search_index))
                echo "<h3>Search Results for " . $_POST['city_search']. ":</h3>";
            else
                echo "<h3>No Results Found!</h3>";

        }

        $counter = 1;
        foreach($search_index as $index){
            echo "[" . $counter . "] "; 
            echo $temp_lName_array[$index] . ", " . $temp_fName_array[$index] . " | ";
            echo "0" . $temp_contact_array[$index] . " | " . $temp_brgy_array[$index] . ", " . $temp_city_array[$index];
            echo "<br>";
            $counter++;
        }

    
    ?>
    <hr>
    <h2>Delete Entry</h2>
    <form method="POST">
        <select name="delete_set">
            <option>Select one person to delete</option>
            <?php
            //print values of arrays into dropdown list
            // Iterating through the array
            for($i = 0; $i < count($_SESSION['fName_arr']); $i++){
                echo "<option value='$i'> [" . $i+1 . "] " . $temp_lName_array[$i] . ", " . $temp_fName_array[$i] . " </option>";
            }            
            ?>
        </select>
        <input type="submit" name="delete_button" value="Confirm and Delete Entry">
    </form>
    <?php
        if(isset($_POST['delete_button'])){
            // Set temp array for this instance
            $temp_fName_array = $_SESSION['fName_arr'];
            $temp_lName_array = $_SESSION['lName_arr'];
            $temp_contact_array = $_SESSION['contact_arr'];
            $temp_brgy_array = $_SESSION['brgy_arr'];
            $temp_city_array = $_SESSION['city_arr'];
            $selected = $_POST['delete_set'];

            
            echo "Deleted: " . $temp_lName_array[$selected] . ", " . $temp_fName_array[$selected];
            unset($temp_fName_array[$selected]); 
            unset($temp_lName_array[$selected]); 
            unset($temp_contact_array[$selected]); 
            unset($temp_brgy_array[$selected]); 
            unset($temp_city_array[$selected]); 

            //arrange array
            $temp_fName_array = array_values($temp_fName_array);
            $temp_lName_array = array_values($temp_lName_array);
            $temp_contact_array = array_values($temp_contact_array);
            $temp_brgy_array = array_values($temp_brgy_array);
            $temp_city_array = array_values($temp_city_array);

            // Reassign array
            $_SESSION['fName_arr'] = $temp_fName_array;
            $_SESSION['lName_arr'] = $temp_lName_array;
            $_SESSION['contact_arr'] = $temp_contact_array;
            $_SESSION['brgy_arr'] = $temp_brgy_array;
            $_SESSION['city_arr'] = $temp_city_array;
        }
    ?>
    <hr>
    <h2>Edit Entry</h2>
    <form method="POST">
        <select name="edit_set">
            <option>Select one person to edit</option>
            <?php
            //print values of arrays into dropdown list
            // Iterating through the array
            for($i = 0; $i < count($_SESSION['fName_arr']); $i++){
                echo "<option value='$i'> [" . $i+1 . "] " . $temp_lName_array[$i] . ", " . $temp_fName_array[$i] . " </option>";
            }            
            ?>
        </select><br><br>
        <label for="fName_edit">First Name:</label>
        <input type="text" placeholder="Juan" name="fName_edit" id="fName_edit" required><br><br>
        <label for="lName_edit">Last Name:</label>
        <input type="text" placeholder="Cruz"name="lName_edit" id="lName_edit" required><br><br>
        <label for="contact_edit">Contact No.: +63</label>
        <input type="tel" placeholder="9xxxxxxxxx"name="contact_edit" id="contact_edit" pattern="9[0-9]{2}[0-9]{3}[0-9]{4}" required><br><br>
        <label for="brgy_edit">Baranggay:</label>
        <input type="text" placeholder="Guadalupe"name="brgy_edit" id="brgy_edit" required><br><br>
        <label for="city_edit">City:</label>
        <input type="text" placeholder="Cebu"name="city_edit" id="city_edit" required><br><br>
        <input type="submit" name="edit_button" value="Confirm and Edit Entry">
    </form>
    <?php
        
        if(isset($_POST['edit_button'])) {

            $temp_fName_array = $_SESSION['fName_arr'];
            $temp_lName_array = $_SESSION['lName_arr'];
            $temp_contact_array = $_SESSION['contact_arr'];
            $temp_brgy_array = $_SESSION['brgy_arr'];
            $temp_city_array = $_SESSION['city_arr'];
            $selected = $_POST['edit_set'];

            echo "Replaced "; 
            echo $temp_lName_array[$selected] . ", " . $temp_fName_array[$selected] . " | ";
            echo "0" . $temp_contact_array[$selected] . " | " . $temp_brgy_array[$selected] . ", " . $temp_city_array[$selected];
            echo "<br> with ";

            $temp_fName_array[$selected] = strtolower($_POST['fName_edit']);
            $temp_lName_array[$selected] = strtolower($_POST['lName_edit']);
            $temp_contact_array[$selected] = strtolower($_POST['contact_edit']);
            $temp_brgy_array[$selected] = strtolower($_POST['brgy_edit']);
            $temp_city_array[$selected] = strtolower($_POST['city_edit']);

            // Reassign array
            $_SESSION['fName_arr'] = $temp_fName_array;
            $_SESSION['lName_arr'] = $temp_lName_array;
            $_SESSION['contact_arr'] = $temp_contact_array;
            $_SESSION['brgy_arr'] = $temp_brgy_array;
            $_SESSION['city_arr'] = $temp_city_array;

            echo $temp_lName_array[$selected] . ", " . $temp_fName_array[$selected] . " | ";
            echo "0" . $temp_contact_array[$selected] . " | " . $temp_brgy_array[$selected] . ", " . $temp_city_array[$selected];
        }

    ?>
    
    <br><br>
    <form method="POST">
        <input type="submit" name="clear_arr" value="Reset Address Book">
    </form>
    <br><br>
    <h2> Address Book List </h2>
    <p>For Display and Debugging Purposes</p>
    <?php
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
    ?>
    <?php
        // Destroy Instances
        if(isset($_POST['clear_arr'])){
            session_destroy();
        }
    ?>
</body>
</html>