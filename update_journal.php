<?php
require_once('db_conn.php');
session_start();
$content = $_POST['content'];
$date = $_POST['date'];
$title = $_POST['title'];
$journal_id = $_POST['journal_id'];
$author_id = $_SESSION['id'];


// var_dump($_POST['content']);
// var_dump($_POST['date']);
// var_dump($_POST['title']);
// var_dump($_POST['journal_id']);
// var_dump($conn);

// if(empty($content) || empty($date) || empty($title)){
//     echo "putanigana";
//     $conn->close();
//     exit;
// }


if (isset($_POST['content'], $_POST['date'], $_POST['title'], $_POST['journal_id'])) {



    $sql = "SELECT * FROM `tbl_articles` WHERE `description` = '$content' AND `id` <> '$article_id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      echo "<script> alert('An article with the same content already exists.'); location.replace('./edit_journal.php?id=$article_id') </script>";
      $conn->close();
      exit;
    }
    
    $sql = "UPDATE `tbl_articles` SET `title`='$title', `description`='$content', `date`='$date' WHERE `id`='$article_id' AND `author_id`='$author_id'";
    
    $save = $conn->query($sql);
    if($save){
        echo "<script> alert('Article Successfully Updated.'); location.replace('./journal.php') </script>";
    }else{
        echo "<pre>";
        echo "An Error occurred.<br>";
        echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    $conn->close();
} else {
    // Handle the case where the content element doesn't exist
    echo "putangiana!!";
}

?>






