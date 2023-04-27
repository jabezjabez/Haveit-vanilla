<?php
session_start();

include 'db_conn.php';
$author_id = $_SESSION['user_id'];

$curdate = $_POST['curdate'];

$title = $_POST['title'];
$content = $_POST['content'];

$stmt = $conn->prepare("INSERT INTO tbl_articles (title, description, date, author_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $title, $content, $curdate, $author_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Record created successfully";
} else {
    echo "Error creating record: " . $conn->error;
}

$stmt->close();
$conn->close();

?>
