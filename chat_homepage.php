<?php

session_start();
$profile = $_SESSION['sname'];

$defan = "Sorry " . $profile . ". Currently, I dont have the answer for this query. Please try to ask me after 5 Minutes.!";

$asked = FALSE;
$conn = mysqli_connect('localhost', 'root', '', 'chatbox_db');
$connect = mysqli_connect('localhost', 'root', '', 'chatbox_db');

$mysqli = new mysqli('localhost', 'root', '', 'chatbox_db') or die(mysqli_error($mysqli));
mysqli_select_db($conn, 'chatbox_db');


$answer = "";



if (isset($_GET['DEL'])) {
    $mysqli->query("TRUNCATE TABLE conversations;");

    header("Location: chat_homepage.php");
}












?>








<html>

<head>
    <title>ChatBot | User Interface</title>
    <link rel="stylesheet" href="stylecss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><img height="50" width="50" style="margin-right:20px;" src="ahm.png">
                <font color="white">AIMCA (BBA/BCA)<br> Enquiry ChatBot</font>
            </header>
            <nav class="dashboard-nav-list"><a href="chat_homepage.php" class="dashboard-nav-item active"><i class="fas fa-home"></i>
                    Home </a><a href="notice_board.php" class="dashboard-nav-item"><i class="fas fa-clipboard"></i> Notice Board </a>

                <!--<div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-photo-video"></i> Media </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                                class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a
                            href="#" class="dashboard-nav-dropdown-item">Images</a><a
                            href="#" class="dashboard-nav-dropdown-item">Video</a></div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-users"></i> Users </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                                class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Subscribed</a><a
                            href="#"
                            class="dashboard-nav-dropdown-item">Non-subscribed</a><a
                            href="#" class="dashboard-nav-dropdown-item">Banned</a><a
                            href="#" class="dashboard-nav-dropdown-item">New</a></div>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-money-check-alt"></i> Payments </a>
                    <div class='dashboard-nav-dropdown-menu'><a href="#"
                                                                class="dashboard-nav-dropdown-item">All</a><a
                            href="#" class="dashboard-nav-dropdown-item">Recent</a><a
                            href="#" class="dashboard-nav-dropdown-item"> Projections</a>
                    </div>
                </div>
                <a href="#" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Settings </a>-->
                <a href="edit_profile.php" class="dashboard-nav-item"><i class="fas fa-user-edit"></i> Edit Profile </a>
                <a href="contact.php" class="dashboard-nav-item"><i class="fas fa-phone"></i> Contact Us
                </a>
                <div class="nav-item-divider"></div>
                <a href="logout_handler.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Exit ChatBot </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header style="" class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>AIMCA Enquiry ChatBot <a class="btn btn-danger" href="chat_homepage_voice.php" style="margin-left:530px;"><i style="margin-right:5px;" class="fas fa-microphone"></i>Ask with Voice</a> <a style="margin-left:10px;" href="" class="btn btn-primary"><i style="margin-right:5px;" class="fas fa-user"></i><?php echo $profile; ?></a></header>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                        </div>
                        <div class='card-body'>







                            <div style="width:40%;" class="alert alert-primary" role="alert">
                                <i class="fas fa-robot"></i> Hello <?php echo $profile; ?>.! I am the ChatBot of AIMCA College.. You can ask me the queries related to the college.!
                            </div>

                            <?php
                            $query3 = "SELECT * FROM conversations";
                            $result3 = mysqli_query($connect, $query3);
                            while ($row = mysqli_fetch_object($result3)) { ?>
                                <div style="width:40%;  margin-left:640px;" class="alert alert-danger" role="alert">
                                    <i class="fas fa-user"></i>

                                    <?php echo $row->bot_msg; ?>
                                </div>

                                <div style="width:40%;" class="alert alert-primary" role="alert">
                                    <i class="fas fa-robot"></i>
                                    <?php echo $row->user_msg; ?>
                                </div>
                            <?php
                            } ?>





                            <?php if (isset($_POST['D'])) {
                                $queryy = $_POST['queryy'];
                                $asked = true;


                            ?>
                                <div style="width:40%; margin-left:640px;" class="alert alert-danger" role="alert">
                                    <i class="fas fa-user"></i>
                                    <?php echo $queryy; ?>
                                </div>

                            <?php
                            } ?>



                            <?php if ($asked == TRUE) {
                                $queryy = $_POST['queryy'];
                                if($queryy == 'Hi' || $queryy == 'Hello' || $queryy == 'hi' ||$queryy == 'hello' ){
                                    $result = $mysqli->query("SELECT * FROM queries WHERE question ='$queryy'") or die($mysqli->error());
                                    $row = $result->fetch_array(); 
                                }else{
                                    $result = $mysqli->query("SELECT * FROM queries WHERE  question like '%$queryy%'") or die($mysqli->error());
                                    $row = $result->fetch_array();
                                }
                                
                                if ($row == 0) {
                                    $an = $defan;
                                    $query = "INSERT INTO u_queries (question) VALUES ('$queryy')";
                                    mysqli_query($conn, $query);
                                } else {
                                    $an = $row['answer'];
                                }
                                $query = "INSERT INTO conversations (bot_msg,user_msg) VALUES ('$queryy','$an')";
                                mysqli_query($conn, $query);
                                if ($row == 0) { ?>
                                    <div style="width:40%;" class="alert alert-primary" role="alert">
                                        <i class="fas fa-robot"></i>
                                        <?php echo $defan; ?>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div style="width:40%;" class="alert alert-primary" role="alert">
                                        <i class="fas fa-robot"></i>
                                        <?php echo $row['answer']; ?>
                                    </div>
                            <?php
                                }
                            } ?>




                        </div>
                        <br>



                    </div>

                    <br>
                    <form action="" method="POST">

                        <div style="text-align:center ;"><input name="queryy" class="form-control" style="border:3px solid green; display:inline-block; width:40%;" type="text" placeholder="Type Your Queries" required>
                            <button style="display:inline-block;" type="submit" class="btn btn-success" name="D">ASK CHATBOT</button>

                        </div>
                    </form>
                    <marquee behavior="" direction="left" loop="infinite">Developed by AIMCA</marquee>
                </div>
            </div>
        </div>








        <script>
            setTimeout(() => {
                window.scrollTo(0, document.body.scrollHeight);
            }, 100);
        </script>

        <script src="stylejs.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>