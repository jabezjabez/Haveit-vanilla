<?php
include "db_conn.php";

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['first_name'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `tbl_accounts`(`id`, `userName`, `password`, `last_name`, `first_name`, `email`) VALUES (null,'$username','$password','$last_name','$first_name','$email')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("location: index.php?msg=New record created successfully");
    }else
    {
        echo "failed" . mysqli_error($conn);
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
            </form>
        </div>
</body>
</html>