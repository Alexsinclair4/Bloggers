<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
  body{background-color:wheat;}
  .container1{display:flex; justify-content:center; align-items:center; height:100vh; background-color:skyblue}
  h2{text-align:center; color:brown; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}
</style>
</head>
<body>
  <div>
    <nav>
      <a href="index.php" class="logo">Bloggers</a>
      <ul>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <ul>
        <li><a href="change password.php">Update Password</a></li>
      </ul>
    </nav>
  </div>
  <?php
  session_start();
  if($_SESSION['user_id']==NULL){
    header('location:login.php');
  }
  /* Retrieve Id From The Current User */ 
  $user_id=$_SESSION['user_id'];
  $query="SELECT * FROM users WHERE users_Id = $user_id";
  include('db/conn.php');
  $result=mysqli_query($connect, $query);
  $user_data=mysqli_fetch_array($result);
  ?>
 <form action="users.php" method="post" class="container">
       <h2>Edit Profile Page</h2>
       <div class="form-group">
       <form>
       <label>firstname</label><input type='text' class='form-control' value="<?php echo $user_data['firstname'];?>">
       <label>lastname</label><input type='text' class='form-control' value="<?php echo $user_data['lastname'];?>">
       <label>email</label><input type='email' class='form-control' value="<?php echo $user_data['email'];?>">
      </form>
      <button button class="btn btn-ig btn-danger" value="update">Update</button>
       </div>
       </form>
       <?php
       /* Update The Database With New Information */
  if(isset($_SERVER['PHP-SELF']) && $_SERVER['REQUEST METHOD'] == 'POST'){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $sql="UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', WHERE id=$user_id";
    $query=mysqli_query($connect, $sql);
     if($query){
       header("location:single-post.php");
     }else{
       echo 'unable to update';
     }
   }
   ?>
</body>
</html>