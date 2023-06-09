<?php 
session_start();
session_destroy();



$conn=mysqli_connect('localhost','root','','chatbox_db');
$connect=mysqli_connect('localhost','root','','chatbox_db');

$mysqli=new mysqli('localhost','root','','chatbox_db') or die(mysqli_error($mysqli));
mysqli_select_db($conn,'chatbox_db');
$mysqli->query("TRUNCATE TABLE conversations;");
$mysqli->query("TRUNCATE TABLE student_info;");

echo "<script> alert('Logout Successfull'); window.location.href='homepage.php'; </script>";
?>