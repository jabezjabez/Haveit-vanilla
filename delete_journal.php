<?php 
require_once('db_conn.php');

$journal_id = $_POST['journal_id'];

$delete = $conn->query("DELETE FROM `tbl_articles` WHERE `id`='$journal_id'");
if($delete){
    echo "<script> alert('Journal has been deleted successfully.'); location.replace('./journal.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>
