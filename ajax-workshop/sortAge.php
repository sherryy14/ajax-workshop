<?php 

$connection = mysqli_connect('localhost','root','','workshop');
 
$age = $_POST['age'];

$fetch = "SELECT * FROM `ajax` ORDER BY `age` $age ";
$result = mysqli_query($connection, $fetch);

$output = '';

while($row = mysqli_fetch_assoc($result)){
    $output .= "
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[email]</td>
    <td>$row[city]</td>
    <td>$row[age]</td>
</tr>
    ";
}

echo $output;



?>