<?php

if (isset($_POST['username']) && isset($_POST['username'])) {
    
    function val($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        
    }
    $username = val($_POST['username']);
    $password = val($_POST['password']);

    if (empty($username)) {
        header("location: index.php?error=username is required");
        exit();
    }elseif (empty($password)) {
        header("location: index.php?error=password is required");
        exit();
    }
}

?>