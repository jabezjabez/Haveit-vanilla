<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> HABITS - HAVE IT</title>
    <link rel="stylesheet" type="text/css" href="habits.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    
</head>

<body> 
        <div class="gbuttons">
            <div class="buttons">
                <button class="user" onclick="document.location='profile.php'"><i class="fa fa-user"></i> Name</button>
                <button class="user" onclick="document.location='login.html'">Log out</button>
            </div>
            </div>
        <div class="nav-buttons">
            <div class="navnav">
                <ul class="bt">
                    <li><button class="nb" onclick="document.location='index.html'" title="Go to Home"></i>HOME</button></li>
                    <li><button class="nb" onclick="document.location='calendar.html'" title="Go to Calendar">CALENDAR</button></li>
                    <li><button class="habitat" onclick="document.location='habits.html'" title="Go to Habits">HABITS</button></li>
                    <li><button class="nb" onclick="document.location='journal.html'" title="Go to Journal">JOURNAL</button></li>   
                    <li><button class="nb" onclick="document.location='dboard.html'"title="Go to Dashboard"></i>DASHBOARD</button></li>    
        </ul>
        </div>
        </div>
        </div>
<br><br><br>
<hr>
<div class="container">
  <h2>HABITS</h2><br><br><br>
  <p></p>
  <form class="add-habit">
    <input
      class="habit"
      type="text"
      name="habit"
      placeholder="Enter Habit Title"
      required
    />
    <input
      type="number"
      name="reps"
      placeholder="# of Repetitions"
      min="1"
      required
    /><br>
    <div class="frequency">
      <label for="timeframe">Frequency: </label>
      <select name="timeframe" id="timeframe">
        <option value="Daily">Daily</option>
        <option value="Weekly">Weekly</option>
        <option value="Monthly">Monthly</option>
        <option value="Yearly">Yearly</option>
      </select>
    </div><br><br>
    <input type="submit" value="+ Add Habit" />
  </form>

  <ul class="habits">
    <li>Loading...</li>

  </ul>
</div>

<script src="habits.js"></script>
</body>
</html> -->

<?php 
require 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Habits</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="css" href="habits.css">
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
                        <button class="activeButton">
                            <span class="material-symbols-outlined" onclick="document.location='habits.php'" title="Go to Habits">
                            cycle</span>&nbsp;HABITS
                        </button>
                        <button class="navButton">
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

        <!--CONTENT-->
        <div class="contentSect">
            
            <div class="main-section">
                <div class="add-section">
                    <form action="app/add.php" method="POST" autocomplete="off">
                        <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                            <input type="text" 
                                name="title" 
                                style="border-color: #ff6666"
                                placeholder="This field is required" />
                        <button type="submit">Add &nbsp; <span>&#43;</span></button>

                        <?php }else{ ?>
                        <input type="text" 
                                name="title" 
                                placeholder="What do you need to do?" />
                        <button type="submit">Add &nbsp; <span>&#43;</span></button>
                        <?php } ?>
                    </form>
                </div>
                <?php 
                    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
                ?>
                <div class="show-todo-section">
                        <?php if($todos->rowCount() <= 0){ ?>
                            <div class="todo-item">
                                <div class="empty">
                                    <img src="img/f.png" width="100%" />
                                    <img src="img/Ellipsis.gif" width="80px">
                                </div>
                            </div>
                        <?php } ?>

                        <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="todo-item">
                                <span id="<?php echo $todo['id']; ?>"
                                    class="remove-to-do">x</span>
                                <?php if($todo['checked']){ ?> 
                                    <input type="checkbox"
                                        class="check-box"
                                        data-todo-id ="<?php echo $todo['id']; ?>"
                                        checked />
                                    <h2 class="checked"><?php echo $todo['title'] ?></h2>
                                <?php }else { ?>
                                    <input type="checkbox"
                                        data-todo-id ="<?php echo $todo['id']; ?>"
                                        class="check-box" />
                                    <h2><?php echo $todo['title'] ?></h2>
                                <?php } ?>
                                <br>
                                <small>created: <?php echo $todo['date_time'] ?></small> 
                            </div>
                        <?php } ?>
                </div>
            </div>

                <script src="js/jquery-3.2.1.min.js"></script>

                <script>
                    $(document).ready(function(){
                        $('.remove-to-do').click(function(){
                            const id = $(this).attr('id');
                            
                            $.post("app/remove.php", 
                                {
                                    id: id
                                },
                                (data)  => {
                                    if(data){
                                        $(this).parent().hide(600);
                                    }
                                }
                            );
                        });

                        $(".check-box").click(function(e){
                            const id = $(this).attr('data-todo-id');
                            
                            $.post('app/check.php', 
                                {
                                    id: id
                                },
                                (data) => {
                                    if(data != 'error'){
                                        const h2 = $(this).next();
                                        if(data === '1'){
                                            h2.removeClass('checked');
                                        }else {
                                            h2.addClass('checked');
                                        }
                                    }
                                }
                            );
                        });
                    });
                </script>



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