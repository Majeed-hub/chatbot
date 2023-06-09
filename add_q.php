







<?php


session_start();
$profile=$_SESSION['aname'];
$connect=mysqli_connect('localhost','root','','chatbox_db');
mysqli_select_db($connect,'chatbox_db');

$conn=mysqli_connect('localhost','root','','chatbox_db');
$mysqli=new mysqli('localhost','root','','chatbox_db') or die(mysqli_error($mysqli));
mysqli_select_db($conn,'chatbox_db');

$ival=1;
$answer="";





if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM queries WHERE id='$id'");

    echo "<script> alert('Query Deleted Successfully!'); window.location.href='manage_q.php'; </script>";

}

if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $update=true;
    $result2=$mysqli->query("SELECT * FROM queries WHERE id='$id'");
    
    if(count(array($result2))==1)
    {
        $row=$result2->fetch_array();
        
        $question=$row['question'];
        $answer=$row['answer'];

    }
}



if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    
  
    
        $mysqli->query("UPDATE queries SET question='$question',answer='$answer' WHERE id='$id'");
       
        echo "<script> alert('Query Updated Successfully!'); window.location.href='manage_q.php'; </script>";


}
    
    



if(isset($_POST['addQ']))
{
    $question=$_POST['question'];
    $answer=$_POST['answer'];
    
  
    
    $query="INSERT INTO queries (question,answer) VALUES ('$question','$answer')";
    mysqli_query($conn,$query);       
    echo "<script> alert('Query Added Successfully!'); window.location.href='add_q.php'; </script>";


}



?>








<html>
    <head>
        <title>ChatBot | Add Queries</title>
        <link rel="stylesheet" href="stylecss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>

      <div class='dashboard'>
        <div class="dashboard-nav">
        <header><img height="50" width="50" style="margin-right:20px;" src="ahm.png"><font color="white">AIMCA (BBA/BCA)<br>Enquiry ChatBot</font></header>

        <nav class="dashboard-nav-list"><a href="admin_homepage.php" class="dashboard-nav-item"><i class="fas fa-home"></i>
                Home </a>
                
                <a href="add_q.php" class="dashboard-nav-item active"><i class="fas fa-add"></i> Add Queries
            </a>
                
                <a href="manage_q.php" class="dashboard-nav-item"><i class="fas fa-edit"></i> Manage Queries
            </a><a
                    href="manage_u_q.php" class="dashboard-nav-item"><i class="fas fa-question"></i> Manage Unanswered Queries </a>
                    <a href="add_notice.php" class="dashboard-nav-item"><i class="fas fa-add"></i> Add Notice </a>
               
               
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
                <a href="change_pass.php" class="dashboard-nav-item"><i class="fas fa-key"></i> Change Password </a>
              <div class="nav-item-divider"></div>
              <a
                        href="logout_handler.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </nav>
        </div>







        <div class='dashboard-app'>
        <header style="margin-left:63.5px;" class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>AIMCA   Enquiry ChatBot  <a style="margin-left:650px;" href="" class="btn btn-primary"><i style="margin-right:5px;" class="fas fa-user"></i><?php echo $profile;?></a></header> 
            <div class='dashboard-content'>
                <div class='container'>
                <br><br>

                    <div style="margin-left:60px;" class='card'>
                        <div class='card-header'>
                        <h5 style="color:black;"><center><b> <i style="color:black;" class="fa fa-edit"></i> Add Query </b></center></h5>


                        <form  action="" method="POST">


        <center>  <input style="margin-bottom:8px;display:inline-block; width:30%; " type="text" class="form-control"  placeholder="Write here Question" name="question"    required></center>

         <center>  <input style="margin-bottom:8px;display:inline-block; width:30%;  " type="text" class="form-control"  placeholder="Answer" name="answer"  required></center>
<center> <button class="btn btn-primary" type="submit" name="addQ">Add Query</button>
 </center> 
</form>


<br>
 <?php 

$query3="SELECT * FROM queries";

$result3=mysqli_query($connect,$query3);
?>

<center>
         <table style="border:3px solid white;  width:auto; color:black;" id="exam" class="table table-striped">

            <thead style="background-color:powderblue; color:black;">
                <tr>
                    <th>S.L No</th>
                   <th>Question</th>
                   <th>Answer</th>
                  <!-- <th>Options</th>-->

               </tr>
             </thead>

<?php


while($row=mysqli_fetch_object($result3))

{ //$ival=1;
    ?>

<tr>
               <td><?php echo $ival;?></td>                                                            
               <td><?php echo $row->question?></td>                                                            
               <td><?php echo $row->answer?></td>                                                            
                                                                          
                                                          
    <!--<td>
<a class="btn btn-success" href="manage_q.php?edit=<?php echo $row->id?>">Edit</a>
  <a class="btn btn-danger" href="manage_q.php?delete=<?php echo $row->id?>">Delete</a>
   </td>-->
        </tr>

<?php 
$ival++;

}
 
  ?>

</table></center>









<?php 
if(isset($_GET['edit']))
{
?><br>
    <h5 style="color:black;"><center><b> <i style="color:black;" class="fa fa-edit"></i> Edit Query </b></center></h5>


<form  action="" method="POST">

<input type="hidden" name="id" value="<?php echo $id; ?>">

        <center>Question:  <input style="margin-bottom:3px;display:inline-block; width:30%; " type="text" class="form-control"  placeholder="Reg No" name="question" value="<?php echo $question; ?>"  required></center>
        
         <center>Answer:  <input style="margin-bottom:3px;display:inline-block; width:30%;  " type="text" class="form-control"  placeholder="faculty Name" name="answer" value="<?php echo $answer; ?>" required></center>

        
        <br>


<?php 
if($update==true):?>
 <center> <input class="btn btn-warning" type="submit" name="update" value="Update" />
 </center> 

<?php endif;?>



</form>



<br>
<?php
}?>



                        </div>
                        <div class='card-body'>
                          <!--<center><textarea style="width:70%;" class="form-control" placeholder="Type here..." id="" name="" rows="2" cols="50"></textarea></center>-->
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

