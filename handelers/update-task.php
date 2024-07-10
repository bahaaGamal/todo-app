<?php 
session_start();
include("../core/functions.php");
include("../core/validations.php");

$conn = mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    echo "connect error " . mysqli_connect_error();
}



if(checkRequestMethod("POST") && checkPostInput("title")){

    $title = sanitizeInput($_POST['title']);
    $id = $_GET['id'];

    if(strlen($title) < 3){
        $_SESSION['errors'] = "title of task must be greater than 3 chars "; 
    }


    if(empty($_SESSION['errors'])){
        $sql = "UPDATE `tasks` SET `title`='$title' WHERE `id` = $id ";
        $result = mysqli_query($conn,$sql);
        if($result ){
            $_SESSION['success'] = "data updated succefully";
        }
    }else{
        redirect("../update.php");
        die;

    }


    // redirection 
    redirect("../index.php");
}