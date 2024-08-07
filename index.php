<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
     <title>Blogger</title>
</head>
<body>
  <?php
      include('./db/conn.php');
      include('./includes/nav.php');
      $sql="SELECT post_Id, title, category, CONCAT(firstname,' ', lastname) AS fullname, content, post.date_created FROM post INNER JOIN users ON post.post_Id=users.users_Id ORDER BY post.date_created DESC";
      $query=mysqli_query($connect, $sql);
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
      <?php 
        if($query){
          while($data=mysqli_fetch_assoc($query)){
        ?>
         <div class="wrapper">
          <a href="<?php echo "single-post.php?id=".$data['post_Id']; ?>"><h2 class="title"><?php echo $data['title'];  ?></h2></a>
          <p class="content"><?php echo $data['content'];?></p>
           <div class="author">
               <p class="author-txt">Post written by <span><?php echo $data['fullname']; ?></span></p>
           </div>
         </div>
        <?php
          }
        }else{
          echo "no post";
        }      
      ?>
      </div>
      </div>
    </div>
</body>
</html>

