<?php
// Define database connection parameters
$serverName = "your_server_name";
$connectionOptions = array(
    "Database" => "your_database_name",
    "Uid" => "your_username",
    "PWD" => "your_password"
);

// Connect to MSSQL database
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}

// Define filters based on GET parameters
$filters = array();
if (isset($_GET['WO_MUSCLE_GP'])) {
    $filters[] = "WO_MUSCLE_GP = '".$_GET['WO_MUSCLE_GP']."'";
}
if (isset($_GET['WO_MUSCLE_SGP'])) {
    $filters[] = "WO_MUSCLE_SGP = '".$_GET['WO_MUSCLE_SGP']."'";
}
if (isset($_GET['WO_LEVEL'])) {
    $filters[] = "WO_LEVEL = '".$_GET['WO_LEVEL']."'";
}
if (isset($_GET['WO_ULC'])) {
    $filters[] = "WO_ULC = '".$_GET['WO_ULC']."'";
}
if (isset($_GET['WO_PUSH_PULL'])) {
    $filters[] = "WO_PUSH_PULL = '".$_GET['WO_PUSH_PULL']."'";
}
if (isset($_GET['WO_MODALITY'])) {
    $filters[] = "WO_MODALITY = '".$_GET['WO_MODALITY']."'";
}
if (isset($_GET['WO_JOIN'])) {
    $filters[] = "WO_JOIN = '".$_GET['WO_JOIN']."'";
}
if (isset($_GET['WO_EQUIPMENT'])) {
    $filters[] = "WO_EQUIPMENT = '".$_GET['WO_EQUIPMENT']."'";
}

// Build SQL query
$sql = "SELECT TOP 6 * FROM TBL_WORKOUTS";
if (!empty($filters)) {
    $sql .= " WHERE ".implode(" AND ", $filters);
}
$sql .= " ORDER BY NEWID()";

// Execute SQL query
$stmt = sqlsrv_query($conn, $sql);
if (!$stmt) {
    die("Query failed: " . sqlsrv_errors());
}

// Fetch results and store in array
$results = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $results[] = $row;
}

// Close database connection
sqlsrv_close($conn);

// Return results as JSON
header('Content-Type: application/json');
echo json_encode($results);
?>
