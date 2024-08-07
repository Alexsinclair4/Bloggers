<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Update User's Password</title>
</head>
<body>
    <?php
     session_start();
    include('./db/conn.php');
     /* verifying Current Password From Database */
        $user_id=$_SESSION['user_id'];
        $old_pword =trim($_POST['old_pass']);
        $new_pword = $_POST['new_pass'];
        $confirm_pass = $_POST['new_confirm'];

        $encrypt_old = md5($old_pword);
        $sql="SELECT password FROM users WHERE users_Id='$user_id'";
        $query=mysqli_query($connect, $sql);
        $pass=mysqli_fetch_assoc($query);
        if($pass['password'] != $encrypt_old){
            echo "incorect password";
        }else{
            if($new_pword == $confirm_pass){
                $newPass = md5($new_pword);
                $upd_sql = "UPDATE users SET password = '$newPass' WHERE users_Id = '$user_id'";
                if(mysqli_query($connect,$upd_sql)){
                    echo "User password updated";
                }
            }else{
                echo "Password does not match";
            }
        }
    ?>  
    <div class="container-fluid">
        <div><h1>Update User's Password</h1></div>
    <div class="form-group">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="container">
            <label for="">Input Old Password</label>
            <input type="password" class="form-control" value="" name="old_pass">
            <label for="">Enter New Password</label>
            <input type="password" class="form-control" value="" name="new_pass">
            <label for="">Confirm New Password</label>
            <input type="password" class="form-control" value="" name="new_confirm">
            <button  button class="btn btn-lg btn-danger mt-3">Update</button>
        </form>
    </div>
    </div>
</body>
</html>