<?php
require_once('db_conn.php');
session_start();

if (isset($_POST['journal_id'], $_POST['progress'])) {
    $journal_id = $_POST['journal_id'];
    $progress = $_POST['progress'];
    $aDate = $_POST['aDate'];

    $sql = "UPDATE `events` SET `progress`='$progress', `date_update`='$aDate' WHERE `id`='$journal_id'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Progress updated successfully";
    } else {
        echo "Error updating progress: ".$conn->error;
    }
} else {
    echo "Missing data";
}

$conn->close();
?>
