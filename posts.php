<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<style>
  .form-box{
    width:700px;
    margin:auto;
    background:#bfdccc;
    padding:100px 50px;
  }
</style>
<body>
  <div>
    <nav>
    <a href="index.php" class='logo'>Blogger</a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="update users.php">Users</a></li>
      </ul>
    </nav>
  </div>
<?php
session_start();
if($_SESSION['user_id']==null){
  header("location: login.php");
}else{
    echo "welcome ".$_SESSION['firstname'];
}
include_once 'db/conn.php';
$category_sql="SELECT * FROM categories";
$category_query=mysqli_query($connect, $category_sql);
if(isset($_SERVER['PHP_SELF']) && $_SERVER['REQUEST_METHOD']=='POST'){
  $category=$_POST['category'];
  $title=$_POST['title'];
  $user_id=$_SESSION['user_id'];
  $content=$_POST['content'];
  $date_created=date('Y-m-d');
  $post_photo = $_FILES['post_photo']['name'];
  $photo_dir = 'uploads/'. $post_photo;
  $photo_name = $_FILES['post_photo']['tmp_name'];
  if(move_uploaded_file($photo_name,$photo_dir)){
    $sql="INSERT INTO post(category, user_Id, title, content, date_created, photo) VALUES('$category', '$user_id', '$title', '$content', '$date_created','$photo_dir')";
    $query=mysqli_query($connect, $sql);
    if($query){
      header('location:dashboard.php');
    }else{
        echo "error while making post";
      }
  }
}
?>
  <div class="container-fluid">
    <h2>Create post</h2>
    <div class="form-box">
      <div class="form-group">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Post title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Post Category</label>
            <select name="category" class="form-control">
              <?php
              while($fetch = mysqli_fetch_assoc($category_query)){
                ?>
                 <option value="<?php echo $fetch['category_Id']; ?>"> <?php echo $fetch['category']; ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Photo Image</label>
            <input type="file" name="post_photo" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Post content</label>
            <textarea name="content" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-lg btn-success">Create Post</button>
        </form>
      </div>
    </div>
  </div> 
</body>
</html>