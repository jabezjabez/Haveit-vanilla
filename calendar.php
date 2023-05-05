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

        // MUST CHANGE THE WHERE CONDITION HERE AFTER MODIFYING THE 
        $schedules = $conn->query("SELECT * FROM `events` WHERE author_id = $user_id");
        $sched_res = [];

        foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
        $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
        $row['progress'] = $row['progress'] == '0' ? 'Ongoing' : 'Done';
        $sched_res[$row['id']] = $row;
        }

        
        if(isset($conn)) $conn->close();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HAVE IT - CALENDAR</title>
	<link rel="stylesheet" type="text/css" href="calendar.css">
	<link rel="icon" href="CSS/Images/Have-It-Favicon.svg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

    <!-- For the CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- CSS of the calendar -->    
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">

    <!-- For the Modal  -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- For The Calendar -->
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>
<body class="bg-custom">
    <div class="wrapperGrid bg-custom">
        <!--SIDEBAR-->
        <div class="sidebarSect">
            <div class="logoBox">
                <img src="CSS/Images/Have-It-Logo-White.png">
            </div>

            <div class="tabsBox">
                <nav>
                    <button class="navButton btn-block" onclick="location.href='home.php'"><span class="material-symbols-outlined">home</span>&nbsp;HOME</button>
                    <button class="activeButton btn-block"><span class="material-symbols-outlined">calendar_month</span>&nbsp;CALENDAR</button>
                    <button class="navButton btn-block" onclick="location.href='habits.php'"><span class="material-symbols-outlined">cycle</span>&nbsp;HABITS</button>
                    <button class="navButton btn-block" onclick="location.href='journal.php'"><span class="material-symbols-outlined">auto_stories</span>&nbsp;JOURNAL</button>
                    <button class="navButton btn-block" onclick="location.href='dboard.php'"><span class="material-symbols-outlined">monitoring</span>&nbsp;DASHBOARD</button>
                    <button class="navButton btn-block" onclick="location.href='about.php'"><span class="material-symbols-outlined">info</span>&nbsp;ABOUT</button>
                </nav>
            </div>

            <div class="accountBox">
                <div class="accountPic">
                    <img src="CSS/Images/Account-Placeholder.png">
                </div>

                <div class="accountName text-white">
                    <span onclick="location.href='profile.php'"><?php   echo $userName  ?></span>
                </div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="contentSect">
            <!-- Main calendar -->
            <div class="container py-5" id="page-container">
                    <div class="row">
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-3 text-white">
                            <div class="card border-0">
                                <div class="card-body bg-custom2 text-white border-0" style="font-family: Berlin Rounded Regular;">
                                    <div class="container-fluid">
                                        <form action="save_schedule.php" method="post" id="schedule-form">
                                            <h3>GOALS</H3>
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group mb-2">
                                                <label for="title" class="control-label">Title</label>
                                                <br>
                                                <input type="text" style="background-color: #0e0e0e; border-radius: 7px; color: #fff;" class="asdas" name="title" id="title" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="description" class="control-label">Description</label>
                                                <br>
                                                <textarea rows="3" style="background-color: #0e0e0e; border-radius: 7px; color: #fff;" class="" name="description" id="description" required></textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="start_datetime" class="control-label">Start</label>
                                                <br>
                                                <input type="datetime-local" style="color: #fff; cursor: pointer;" class="" name="start_datetime" id="start_datetime" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="end_datetime" class="control-label">End</label>
                                                <br>
                                                <input type="datetime-local" style="color: #fff; cursor: pointer;" class="" name="end_datetime" id="end_datetime" required>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer text-white" style="background-color: #0e0e0e;">
                                    <div class="text-center">
                                        <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                        <button class="btn btn-default border btn-sm rounded-0 text-white" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    
            <!-- Event Details Modal -->
            <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
            <div class="modal-dialog modal-dialog-centered-">
                <div class="modal-content rounded-0 ">
                    <div class="modal-header rounded-0 ">
                        <h5 class="modal-title">Schedule Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span class="material-symbols-outlined">
close
</span></button>
                    </div>
                    <div class="modal-body rounded-0">
                        <div class="container-fluid">
                            <dl>
                                <dt class="text-muted">Title</dt>
                                <dd id="title" class="fw-bold fs-4"></dd>
                                <dt class="text-muted">Description</dt>
                                <dd id="description" class=""></dd>
                                <dt class="text-muted">Start</dt>
                                <dd id="start" class=""></dd>
                                <dt class="text-muted">End</dt>
                                <dd id="end" class=""></dd>

                                <!-- progress show -->
                                <button id="doneBtn" class="btn btn-success btn-sm rounded-0" onclick="updateProgress(<?php echo $row['id']; ?>, 1)">Done </button>
                                <button id="ongoingBtn" class="btn btn-warning btn-sm rounded-0" onclick="updateProgress(<?php echo $row['id']; ?>, 0)">Ongoing</button>

                            </dl>
                        </div>
                    </div>
                    <div class="modal-footer rounded-0">
                        <div class="text-end">
                        <dt class="text-muted">Status</dt>
                        <dd id="progress" class=""></dd>

                            <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>



                            <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    



                </body>
                <script>
                    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')

                    const progress = document.getElementById('progress');
                    const doneBtn = document.getElementById('doneBtn');
                    const ongoingBtn = document.getElementById('ongoingBtn');
                    console.log('Progress value:', progress.textContent);

                    // if (progress && doneBtn && ongoingBtn) {
                    //     if (progress === 1) {
                    //             doneBtn.style.display = 'none';
                    //             ongoingBtn.style.display = 'inline';
                    //         } else {
                    //             ongoingBtn.style.display = 'none';
                    //             doneBtn.style.display = 'inline';
                    //         }
                    // } else {
                    // console.log('Error: Element not found');
                    // }

                    function updateProgress(journal_id, progress) {
                    $.ajax({
                        type: "POST",
                        url: "update_progress.php",
                        data: { journal_id: journal_id, progress: progress },
                        success: function(response) {
                            // update progress display
                            const progressDisplay = document.getElementById('progress');
                            progressDisplay.textContent = progress === 1 ? 'Done' : 'Ongoing';

                            console.log("Progress value:", progress.textContent);

                            // update button visibility
                            const doneBtn = document.getElementById('doneBtn');
                            const ongoingBtn = document.getElementById('ongoingBtn');
                            if (progress === 1) {
                                doneBtn.style.display = 'none';
                                ongoingBtn.style.display = 'inline';
                            } else {
                                ongoingBtn.style.display = 'none';
                                doneBtn.style.display = 'inline';
                            }
                            console.log(response);

                        },
                        error: function(xhr, status, error) {
                            // Handle error response here
                            console.log(xhr.responseText);
                        }
                    });
                }
                </script>
                <script src="./js/script.js"></script>

            
        </div>
    </div>
    <footer class="bg-custom text-white">
                <div class="footerGrid " >
                    <div class="copyrightBox">
                        &copy;2023 "HAVE IT" and "Have it your way!" under MALINTA KALIWA. All rights reserved.
                    </div>
                </div>
            </footer>
</body>

</html>