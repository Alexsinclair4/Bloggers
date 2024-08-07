<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
      include('./db/conn.php');
      include('./includes/nav.php');

      $post_id = $_GET['id'];
      $sql="SELECT post_Id, title, category, CONCAT(firstname,' ', lastname) AS fullname, content, post.date_created FROM post INNER JOIN users ON post.post_Id=users.users_Id WHERE post.post_Id ='$post_id'" ;
      $query=mysqli_query($connect, $sql);
      $data = mysqli_fetch_assoc($query);
      //print_r($data);    
 ?>
 <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="wrapper">
                <h2 class="title"><?php echo $data['title'];  ?></h2>
                <p class="post-content"><?php echo $data['content'];  ?></p>
                <div class="author">
                   <p class="author-txt">Post written by <span><?php echo $data['fullname']; ?></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>
   
</body>
</html>
