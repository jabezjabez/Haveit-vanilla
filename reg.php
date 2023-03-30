<?php
include "db_conn.php";
$emptyfield= "A field was left empty, please fill it up";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HAVE IT - REGISTER</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
	<link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
</head>

<body>
	<div class="register-container">
        <div class="greetings">
        	<div class="logo">
				<img src="CSS/Images/Have-It-Logo-White.png" >
			</div>
        	<div class="subtext">HAVE IT YOUR WAY!</div>
            <div class="subtext2">Habits and Goals Tracker with Journal</div>
        </div>

        <div class="forms">
			<h1>WELCOME TO HAVE IT!</h1>
			<h3>Register by filling up the fields:</h3>

			<?php
			if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];


			if(empty(trim($username)) | empty(trim($email)) | empty(trim($password))){
				echo $emptyfield;
			}else{
				$sql = "INSERT INTO `tbl_accounts`(`id`, `userName`, `email`, `password`) VALUES (null,'$username', '$email','$password')";
				$result = mysqli_query($conn, $sql);
				}
			}
			?>
			<form form action="" method="post">
				<div class="fields">
					<input type="text" id="email" name="email" placeholder="Email" required>
					<input type="text" id="username" name="username" placeholder="Username" required>
					<input type="password" id="password" name="password" placeholder="Password" required>
				</div>

				<div class="divTAC">
					<input id="TAC" type="checkbox"/>
					<label for="checkbox"> I have read and AGREED to the <a href="#">Terms and Conditions</a> of HAVE IT.</label>
				</div>

				<div class="divPP">
					<input id="PP" type="checkbox"/>
					<label for="checkbox"> I have also read and AGREED to the <a href="#">Privacy Policy</a> of HAVE IT.</label>
				</div>

				  <input type="submit" class="btn" name="submit">
			</form>

        	<div class="alr">
				Already have an account? <a href="login.php">LOG IN HERE</a>
    		</div>
		</div>
	</div>
</body>

</html>