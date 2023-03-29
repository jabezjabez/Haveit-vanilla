<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HAVE IT - HOME</title>
	<link rel="stylesheet" type="text/css" href="home.css">
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
                        <button class="activeButton">
                            <span class="material-symbols-outlined" onclick="document.location='home.php'" title="Go to Home">
                            home</span>&nbsp;
                            HOME
                        </button>
                        <button class="navButton">
                            <span class="material-symbols-outlined" onclick="document.location='calendar.php'" title="Go to Calendar">
                            calendar_month</span>&nbsp;
                            CALENDAR
                        </button>
                        <button class="navButton">
                            <span class="material-symbols-outlined" onclick="document.location='habits.php'" title="Go to Habits">
                            cycle</span>&nbsp;HABITS
                        </button>
                        <button class="navButton">
                            <span class="material-symbols-outlined" onclick="document.location='journal.php'" title="Go to Journal">
                            auto_stories</span>&nbsp;JOURNAL
                        </button>
                        <button class="navButton">
                            <span class="material-symbols-outlined" onclick="document.location='dboard.php'" title="Go to Dashboard">
                            monitoring</span>&nbsp;DASHBOARD
                        </button>
                    </nav>
                </div>

            <div class="accountBox">
                <div class="accountPic">
                    <img src="CSS/Images/Account-Placeholder.png">
                </div>

                <div class="accountName">
                    <span>Daniel Austin Berba</span>
                </div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="contentSect">
            <div class="greetingsText">
             &nbsp &nbsp<p>Welcome, make your day productive!</p>
            </div>
        
            <div class="shortcutSect">
                <div class="graphic">
                    <!-- <span>Ekey so CIA stands for Christianity, Iglesia ni Cristo, and Atheism. IDK ano pang pwedeng ilagay dito.</span> -->
                </div>
                <a href="calendar.php">
                    <div class="shortcutBox">
                        <img src="CSS/Images/bean.jpg">
                        <span>Plan with your Calendar</span>
                    </div>
                </a>
                <a href="habits.php">
                    <div class="shortcutBox">
                        <img src="CSS/Images/bean.jpg">
                        <span>Manage your Habits</span>
                    </div>
                </a>
                <a href="journal.php">
                    <div class="shortcutBox">
                        <img src="CSS/Images/bean.jpg">
                        <span>Write your Journal</span>
                    </div>
                </a>
                <a href="dashboard.php">
                    <div class="shortcutBox">
                        <img src="CSS/Images/bean.jpg">
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