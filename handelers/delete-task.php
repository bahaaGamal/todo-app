<?php
session_start();
include("../core/functions.php");
include("../core/validations.php");

//##################### Delete DATA #####################//


if(isset($_GET['id'])){
  $conn = mysqli_connect("localhost","root","","todoapp");

  if(!$conn){
    echo "Conncet Error" . mysqli_connect_error();
  }

  $id = $_GET['id'];

  $sql ="SELECT * FROM `tasks` WHERE `id` = '$id'";
  $result= mysqli_query($conn,$sql);
  $row = mysqli_fetch_row($result);
  if(!$row){
    $_SESSION['errors'] = "Data not found";
    redirect("../index.php");
    die;
  }else{
    $sql ="DELETE FROM `tasks` WHERE `id` = '$id'";
    $result= mysqli_query($conn,$sql);
    $_SESSION['success']= "data deleted successfully";
  }
  
  redirect("../index.php");
}