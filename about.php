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
    <title>HAVE IT - JOURNAL</title>
    <link rel="stylesheet" type="text/css" href="about.css">
    <link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
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
                    <button class="navButton" onclick="location.href='home.php'"><span class="material-symbols-outlined">home</span>&nbsp;HOME</button>
                    <button class="navButton" onclick="location.href='calendar.php'"><span class="material-symbols-outlined">calendar_month</span>&nbsp;CALENDAR</button>
                    <button class="navButton" onclick="location.href='habits.php'"><span class="material-symbols-outlined">cycle</span>&nbsp;HABITS</button>
                    <button class="navButton"><span class="material-symbols-outlined">auto_stories</span>&nbsp;JOURNAL</button>
                    <button class="navButton" onclick="location.href='dboard.php'"><span class="material-symbols-outlined">monitoring</span>&nbsp;DASHBOARD</button>
                    <button class="activeButton" onclick="location.href='about.php'"><span class="material-symbols-outlined">info</span>&nbsp;ABOUT</button>
                </nav>
            </div>
            
            <div class="accountBox">
                <div class="accountPic">
                    <img src="CSS/Images/Account-Placeholder.png">
                </div>

                <div class="accountName">
                    <span onclick="location.href='profile.php'"><?php   echo $userName  ?></</span>
                </div>
            </div>
        </div>
       <!--CONTENT-->
       <div class="contentSect">
        <section>
            <img src="CSS/Images/stars.png" id="stars">
            <img src="CSS/Images/moon.png" id="moon">
            <img src="CSS/Images/mountains_behind.png" id="mountains_behind">
            <h2 id="text">ABOUT US</h2>
            <img src="CSS/Images/mountains_front.png" id="mountains_front">
        </section>
       <div class="desc">
            <p class="w">We Are HAVE IT</p><br>
            <p>At HAVE IT, we believe in the power of daily habits, goal-setting, and self-reflection to create a life full of positive changes. We know that building habits,
achieving goals, and writing about how your day went can be difficult to do, which is why we create this all-in-one tracker and journal application to make it easier.</p><br>
            <p>HAVE IT is designed to provide you with the necessary tools to set achievable goals, establish lasting habits, and express yourself through writing. Our user-friendly 
dashboard feature enables you to track and assess your performance using clear and concise graphs, so you can stay motivated and on the right track towards your personal best. </p><br>
            <p class="o">Our dedicated team is committed to empowering individuals to reach their utmost potential and live a fulfilling life. With this mission in mind, we have developed and offer 
everyone our application, HAVE IT. </p>
       </div>
    </div>
    <script>
        let stars = document.getElementById('stars');
        let moon = document.getElementById('moon');
        let mountains_behind = document.getElementById('mountains_behind');
        let mountains_front = document.getElementById('mountains_front');
        let text = document.getElementById('text');

        window.addEventListener('scroll', function(){
            let value = window.scrollY;
            stars.style.left = value * 0.25 + 'px';
            moon.style.top = value * 0.5 + 'px';
            mountains_behind.style.top = value * 0.5 + 'px';
            mountains_front.style.top = value * 0 + 'px';
        })
   </script>
    </body>
    </html>