<?php
// include './db/conn.php';
$server="localhost";
$username="root";
$password="";
$db="news_room";
$connect=mysqli_connect($server, $username, $password,$db);

global $connect;
function check_email($email){
    $sql="SELECT * FROM users WHERE email='$email'";

    $query= mysqli_query($connect, $sql);

    if($query){
      $item = mysqli_fetch_assoc($query);
      if($item){
        return true;
      }else{
        return false;
      }
    }
    return false;
}


?>