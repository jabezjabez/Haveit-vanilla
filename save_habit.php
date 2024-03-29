<?php
session_start();

// Connect to the database
require_once('db_conn.php');

// Get form data
$habit_title = $_POST['habit'];
$repetitions = $_POST['reps'];
$frequency = $_POST['timeframe'];
$author_id = $_POST['author_id'];
$id = $_POST['id']; // The ID of the habit to update, if applicable

// Insert or update habit in database, depending on whether an ID is provided
if(empty($id)){
  $sql = "INSERT INTO habits (text, reps, totalCounts, timeframe, completed, author_id) VALUES ('$habit_title', '$repetitions', 0, '$frequency', 0,  '$author_id')";
} else {
  $sql = "UPDATE habits SET text='$habit_title', reps='$repetitions', timeframe='$frequency', author_id='$author_id' WHERE id=$id";
}

if (mysqli_query($conn, $sql)) {
  if(empty($id)){
    $new_id = mysqli_insert_id($conn);
    $success_message = "New habit added successfully with ID: " . $new_id;
  } else {
    $success_message = "Habit updated successfully.";
  }
} else {
  $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Redirect the user back to the homepage or some other appropriate page
header('Location: habits.php');
exit();
?>
