<?php

session_start();
$profile=$_SESSION['sname'];

$defan="Sorry ".$profile.". Currently, I dont have the answer for this query. Please try to ask me after 5 Minutes.!";

$asked=FALSE;
$conn=mysqli_connect('localhost','root','','chatbox_db');
$connect=mysqli_connect('localhost','root','','chatbox_db');

$mysqli=new mysqli('localhost','root','','chatbox_db') or die(mysqli_error($mysqli));
mysqli_select_db($conn,'chatbox_db');


$answer="";


if(isset($_GET['DEL']))
{
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
   
   
   
   
   
		<script src="jquery-3.2.1.js"></script>
		<script type='text/javascript'>
		var recognition = new webkitSpeechRecognition();

		recognition.onresult = function(event) { 
			console.log('result');
		  	var saidText = "";
		  	for (var i = event.resultIndex; i < event.results.length; i++) {
		        if (event.results[i].isFinal) {
		            saidText = event.results[i][0].transcript;
		        } else {
		            saidText += event.results[i][0].transcript;
		        }
		    }
		 	
		    document.getElementById('speechText').value = saidText;
		   	
		   	// Search Posts
		   	searchPosts(saidText);
		}

		function startRecording(){
			recognition.start();
		}

		// Search Posts
		function searchPosts(saidText){

			$.ajax({
				url: 'getData.php',
				type: 'post',
				data: {speechText: saidText},
				success: function(response){
					$('.con1').empty();
					$('.con1').append(response);
				}
			});
		}

		</script>
   
   
   
   
   
   
   
   
   
   
   
   
    </head>
    <body>

      <div class='dashboard'>
        <div class="dashboard-nav">
        <header><img height="50" width="50" style="margin-right:20px;" src="ahm.png"><font color="white">Enquiry ChatBot</font></header>
  <nav class="dashboard-nav-list"><a href="chat_homepage.php" class="dashboard-nav-item active"><i class="fas fa-home"></i>
                Home </a><a
                    href="notice_board.php" class="dashboard-nav-item"><i class="fas fa-clipboard"></i> Notice Board </a>
                    
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
              <a
                        href="logout_handler.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Exit ChatBot </a>
            </nav>
        </div>
        <div class='dashboard-app'>
        <header style="" class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>AIMCA   Enquiry ChatBot   <a class="btn btn-success" href="chat_homepage.php" style="margin-left:530px;"><i style="margin-right:5px;" class="fas fa-microphone"></i>Ask with Message</a> <a style="margin-left:10px;" href="" class="btn btn-primary"><i style="margin-right:5px;" class="fas fa-user"></i><?php echo $profile;?></a></header> 
            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                        </div>
                        <div class='card-body'>
                        




                        
<center>
<div style="width:40%;" class="alert alert-primary" role="alert">
<i class="fas fa-robot"></i> Hello <?php echo $profile ;?>.! I am the ChatBot of AIMCA College.. You can ask me the queries related to the college.!






</div></center>
              

<div class="search_container">
<center><input readonly id="speechText"  class="form-control" style="border:3px solid green; display:inline-block; width:40%;" type="text" placeholder="Press 'ASK' button to Start! asking.." required>
 <input  class="btn btn-success" type='button' id='start' value='ASK' onclick='startRecording();'>


</center>
</div>

  </div>



                </div>

                <br>

<br><br>
<center>
<div class="con1">
</div>

<div class="bu">
    </div>

</center>
            </div>
        </div>
    </div>








    <script>
    setTimeout(() => {
        window.scrollTo(0, document.body.scrollHeight);
    }, 100);
</script>

          <script src="stylejs.js"></script>
         <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
--><script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>