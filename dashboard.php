<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<?php 
            session_start();
            if($_SESSION['user_id']==null){
              header("location: login.php");
            }
             ?>
<nav>
    <a href="index.php" class='logo'>Blogger</a>
    <div class="container1">          
       <ul>
          <li><a href="posts.php">Create Post</a></li>
          <li><a href="update users.php">Users</a></li>
          <li><a href="logout.php">log out</a></li>
        </ul>
    </div>
</nav>
    <section>
        <div class="container-fluid">
           <h2><?php echo "welcome ".$_SESSION['firstname'];  ?> </h2>
        </div>
        <h2>login successfull</h2>
    </section>
</body>
</html>