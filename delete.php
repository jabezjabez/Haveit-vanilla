<?php
// Start the session
session_start();

// Include the database connection file
require_once "db_conn.php";

// Get the user ID from the session
$id = $_SESSION["id"];

// Delete the user's account from the database
$sql = "DELETE FROM tbl_accounts WHERE id = ?";
if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            // Account deleted successfully, destroy the session and redirect to the login page
            session_destroy();
            header("location: logout.php");
            exit;
        } else {
            // Error deleting account
            echo "Error deleting account";
        }


}

// Close the statement and the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
