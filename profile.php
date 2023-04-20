<?php
    session_start();
    $user_id = $_SESSION['user_id'];

    // update the user's email address in the database
    $sql = "UPDATE users SET email = 'new_email@example.com' WHERE id = $user_id";





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAVE IT - YOUR PROFILE</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
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
                    <span>Daniel Austin Berba</span>
                </div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="contentSect">
            <div class="container">
                <div class="center">
                <form id="delete-account-form" action="delete.php" method="POST">
                    <!-- Any additional form fields here -->
                    <button id="delete-account-btn" type="submit" class="btn btn-danger">Delete Account</button>
                </form>
                <form action="logout.php" method="post">
                    <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                </form>
                </div>
            </div>
            
            <div class="update">
            <form method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                <br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                <br><br>
                <input type="submit" name="update" value="Update">
            </form>
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
        // Add a click event listener to the delete account button
        document.getElementById("delete-account-btn").addEventListener("click", function(event){
            // Prevent the default action of the button
            event.preventDefault();
            
            // Display a confirmation dialog box to confirm that the user really wants to delete their account
            if(confirm("Are you sure you want to delete your account?")){
                // If the user confirms, submit the form to delete the account
                document.getElementById("delete-account-form").submit();
            }
        });
    </script>

    <!-- <script>
                $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="title"]').val(scheds[id].title)
                _form.find('[name="description"]').val(scheds[id].description)
                _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
                _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })
    </script> -->
</body>
</html>

