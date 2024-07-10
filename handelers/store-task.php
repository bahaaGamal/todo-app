<?php
session_start();
include("../core/functions.php");
include("../core/validations.php");

//##################### Insert DATA #####################//

$conn = mysqli_connect("localhost","root","","todoapp");

if(!$conn){
  echo "Conncet Error" . mysqli_connect_error();
}


if(checkRequestMethod("POST") && checkPostInput("title")){
 
  $title= sanitizeInput($_POST['title']);

  $sql ="INSERT INTO `tasks`(`title`) VALUES('$title')";
  
  $result= mysqli_query($conn,$sql);
  if(mysqli_affected_rows($conn) == 1){
    $_SESSION['success']= "data inserted successfully";
  }
  
  redirect("../index.php");
  
}