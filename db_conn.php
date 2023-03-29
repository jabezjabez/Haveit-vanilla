<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "haveit_vanilla";
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!$conn){
        die("connection failed" . mysqli_connect_error());
    }
    // echo "connection succesful"
?>