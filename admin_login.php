<?php
session_start();

$conn=mysqli_connect('localhost','root','','chatbox_db');
$mysqli=new mysqli('localhost','root','','chatbox_db') or die(mysqli_error($mysqli));
mysqli_select_db($conn,'chatbox_db');


////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['aLOG']))
{
$aname=$_POST['aname'];
$apass=$_POST['apass'];


$result=$mysqli->query("SELECT * FROM admin_info WHERE  username='$aname' && password='$apass'") or die($mysqli->error());
$row=$result->fetch_array();
if($row==0)

    {
      echo "<script> alert('Admin Not Found'); window.location.href='admin_login.php'; </script>";
    }


    else
    {

    $aname=$row['username'];
    $_SESSION['aname']=$aname;
    echo "<script> alert('Login Success'); window.location.href='admin_homepage.php'; </script>";

    }       


}?>



<html>
    <head>
    <title>ChatBot | Admin Login</title>
        <link rel="stylesheet" href="stylecss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>

      <div class='dashboard'>
        <div class="dashboard-nav">
        <header><img height="50" width="50" style="margin-right:20px;" src="ahm.png"><font color="white">Enquiry ChatBot</font></header>

        <nav class="dashboard-nav-list"><a href="homepage.php" class="dashboard-nav-item"><i class="fas fa-home"></i>
                Home </a><a
                    href="admin_login.php" class="dashboard-nav-item active"><i class="fas fa-user-shield"></i> Admin Login
            </a><a
            href="student_login.php" class="dashboard-nav-item"><i class="fas fa-robot"></i> Ask ChatBot </a>
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
                </div>-->

                <a href="contact_a.php" class="dashboard-nav-item"><i class="fas fa-phone"></i> Contact Us </a>


 
             <!-- <div class="nav-item-divider"></div>
              <a
                        href="#" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>-->
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>AIMCA   Enquiry ChatBot | Anjuman Institute of Management & Computer Application, Bhatkal</header> 
            <div class='dashboard-content'>
                <div class='container'>
                <br><br>

                    <div class='card'>
                        <div class='card-header'>
                            <h3>Admin Login</h3><br>
                        <form action="" method="POST">  <center> <input name="aname" class="form-control" style="width:50%;" type="text" placeholder="Userame" required><br>
                           <input name="apass" class="form-control" style="width:50%;" type="password" placeholder="Password" required><br>
                           
                           <center><button type="submit" name="aLOG" class="btn btn-primary"> Login</button></center>
                        </form>
                        </center>
                        </div>
                        <div class='card-body'>
                          <!--<center><textarea style="width:70%;" class="form-control" placeholder="Type here..." id="" name="" rows="2" cols="50"></textarea></center>-->
                         <!--<center><h6><a href="student_register.php">Not Registered? Register Here..</a></h6></center>-->
                          <br>

                         <!-- <p>Your account type is: Administrator</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










          <script src="stylejs.js"></script>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>