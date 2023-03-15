<?php
include "db_conn.php";
$emptyfield= "A field was left empty, please fill it up";

if(isset($_POST['submit'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(empty(trim($username))| empty(trim($lastName)) | empty(trim($firstName)) | empty(trim($password)) | empty(trim($email))){
        echo $emptyfield;
    }else{
        $sql = "INSERT INTO `tbl_accounts`(`id`, `userName`, `password`, `lastName`, `firstName`, `email`) VALUES (null,'$username','$password','$lastName','$firstName','$email')";
        $result = mysqli_query($conn, $sql);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" >
    <title>Document</title>
</head>
<body>
        <div class="regcontainer">
            <div class="registration_title">
                    <h1>REGISTRATION</h1>
            </div>
            <form action="" method="post">
                <input type="text"  class="form-control" name="first_name" placeholder="First Name">
                <input type="text"  class="form-control" name="last_name" placeholder="Last Name">
                <br><br>
                <input type="text"  class="form-control" name="email" placeholder="Email">
                <br><br>
                <input type="text"  class="form-control" name="username" placeholder="Username">
                <input type="password"  class="form-control" name="password" placeholder="Password">
                <br><br><br>
                <button type="submit" class="btn" name="submit">Register</button>
                <a href="index.php">login</a>
            </form>
        </div>
</body>
</html>