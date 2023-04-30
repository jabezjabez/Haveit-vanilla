<?php
include_once("db_conn.php");

// Get the habit ID from the query string
$habitId = $_GET['id'];

// Fetch the habit data from the database
$sql = "SELECT * FROM habits WHERE id = $habitId";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
  die('Error: ' . mysqli_error($conn));
}

// Extract the habit data from the result set
$habit = mysqli_fetch_assoc($result);

// Return the habit data as a JSON object
header('Content-Type: application/json');
echo json_encode($habit);
?>
