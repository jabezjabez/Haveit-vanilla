<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>USERNAME</label>
        <input type="text" name="username" placeholder="username">
        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="password">
        <button type="submit">Log in</button>
        <a href="registration.php">REGISTER</a>
    </form>
</body>
</html>