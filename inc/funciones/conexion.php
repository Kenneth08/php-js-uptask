<?php
$conn = new mysqli('localhost','root','root','uptask','3307');
if($conn->connect_error){
    echo $conn->connect_error;
}
$conn->set_charset(uft8);
/*echo "<pre>";
var_dump($conn->ping());
echo "</pre>";*/