<?php
require_once('db_conn.php');
session_start();
$content = $_POST['content'];
$date = $_POST['date'];
$title = $_POST['title'];
$author_id = $_SESSION['id'];

if(empty($content)){
    $conn->close();
    exit;
}

$sql = "SELECT * FROM `tbl_articles` WHERE `description` = '$content'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<script> alert('Schedule already exists.'); location.replace('./write_journal.php') </script>";
  $conn->close();
  exit;
}

$sql = "INSERT INTO `tbl_articles` (`title`, `description`, `date`, `author_id`) VALUES ('$title', '$content', '$date', '$author_id')";


$save = $conn->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./journal.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>
