<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "haveit_vanilla";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("connection failed" . mysqli_connect_error());
    }
    // echo "connection succesful"
?>