<?php 
session_start();
require_once('db_conn.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);
$author_id = $_SESSION['id'];

if(empty($id)){
    $sql = "INSERT INTO `events` (`title`,`description`,`start_datetime`,`end_datetime`, `progress`, `author_id`) VALUES ('$title','$description','$start_datetime','$end_datetime', 0, '$author_id')";
}else{
    $sql = "UPDATE `events` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}', `progress` = 0 where `id` = '{$id}'";
}


$save = $conn->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./calendar.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>