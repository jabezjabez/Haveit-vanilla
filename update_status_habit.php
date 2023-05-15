<?php
require_once('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the habit ID from the form submission
    $habitId = $_POST['id'];

    // Perform necessary validations and checks on the habit ID


    // Update the status column to 1 for the specified habit ID
    $sql = "UPDATE habits SET status = 1 WHERE id = $habitId";
    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Status updated successfully.'); 
        location.replace('./habits.php') </script>";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

?>