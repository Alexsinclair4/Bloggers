<?php
$server="localhost";
$username="root";
$password="";
$db="news_room";

$connect=mysqli_connect($server, $username, $password,$db);
    if(!$connect){
        echo "unable to connect " . mysqli_connect_error();
    }
?>