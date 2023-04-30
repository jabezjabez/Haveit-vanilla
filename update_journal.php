<?php
require_once('db_conn.php');
session_start();

if(isset($_POST['update_article'])){

    $article_id = $_POST['journal_id'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $author_id = $_SESSION['id'];

    if(empty($content)){
        $conn->close();
        exit;
    }

    $stmt = $conn->prepare("UPDATE tbl_articles SET title=?, description=?, date=? WHERE id=? AND author_id=?");
    $stmt->bind_param("ssssi", $title, $content, $date, $article_id, $author_id);
    $update = $stmt->execute();

    if($update){
        echo "<script> alert('Journal Successfully Updated.')"; 
        // location.replace('./journal.php') </script>";
    }else{
        echo "<pre>";
        echo "An Error occurred.<br>";
        echo "Error: ".$stmt->error."<br>";
        echo "SQL: ".$stmt->sqlstate."<br>";
        echo "</pre>";
    }
    $stmt->close();
    $conn->close();


    echo "SQL query: $sql";

    echo "Session ID: " . $_SESSION['id'];

echo "Journal ID: " . $_POST['journal_id'] . "<br>";
echo "Title: " . $_POST['title'] . "<br>";
echo "Content: " . $_POST['content'] . "<br>";
echo "Date: " . $_POST['date'] . "<br>";

}
?>
