<?php
session_start();
include("db_conn.php");

$_SESSION['user_id'] = $user_id;

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
    }else{
        $sql = "SELECT * FROM tbl_accounts WHERE userName = '$username' AND password = '$password'";

        $loginresult = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($loginresult) ===1){
                $row = mysqli_fetch_assoc($loginresult);
                if($row['userName'] === $username && $row['password'] === $password ){
                        $_SESSION['userName'] = $row['userName'];
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['id'] = $row['id'];
                        header("location: home.php");
                }else{
                    header("location: index.php?error=incorrect username or password");
                    exit();
                }
                
            }else{
            header("location: index.php?error=incorrect username or password");
            exit();
            }
    }   
}else
    {
        header("location: index.php");
        exit();
    }

    // create the SQL query
    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";

    // execute the SQL query
    $result = mysqli_query($conn, $sql);

    // check if there is a row returned
    if (mysqli_num_rows($result) > 0) {
        // get the user ID
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];

        // store the user ID in the session
        $_SESSION['user_id'] = $user_id;

        // redirect the user to the home page
        header("Location: home.php");
        exit();
    }
?>