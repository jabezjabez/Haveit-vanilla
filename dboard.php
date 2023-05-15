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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
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
                                <option value="Newest">Newest</option>
                                <option value="Oldest">Oldest</option>
                            </select> 
                        </div>
                    </div>

                    <div class="list-CompG">
                        <ul class="compG" id="completedGoalsList">
                        <?php 
                                // prepare the SQL statement
                                $stmt = $conn->prepare("SELECT id, title, start_datetime, date_update, end_datetime,
                                                        CASE progress 
                                                            WHEN 0 THEN 'Ongoing' 
                                                            WHEN 1 THEN 'Completed' 
                                                            ELSE '' 
                                                        END AS progress_status
                                                        FROM events 
                                                        WHERE progress = 1 and author_id = ?");
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
                                // loop through the rows in the result set
                                while ($row = $result->fetch_assoc()) {
                                    // output the data for each row as a list item
                                    echo "<li data-end-datetime='" . $row["date_update"] . "'>";
                                    echo "<div class='parent-containter'>";
                                    echo "<div class='first-containter'>";
                                    echo "Title: " . $row["title"] . "<br>";
                                    echo "</div>";
                                    echo "<div class='second-containter'>";
                                    echo "<div class='child-containter'>";
                                    echo "Start: " . date("Y-m-d", strtotime($row["start_datetime"]));
                                    echo "</div>";
                                    echo "<div class='child-containter'>";
                                    echo "End: " . date("Y-m-d", strtotime($row["end_datetime"]));
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</li>";
                                }

                                    // close the unordered list
                                    echo "</ul>";
                                } else {
                                    // output a message indicating that there is no data to display
                                    echo "No Goals Completed to display.";
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="createdGoals">
                    <div class="header-CreatG">
                        <span class="header-CreatG-Text">YOUR CREATED GOALS</span>
                        <div class="sortBox">
                            <select id="sortBy-CreatG" class="sortBy">
                                <option value="" disabled selected hidden class="sortBy">Sort By</option>
                                <option value="Newest">Newest</option>
                                <option value="Oldest">Oldest</option>
                            </select> 
                        </div>
                    </div>

                    <div class="list-CreatG">
                        <ul class="creatG" id="allGoalslist">
                            <?php 
                                // prepare the SQL statement
                                $stmt = $conn->prepare("SELECT id, title, end_datetime, start_datetime,
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
                                        echo "<li data-end-datetime='" . $row["start_datetime"] . "'>";
                                        echo "<div class='parent-containter'>";
                                        echo "<div class='first-containter'>";
                                        echo "Title: " . $row["title"] . "<br>";
                                        echo "</div>";
                                        echo "<div class='second-containter'>";
                                        echo "<div class='child-containter'>";
                                        echo "Start: " . date("Y-m-d", strtotime($row["start_datetime"]));
                                        echo "</div>";
                                        echo "<div class='child-containter'>";
                                        echo "End: " . date("Y-m-d", strtotime($row["end_datetime"]));
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                    // close the unordered list
                                    echo "</ul>";
                                } else {
                                    // output a message indicating that there is no data to display
                                    echo "No Created Goals to display.";
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="createdJournals">
                    <div class="header-CreatJ">
                        <span class="header-CreatJ-Text">YOUR CREATED JOURNALS</span>
                        <div class="sortBox">
                            <select id="sortBy-CreatJ" class="sortBy">
                                <option value="" disabled selected hidden class="sortBy">Sort By</option>
                                <option value="Newest">Newest</option>
                                <option value="Oldest">Oldest</option>
                            </select> 
                        </div>
                    </div>
                    
                    <div class="list-CreatJ">
                        <ul class="creatJ" id="journalListall">
                            <?php
                                // Select records from tbl_articles for the current user
                                $sql = "SELECT * FROM tbl_articles WHERE author_id = '$user_id'";
                                $result = $conn->query($sql);

                                // Display records
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $title = $row['title'];
                                        $date = $row['date'];

                                        // Display the record using the desired HTML structure
                                        echo "<div class='journalist' data-end-datetime='" . $row["date"] . "'>";
                                        echo "<div class='first-portion-journal'";
                                        echo "<a href='journal.php'><p>$title</p></a>";
                                        echo "</div>";
                                        echo "<div class='second-portion-journal'>";
                                        echo "<p>$date</p>";
                                        echo "</div>";
                                        echo "</div>";
                                        
                                    }
                                } else {
                                    echo "No Created Journals to display.";
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
    <script>
    $(document).ready(function() {
      $('#sortBy-CompG').change(function() {
        var sortValue = $(this).val().toLowerCase();
        var goalsList = $('#completedGoalsList');
        var goals = goalsList.find('li').get();

        goals.sort(function(a, b) {
          var aDate = new Date($(a).data('end-datetime'));
          var bDate = new Date($(b).data('end-datetime'));

          if (sortValue === 'newest') {
            return bDate.getTime() - aDate.getTime(); // Sort from newest to oldest
          } else if (sortValue === 'oldest') {
            return aDate.getTime() - bDate.getTime(); // Sort from oldest to newest
          }

          // If no sorting condition matched, maintain the original order
          return 0;
        });

        // Clear the current list
        goalsList.empty();

        // Append the sorted goals to the list
        goals.forEach(function(goal) {
          goalsList.append(goal);
        });
      });
    });

    //
    $(document).ready(function() {
      $('#sortBy-CreatG').change(function() {
        var sortValue = $(this).val().toLowerCase();
        var goalsList = $('#allGoalslist');
        var goals = goalsList.find('li').get();

        goals.sort(function(a, b) {
          var aDate = new Date($(a).data('end-datetime'));
          var bDate = new Date($(b).data('end-datetime'));

          if (sortValue === 'newest') {
            return bDate.getTime() - aDate.getTime(); // Sort from newest to oldest
          } else if (sortValue === 'oldest') {
            return aDate.getTime() - bDate.getTime(); // Sort from oldest to newest
          }

          // If no sorting condition matched, maintain the original order
          return 0;
        });

        // Clear the current list
        goalsList.empty();

        // Append the sorted goals to the list
        goals.forEach(function(goal) {
          goalsList.append(goal);
        });
      });
    });

    //
    $(document).ready(function() {
      $('#sortBy-CreatJ').change(function() {
        var sortValue = $(this).val().toLowerCase();
        var journalList = $('#journalListall');
        var journals = journalList.find('.journalist').get();

        journals.sort(function(a, b) {
          var aDate = new Date($(a).data('end-datetime'));
          var bDate = new Date($(b).data('end-datetime'));

          if (sortValue === 'newest') {
            return bDate.getTime() - aDate.getTime(); // Sort from newest to oldest
          } else if (sortValue === 'oldest') {
            return aDate.getTime() - bDate.getTime(); // Sort from oldest to newest
          }

          // If no sorting condition matched, maintain the original order
          return 0;
        });

        // Clear the current list
        journalList.empty();

        // Append the sorted journals to the list
        journals.forEach(function(journal) {
          journalList.append(journal);
        });
      });
    });

</script>
</body>

</html>