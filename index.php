<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HAVE IT - LOG IN</title>
	<link rel="stylesheet" type="text/css" href="log.css">
	<link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
</head>

<body>
	<div class="logIn-container">
        <div class="graphics">
            <div class="logo">
				<img src="CSS/Images/Have-It-Logo-White.png" >
			</div>
        	<div class="subtext">HAVE IT YOUR WAY!</div>
            <div class="subtext2">Habits and Goals Tracker with Journal</div>
        </div>

        <div class="forms">
			<h1>WELCOME BACK TO<br/>HAVE IT!</h1>
			<h3>Log In with the following details:</h3>


			<form method="post" action="login.php">
				<div class="fields">
					<input type="text" id="username" name="username" placeholder="Username" required>

					<input type="password" id="password" name="password" placeholder="Password" required>
				</div>

				<?php if(isset($_GET['error'])) { ?>
            		<p class="error"> <?php echo $_GET['error']; ?></p>
        		<?php } ?>
				<input type="submit" value="LOG IN">
			</form>
    		<div class="dont">
				Don't have an account yet? <a href="reg.php">REGISTER HERE</a>
    		</div>
		</div>
	</div>
</body>

</html>
