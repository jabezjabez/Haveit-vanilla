<?php require_once('db_conn.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal</title>
    
    <link rel="stylesheet" type="text/css" href="calendar.css">
	<link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!-- For the CSS -->
    <link rel="stylesheet" type="text/css" href="journal.css">

    <!-- For the Modal  -->
</head>

<body>

    <div class="sidebarSect">
                <div class="logoBox">
                    <img src="CSS/Images/Have-It-Logo-White.png">
                </div>

                <div class="tabsBox">
                    <nav>
                        <button class="navButton">
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
                        <button class="activeButton">
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


    <div class="canvas">
        <div class="leftside">
                <div class="container">
                    <div class="options">

                        <div class="fontoptions">

                            <div class="fontdivision">
                                <!-- fontface -->
                                <button id="bold" class="option-button format">
                                    <i class="fa-solid fa-bold"></i>
                                </button>
                                <button id="italic" class="option-button format">
                                    <i class="fa-solid fa-italic"></i>
                                </button>
                                <button id="underline" class="option-button format">
                                    <i class="fa-solid fa-underline"></i>
                                </button>
                                <button id="strikethrough" class="option-button format">
                                    <i class="fa-solid fa-strikethrough"></i>
                                </button>

                                <!-- Headings -->
                                <select id="formatBlock" class="adv-option-button">
                                    <option value="H1">H1</option>
                                    <option value="H2">H2</option>
                                    <option value="H3">H3</option>
                                    <option value="H4">H4</option>
                                    <option value="H5">H5</option>
                                    <option value="H6">H6</option>
                                </select>

                                <!-- Font -->
                                <select id="fontName" class="adv-option-button"></select>
                                <select id="fontSize" class="adv-option-button"></select>
                            </div>



                            <div class="colordivision">
                                <!-- Color -->
                                <div class="input-wrapper">
                                    <input type="color" id="foreColor" class="adv-option-button" />
                                    <label for="foreColor">Font Color</label>
                                </div>
                                <div class="input-wrapper">
                                    <input type="color" id="backColor" class="adv-option-button" />
                                    <label for="backColor">Highlight Color</label>
                                </div>
                            </div>


                        </div>

                        <div class="paragraphoptions">
                             <!-- Link -->
                            <button id="createLink" class="adv-option-button">
                                <i class="fa fa-link"></i>
                            </button>
                            <button id="unlink" class="option-button">
                                <i class="fa fa-unlink"></i>
                            </button>

                            <!-- Alignment -->
                            <button id="justifyLeft" class="option-button align">
                                <i class="fa-solid fa-align-left"></i>
                            </button>
                            <button id="justifyCenter" class="option-button align">
                                <i class="fa-solid fa-align-center"></i>
                            </button>
                            <button id="justifyRight" class="option-button align">
                                <i class="fa-solid fa-align-right"></i>
                            </button>
                            <button id="justifyFull" class="option-button align">
                                <i class="fa-solid fa-align-justify"></i>
                            </button>
                            <button id="indent" class="option-button spacing">
                                <i class="fa-solid fa-indent"></i>
                            </button>
                            <button id="outdent" class="option-button spacing">
                                <i class="fa-solid fa-outdent"></i>
                            </button>

                            <!-- List -->
                            <button id="insertOrderedList" class="option-button">
                                <div class="fa-solid fa-list-ol"></div>
                            </button>
                            <button id="insertUnorderedList" class="option-button">
                                <i class="fa-solid fa-list"></i>
                            </button>
                        </div>
                       

                    </div>
                    <div id="text-input" contenteditable="true"></div>

                    <button class="save" onclick="document.location='#'">SAVE</button>
                </div>

                <!--Script-->
                <script src="journal.js"></script>
                
        </div>
        <div class="rightside">

        </div>
        
    </div>
    
    <?php 
    // MUST CHANGE THE WHERE CONDITION HERE AFTER MODIFYING THE 

    // $schedules = $conn->query("SELECT * FROM `events`");
    // $sched_res = [];

    // foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    //     $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    //     $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    //     $sched_res[$row['id']] = $row;
    // }
    // ?>

    <?php 
    if(isset($conn)) $conn->close();
    ?>

    <script src="journal.js"></script>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>