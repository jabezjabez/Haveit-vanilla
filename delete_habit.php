<?php 
require_once('db_conn.php');

$habit_id = $_POST['id'];

// if(!isset($_GET['id'])){
//     echo "<script> alert('Undefined Schedule ID.'); location.replace('./habits.php') </script>";
//     $conn->close();
//     exit;
// }

$delete = $conn->query("DELETE FROM `habits` where id = '$habit_id'");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); location.replace('./habits.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>