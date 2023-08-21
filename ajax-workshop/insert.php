<?php 

$connection = mysqli_connect('localhost','root','','workshop');


$name = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];
$city = $_POST['city'];


$insert = "INSERT INTO `ajax` (`name`, `email`, `age`,`city`) VALUES ('$name', '$email', '$age','$city')";
mysqli_query($connection, $insert);

?>