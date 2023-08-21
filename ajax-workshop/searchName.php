<?php 

$connection = mysqli_connect('localhost','root','','workshop');
 
$name = $_POST['name'];

$fetch = "SELECT * FROM `ajax` WHERE `name` LIKE '%$name%' ";
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