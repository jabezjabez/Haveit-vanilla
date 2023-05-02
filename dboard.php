<?php
        include("db_conn.php");
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
	<title>HAVE IT - DASHBOARD</title>
	<link rel="stylesheet" type="text/css" href="dboard.css">
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
                    <button class="navButton" onclick="location.href='home.php'"><span class="material-symbols-outlined">home</span>&nbsp;HOME</button>
                    <button class="navButton" onclick="location.href='calendar.php'"><span class="material-symbols-outlined">calendar_month</span>&nbsp;CALENDAR</button>
                    <button class="navButton" onclick="location.href='habits.php'"><span class="material-symbols-outlined">cycle</span>&nbsp;HABITS</button>
                    <button class="navButton" onclick="location.href='journal.php'"><span class="material-symbols-outlined">auto_stories</span>&nbsp;JOURNAL</button>
                    <button class="activeButton"><span class="material-symbols-outlined">monitoring</span>&nbsp;DASHBOARD</button>
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
            <div class="container">
                <!--<center>
                    <h1>HAVE IT - FOCUS TIMER</h1>
                    <div id="container">
                    <p id="hour-label" class="label">Hours</p><p id="min-label" class="label">Minutes</p><p id="sec-label" class="label">Seconds</p>
                    <input id="hour" type="number" max="99" min="0" value="0" class="time"><p id="p1" class="semicolon">:</p><input id="minute" type="number" max="60" min="0" value="0" class="time"><p id="p2" class="semicolon">:</p><input id="sec" type="number" max="60" min="0" value="0" class="time">
                    <button id="start" class="btn">Start</button>
                    <button id="reset" class="btn">Reset</button>
                    </div>
                    <script src="focus.js"></script>
                </center>
                </div>-->
                <div class="completedGoals">
                    <div class="header-CompG">
                        <span class="header-CompG-Text">YOUR COMPLETED GOALS</span>
                        <div class="sortBox">
                            <select id="sortBy-CompG" class="sortBy">
                                <option value="" disabled selected hidden class="sortBy">Sort By</option>
                                <option value="monthly">Monthly</option>
                                <option value="weekly">Weekly</option>
                            </select> 
                        </div>
                    </div>

                    <div class="list-CompG">
                        <ul class="compG">
                            <li>Loading...</li>
                        </ul>
                    </div>
                </div>

                <div class="createdGoals">
                    <div class="header-CreatG">
                        <span class="header-CreatG-Text">YOUR CREATED GOALS</span>
                        <div class="sortBox">
                            <select id="sortBy-CreatG" class="sortBy">
                                <option value="" disabled selected hidden class="sortBy">Sort By</option>
                                <option value="monthly">Monthly</option>
                                <option value="weekly">Weekly</option>
                            </select> 
                        </div>
                    </div>

                    <div class="list-CreatG">
                        <ul class="creatG">
                            <?php 
                                // prepare the SQL statement
                                $stmt = $conn->prepare("SELECT id, title, description, start_datetime, end_datetime, 
                                                        CASE progress 
                                                            WHEN 0 THEN 'Ongoing' 
                                                            WHEN 1 THEN 'Completed' 
                                                            ELSE '' 
                                                        END AS progress_status
                                                        FROM events 
                                                        WHERE author_id = ?");
                                // bind the parameter to the statement
                                $stmt->bind_param("i", $user_id);
                                // execute the query
                                $stmt->execute();
                                // get the result set
                                $result = $stmt->get_result();

                                // check if there are any rows in the result set
                                if ($result->num_rows > 0) {
                                    // start the unordered list

                                    // loop through the rows in the result set
                                    while ($row = $result->fetch_assoc()) {
                                        // output the data for each row as a list item
                                        echo "<li>";
                                        echo "Title: " . $row["title"] . "<br>";
                                        echo "Description: " . $row["description"] . "<br>";
                                        echo "Progress: " . $row["progress_status"] . "<br>"; // output progress_status instead of progress
                                        // add any other fields you want to display
                                        echo "</li>";
                                    }
                                    // close the unordered list
                                    echo "</ul>";
                                } else {
                                    // output a message indicating that there is no data to display
                                    echo "No Goals to display.";
                                }
                            ?>

                    </div>
                </div>

                <div class="createdJournals">
                    <div class="header-creatJ">
                        <span class="header-CreatJ-Text">YOUR CREATED JOURNALS</span>
                        <div class="sortBox">
                            <select id="sortBy-Dropdown" class="sortBy">
                                <option value="" disabled selected hidden class="sortBy">Sort By</option>
                                <option value="monthly">Monthly</option>
                            </select> 
                        </div>
                    </div>

                    <div class="list-creatJ">
                        <ul class="creatJ">
                        <?php
                            // Select records from tbl_articles for the current user
                            $sql = "SELECT * FROM tbl_articles WHERE author_id = '$user_id'";
                            $result = $conn->query($sql);

                            // Display records
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $title = $row['title'];
                                    $description = $row['description'];

                                    // Display the record using the desired HTML structure
                                    echo "<div class='journalist'>";
                                    echo "<a href='edit_journal.php?id=$row[id]'\'><p>&nbsp;&nbsp;$title</a>";
                                    echo "<button onclick=\"location.href='edit_journal.php?id=$row[id]'\" id='edit' class='edit-journal'>";
                                    echo "<i class='fas fa-edit'></i></button>";
                                    echo "<form action='delete_journal.php' method='POST'>";
                                    echo "<input type='hidden' name='journal_id' value='" . $row['id'] . "'>";
                                    echo "<button id='delete' type='submit' class='delete-journal'>";
                                    echo "<i class='fa fa-trash' aria-hidden='true'></i></button></form>&nbsp;&nbsp;";
                                    echo "</p></div>";
                                }
                            } else {
                                echo "No records found.";
                            }

                            $conn->close();
                            ?>
                        </ul>
                    </div>
                </div>

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