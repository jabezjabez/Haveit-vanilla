<?php
        // start the session
        session_start();

        if (!isset($_SESSION['user_id'])) 
        // {
        //     // user is logged in, do something
        // } else {
        //     // redirect the user to the login page
        //     header("Location: login.php");
        //     exit();
        // }

        // get the user ID from the session
        $user_id = $_SESSION['id'];
        // get the username from the seesion
        $userName = $_SESSION['userName'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HAVE IT - HOME</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>
<body>
    <div class="wrapperGrid">
        <!--SIDEBAR-->
        <div class="sidebarSect">
            <div class="logoBox">
                <img src="CSS/Images/Have-It-Logo-White.png">
            </div>

            <div class="tabsBox">
                <nav>
                    <button class="activeButton"><span class="material-symbols-outlined">home</span>&nbsp;HOME</button>
                    <button class="navButton" onclick="location.href='calendar.php'"><span class="material-symbols-outlined">calendar_month</span>&nbsp;CALENDAR</button>
                    <button class="navButton" onclick="location.href='habits.php'"><span class="material-symbols-outlined">cycle</span>&nbsp;HABITS</button>
                    <button class="navButton" onclick="location.href='journal.php'"><span class="material-symbols-outlined">auto_stories</span>&nbsp;JOURNAL</button>
                    <button class="navButton" onclick="location.href='dboard.php'"><span class="material-symbols-outlined">monitoring</span>&nbsp;DASHBOARD</button>
                    <button class="navButton" onclick="location.href='about.php'"><span class="material-symbols-outlined">info</span>&nbsp;ABOUT</button>
                </nav>
            </div>

            <div class="accountBox">
                <div class="accountPic">
                    <img src="CSS/Images/Account-Placeholder.png">
                </div>

                <div class="accountName">
                    <span onclick="location.href='profile.php'"><?php   echo $userName  ?></span>
                </div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="contentSect">
            <div class="greetingsText">
                <p>Welcome <span> <?php   echo $userName  ?></span>, make your day productive!</p>
            </div>
        
            <div class="shortcutSect">
                <div class="graphic">
                    <span>Have It Your Way!</span>
                </div>
                <a href="calendar.php">
                    <div class="shortcutBox calendar">
                        <img src="CSS/Images/calendarPH.jpg">
                        <span>Plan with your Calendar</span>
                    </div>
                </a>
                <a href="habits.php">
                    <div class="shortcutBox habits">
                        <img src="CSS/Images/habitsPH.jpg">
                        <span>Manage your Habits</span>
                    </div>
                </a>
                <a href="journal.php">
                    <div class="shortcutBox journal">
                        <img src="CSS/Images/journalPH.jpg">
                        <span>Write your Journal</span>
                    </div>
                </a>
                <a href="dboard.php">
                    <div class="shortcutBox dboard">
                        <img src="CSS/Images/dashboardPH.jpg">
                        <span>View your Progress</span>
                    </div>
                </a>
            </div>

            <footer>
                <div class="footerGrid">
                    <div class="copyrightBox">
                        &copy;2023 "HAVE IT" and "Have it your way!" under MALINTA KALIWA. All rights reserved.
                    </div>
                </div>
            </footer>
        </div>

    </div>
</body>

</html>