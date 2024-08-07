<?php
include_once 'db/conn.php';
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $sql="SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $query=mysqli_query($connect, $sql);
    if($query){
        session_start();
        $data=mysqli_fetch_assoc($query);
        if($data != null){
            session_start();
            header("location: dashboard.php");
            $_SESSION['firstname'] = $data['firstname'];
            $_SESSION['lastname'] = $data['lastname'];
            $_SESSION['user_id'] = $data['users_Id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['date_created'] = $data['date_created'];
        }else{
            echo 'wrong email and password';
        }
    }