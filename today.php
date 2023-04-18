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
