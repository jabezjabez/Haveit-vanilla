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

        // For the displayement
        require_once('db_conn.php');
        $id = $_GET['id'];
        $author_id = $_SESSION['id'];
        $sql = "SELECT * FROM tbl_articles WHERE id='$id' AND author_id='$author_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAVE IT - JOURNAL</title>
    <link rel="stylesheet" type="text/css" href="edit_journal.css">
    <link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

            
                <label for="title">Title:</label>
                    <input type="hidden" id="journal_id" name="journal_id" value="<?php echo $row['id']; ?>" required >
                    <input type="text" class="" id="title" name="title"  value="<?php echo $row['title']; ?>" required >
                <br>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required>
                <br>


                <div class="fontButtons">
                    <span class="toolCategory">Font</span>
                    <div class="fontButtonsSect">
                        <!--Font Dropdown-->
                        <select id="fontName" class="adv-option-button fName"></select>
                        <!--Font Size Dropdown-->
                        <select id="fontSize" class="adv-option-button fSize"></select>
                        <!--Superscript-->
                        <button id="superscript" class="option-button script fSuperS">
                            <i class="fa-solid fa-superscript"></i>
                        </button>
                        <!--Subscript-->
                        <button id="subscript" class="option-button script fSubS">
                            <i class="fa-solid fa-subscript"></i>
                        </button>                    
                        <!--Erase higlight -->
                        <button id="erase-highlight" onclick="eraseHighlight()" class="option-button format">
                        <i class="fa-solid fa-eraser"></i>
                        </button>
                        <!--Bold-->
                        <button id="bold" class="option-button format">
                            <i class="fa-solid fa-bold"></i>
                        </button>
                        <!--Italic-->
                        <button id="italic" class="option-button format">
                            <i class="fa-solid fa-italic"></i>
                        </button>
                        <!--Underline-->
                        <button id="underline" class="option-button format">
                            <i class="fa-solid fa-underline"></i>
                        </button>
                        <!--Strikethrough-->
                        <button id="strikethrough" class="option-button format">
                            <i class="fa-solid fa-strikethrough"></i>
                        </button>

                        <!--Font Color-->
                        <div class="input-wrapper">
                            <input type="color" id="foreColor" class="adv-option-button fColor" />
                                <i class="fa-solid fa-fill-drip"></i>
                        </div>
                        <!--Highlight Color-->
                        <div class="input-wrapper">
                            <input type="color" id="backColor" class="adv-option-button fHighlight" />
                                <i class="fa-solid fa-highlighter"> </i>
                        </div>
                    </div>
                </div>

                <div class="paragraphButtons">
                    <span class="toolCategory">Paragraph</span>
                    <div class="paragraphButtonsSect">
                        <!--Headings Dropdown-->
                        <select id="formatBlock" class="adv-option-button">
                            <option value="H1">H1</option>
                            <option value="H2">H2</option>
                            <option value="H3">H3</option>
                            <option value="H4">H4</option>
                            <option value="H5">H5</option>
                            <option value="H6">H6</option>
                        </select>
                        <!--Ordered List-->
                        <button id="insertOrderedList" class="option-button">
                            <div class="fa-solid fa-list-ol"></div>
                        </button>
                        <!--Unordered List-->
                        <button id="insertUnorderedList" class="option-button">
                            <i class="fa-solid fa-list"></i>
                        </button>

                        <!--Align Left-->
                        <button id="justifyLeft" class="option-button align">
                            <i class="fa-solid fa-align-left"></i>
                        </button>
                        <!--Align Center-->
                        <button id="justifyCenter" class="option-button align">
                            <i class="fa-solid fa-align-center"></i>
                        </button>
                        <!--Align Right-->
                        <button id="justifyRight" class="option-button align">
                            <i class="fa-solid fa-align-right"></i>
                        </button>
                        <!--Justify Full-->
                        <button id="justifyFull" class="option-button align">
                            <i class="fa-solid fa-align-justify"></i>
                        </button>

                        <!--Indent-->
                        <button id="indent" class="option-button spacing">
                            <i class="fa-solid fa-indent"></i>
                        </button>
                        <!--Outdent-->
                        <button id="outdent" class="option-button spacing">
                            <i class="fa-solid fa-outdent"></i>
                        </button>
                    </div>
                </div>

                <div class="insertButtons">
                    <span class="toolCategory">Insert</span>            
                    <div class="insertButtonsSect">
                        <!--Create Link-->
                        <button id="createLink" class="adv-option-buttonLink">
                            <i class="fa fa-link"></i>
                        </button>
                        <!--Unlink-->
                        <button id="unlink" class="option-button">
                            <i class="fa fa-unlink"></i>
                        </button>

                        <!--Undo-->
                        <button id="undo" class="option-button">
                            <i class="fa-solid fa-rotate-left"></i>
                        </button>
                        <!--Redo-->
                        <button id="redo" class="option-button">
                            <i class="fa-solid fa-rotate-right"></i>
                        </button>
                    </div>  
                </div>
                
                <div class="inputBoxSect">
                    <div id="text-input" class="inputBox" contenteditable="true"><?php echo $row['description']?></div>
                </div>

                        
                <div class="publishButtonSect">
                    <button class="BackButton" onclick="goBack()">Back</button>
                    <button class="publishButton" onclick="location.href='update_journal.php'" >Publish</button>
                </div>

                <?php
                    } else {
                        echo  "<script>  alert 'Article not found'";
                        echo "location.replace('./journal.php')";
                    }
                    $conn->close();
                ?>
            </div>
          
            <!--Script-->
            <script src="edit_journal.js"></script>
            
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
            // Get the journal ID from the URL parameter
            var journal_id = <?php echo $_GET['id']; ?>;
            var author_id = <?php echo  $user_id; ?>;
            
            $('.publishButton').on('click', function() {
                // Get the content of the text-input
                var content = $('#text-input').html();

                // Get the date and title inputs
                var date = $('#date').val();
                var title = $('#title').val();

                // Check if content, date, and title are not empty
                if (content && date && title && journal_id) {
                    // Send an AJAX request to the server to edit the content
                    $.ajax({
                    type: "POST",
                    url: "update_journal.php",
                    data: {
                        content: content,
                        date: date,
                        title: title,
                        journal_id: journal_id,
                        author_id:author_id
                    },
                    success: function(response) {
                        alert('journal Successfully Saved.');
                        location.replace('./journal.php')
                    },
                    error: function() {
                        alert('An error occurred while saving the journal.');
                    },

                    });
                    console.log("Content: " + content);
                    console.log("Date: " + date);
                    console.log("Title: " + title);
                    console.log("Journal ID: " + journal_id);
                    console.log("Author ID: " + author_id);
                } else {
                    alert('Error: Missing data.');
                    location.replace('./write_journal.php')
                }
                });

            console.log("Loaded jQuery version " + $.fn.jquery);


            // 
            let title = document.getElementById('title');
            let content = document.getElementById('content');
            let submitBtn = document.getElementById('submitBtn');
            let changesMade = false;

            function checkChanges() {
                if (title.value !== 'Initial title' || content.value !== 'Initial content') {
                changesMade = true;
                submitBtn.disabled = false;
                } else {
                changesMade = false;
                submitBtn.disabled = true;
                }
            }

             //BACK METHODMYNWORD!
            function goBack() {
            window.history.back();
        }
        </script>



</body>



</html>