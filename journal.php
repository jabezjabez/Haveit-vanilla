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
        require_once('db_conn.php');
        $author_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAVE IT - JOURNAL</title>
    <link rel="stylesheet" type="text/css" href="journal.css">
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
                    <button class="activeButton"><span class="material-symbols-outlined">auto_stories</span>&nbsp;JOURNAL</button>
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
                <div class="journals">
                    <span>JOURNAL YOUR JOURNEY</span>
                    <button onclick="location.href='write_journal.php'" id="edit" class="newJournal">
                            Write New &nbsp;&nbsp; <i class="fas fa-pen"></i>  
                        </button>
                </div>
            
                <div class="journs">
                    <?php
                        // Select records from tbl_articles for the current user
                        $sql = "SELECT * FROM tbl_articles WHERE author_id = '$author_id'";
                        $result = $conn->query($sql);

                        // Display records
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $description = $row['description'];

                                // Display the record using the desired HTML structure
                                echo "<div class='journalist'>";
                                echo "<div class='titleText'<b><p>&nbsp;&nbsp;$title</p></b></div>";
                                echo "<div class='crudBtn'><button onclick=\"location.href='edit_journal.php?id=$row[id]'\" id='edit' class='editJournal'>";
                                echo "Edit <i class='fas fa-edit'></i></button>";
                                echo "<form action='delete_journal.php' method='POST'>";
                                echo "<input type='hidden' name='journal_id' value='" . $row['id'] . "'>";
                                echo "<button id='delete' type='submit' class='deleteJournal'>";
                                echo "Delete <i class='fa fa-trash' aria-hidden='true'></i></button></form></div>";
                                echo "</div>";
                            }
                        } else {
                            echo "Your Created Journals will be displayed here.";
                        }

                        $conn->close();
                        ?>
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
        <script src="journal.js"></script>
    </div>

</body>


<script>
</script>
</html>