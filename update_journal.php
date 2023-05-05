<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once('db_conn.php');
session_start();

try {
    if(!isset($_POST['content'], $_POST['date'], $_POST['title'], $_POST['journal_id']) 
        || empty($_POST['content']) || empty($_POST['date']) || empty($_POST['title']) || empty($_POST['journal_id'])) {
        throw new Exception('Missing data');
    }
    
    $content = $_POST['content'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $journal_id = $_POST['journal_id'];

    // Get the existing article
    $sql = "SELECT * FROM `tbl_articles` WHERE `id` = '$journal_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Check if the content or title has changed
    if ($content == $row['description'] && $title == $row['title']) {
        echo "<script>alert('No changes detected.')</script>";
    } else {
        // Perform the update
        $sql = "UPDATE `tbl_articles` SET `title`='$title', `description`='$content', `date`='$date' WHERE `id`='$journal_id'";
        $save = $conn->query($sql);
        if ($save) {
            echo "<script>alert('Article updated.'); window.location.href='journal.php?id=$journal_id';</script>";
        } else {
            echo "<script>alert('Error occurred while updating.')</script>";
        }
    }


    $sql = "SELECT * FROM `tbl_articles` WHERE `description` = '$content' AND `id` = '$journal_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script> alert('An article with the same content already exists.'); location.replace('./edit_journal.php?id=$journal_id') </script>";
        $conn->close();
        exit;
    }

    $sql = "UPDATE `tbl_articles` SET `title`='$title', `description`='$content', `date`='$date' WHERE `id`='$journal_id'";
    $save = $conn->query($sql);

    if($save){
        // Do something if save is successful
    } else {
        echo "<pre>";
        echo "An Error occurred.<br>";
        echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    $conn->close();

} catch (Exception $e) {
    echo "<script>alert('Unexpected updated successfully.'); window.location.replace('./journal.php');</script>";

}
?>
