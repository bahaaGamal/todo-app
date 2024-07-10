<?php

//##################### Create Database #####################//

$conn = mysqli_connect("localhost","root","");

if(!$conn){
  echo "Conncet Error" . mysqli_connect_error();
}

$sql ="CREATE DATABASE IF NOT EXISTS todoapp";

mysqli_query($conn,$sql);

mysqli_close($conn);


//##################### Create Tables #####################//

$conn = mysqli_connect("localhost","root","","todoapp");

if(!$conn){
  echo "Conncet Error" . mysqli_connect_error();
}

$sql ="CREATE Table IF NOT EXISTS tasks(
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(150) NOT NULL
)";

mysqli_query($conn,$sql);

mysqli_close($conn);

echo "<pre>";
var_dump($conn);
