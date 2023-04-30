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
        $author_id = $user_id;
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <form class="add-habit" method="POST" action="save_habit.php"  id="myForm">
                    <input type="hidden" name="id" value="">
                        <input
                            class="habit"
                            type="text"
                            name="habit"
                            id="habit"
                            placeholder="Enter a Habit Title"
                            required
                        />
                        <input
                            class="rep"
                            type="number"
                            name="reps"
                            id="rep"
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

                                <button class="edit" data-id="<?php echo $habit_id; ?>">edit</button>
                                

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
// Get all of the edit buttons
const editButtons = document.querySelectorAll('.edit');

// Loop through each button and attach an event listener
editButtons.forEach(function(button) {
  button.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default button click behavior

    const habitId = this.getAttribute('data-id');

    // Send a request to the server to fetch the data
    fetch(`fetch_data.php?id=${habitId}`)
      .then(response => response.json()) // Parse the response as JSON
      .then(data => {
        // Populate the form fields with the fetched data
        const habitField = document.getElementById('habit');
        const repField = document.getElementById('rep');
        const timeframeField = document.getElementById('timeframe');

        habitField.value = data.text;
        repField.value = data.reps;
        timeframeField.value = data.timeframe;

        // Optionally, you could set the ID of the hidden input field to the habit ID
        const idField = document.querySelector('input[name="id"]');
        idField.value = data.id;
      })
      .catch(error => console.error(error)); // Handle any errors
  });
});


    </script>
    
</body>

</html>


