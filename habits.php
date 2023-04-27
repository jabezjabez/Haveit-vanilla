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
        $author_id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAVE IT - HABITS</title>
    <link rel="stylesheet" type="text/css" href="habits.css">
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
                    <button class="activeButton"><span class="material-symbols-outlined">cycle</span>&nbsp;HABITS</button>
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
            <div class="container">
                <div class="header">
                    <span class="headerText">ADD A HABIT</span>
                </div>

                <div class="add-habitBox">
                    <form class="add-habit" method="POST" action="save_habit.php">
                        <input
                            class="habit"
                            type="text"
                            name="habit"
                            placeholder="Enter a Habit Title"
                            required
                        />
                        <input
                            class="rep"
                            type="number"
                            name="reps"
                            placeholder="No. of Repetitions"
                            min="1"
                            required
                        />
                        <select name="timeframe" id="timeframe" class="frequency">
                            <option value="" disabled selected hidden class="pHFrequency">Frequency</option>
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                        <input type="hidden" name="author_id" value="<?php echo $author_id; ?>" />
                        <input class="addHabitButton" type="submit" value="+ Add Habit" />
                    </form>
                </div>

                <div class="habitsList">
                    <ul class="habits">
                        <!-- <li>Loading...</li> -->
                        <?php
                            // Connect to the database
                            require_once('db_conn.php');
                            

                            // Construct the SQL query
                            $sql = "SELECT * FROM habits WHERE author_id = '$author_id'";

                            // Execute the query and get the result set
                            $result = mysqli_query($conn, $sql);

                            // Loop through the result set and display the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Display the habit data
                                ?>
                                <li>
                                <?php
                                echo "Habit Title: " . $row['text'] . "<br>";
                                echo "Repititions: ". $row['totalCounts'] ."/". $row['reps'] . "<br>";
                                echo "Frequency: " . $row['timeframe'] . "<br>";
                                $habit_id  = $row['id']; 
                                ?>
                                <form action="update_habit.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $habit_id; ?>">
                                    <button class="edit">edit</button>
                                </form>

                                <form id="delete-form" action="delete_habit.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $habit_id; ?>">
                                <button type="submit">Delete Habit</button>
                                </form>


                            
                                </li>
                                <?php
                            }

                        ?>
                    </ul>
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
                $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!habits[id]) {
                var _form = $('#schedule-form')
                console.log(String(habits[id].start_datetime), String(habits[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="habit"]').val(habits[id].title)
                _form.find('[name="reps"]').val(habits[id].description)
                _form.find('[name="timeframe"]').val(String(habits[id].start_datetime).replace(" ", "T"))
                _form.find('[name="end_datetime"]').val(String(habits[id].end_datetime).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })

    </script>
    
</body>

</html>


