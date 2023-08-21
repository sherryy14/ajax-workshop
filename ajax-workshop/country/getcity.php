<?php 
$conn = mysqli_connect('localhost','root','','countrylist');

$countryID = $_POST['countryID']; 

 $city = "SELECT * FROM `cities` WHERE `country_id` = $countryID";
$res = mysqli_query($conn,$city);


 while($row =  mysqli_fetch_array($res)){
    echo "
    <option value='$row[id]'>$row[city]</option>
    ";
 }



?>