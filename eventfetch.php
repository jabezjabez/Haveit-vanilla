<?php
include("db_conn.php");

$where_sql ='';
if(!empty($_GET('start')) && !empty($_GET['end'])) 
    $where_sql =" WHERE start between "
?>