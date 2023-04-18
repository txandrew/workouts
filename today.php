<!DOCTYPE html>
<html>
<head>
    <title>Exercise Routines Filter</title>
</head>
<body>
    <form method="get" action="getRandWorkout.php">
        <?php

      
            function populateDropdown($dropdownId, $columnName) {
              $servername = "localhost";
              $username = "username";
              $password = "password";
              $dbname = "myDB";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);

              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              // Query distinct values in column
              $sql = "SELECT DISTINCT $columnName FROM TBL_WORKOUTS";
              $result = $conn->query($sql);

              // Populate dropdown box
              echo "<select id='$dropdownId' name='$columnName'>";
              echo "<option value=''>All</option>";
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row[$columnName] . "'>" . $row[$columnName] . "</option>";
              }
              echo "</select>";

              // Close connection
              $conn->close();
            }
      
            // Include the populateDropdown function
            include 'functions.php';

            // Connect to the MySQL server
            $servername = "localhost";
            $username = "myUsername";
            $password = "myPassword";
            $dbname = "myDatabase";
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Define the column names to use for the dropdown filters
            $dropdownCols = array(
                "WO_MUSCLE_GP",
                "WO_MUSCLE_SGP",
                "WO_LEVEL",
                "WO_ULC",
                "WO_PUSH_PULL",
                "WO_MODALITY",
                "WO_JOIN",
                "WO_EQUIPMENT"
            );

            // Loop through each column and create a dropdown filter
            foreach ($dropdownCols as $col) {
                echo '<label for="' . $col . '">' . $col . ': </label>';
                echo '<select id="' . $col . '" name="' . $col . '">';
                populateDropdown($conn, "TBL_WORKOUTS", $col);
                echo '</select><br><br>';
            }
        ?>
        <input type="submit" value="Run">
    </form>
</body>
</html>

