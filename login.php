<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
    <style>
    .xixi{
        border: 2px solid green;
        background-color:skyblue;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: large;
        font-weight: bold;
        color: brown;}
    .form-control{border-radius:5px;}
    button:hover{border-radius:10px;}
    .container{display:flex; justify-content: center; align-items:center;}
    h1{text-align:center;}
    h2{text-align:center; color:brown; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}
    body{background-color:wheat}
    </style>
</head>
<body>
<?php 
            session_start();
            if(!empty($_SESSION['user_id'])){
              header("location: dashboard.php");
            }
             ?>
        <h2>Bloggers' Login Page</h2>
    <form class="container" method="post" action="signin.php">
        <div class="xixi">
        <h1>Log In</h1>
        <table>
            <tr>
                <td>
                <label>Email</label>
                </td>
                <td>
                <input type="email" class="form-control" name="email">
                </td>
            </tr>
            <tr>
                <td>
                <label>Password</label>
                </td>
                <td>
                <input type="password" class="form-control" name="password">
                </td>
            </tr>
        </table>
           <button class="btn btn-ig btn-danger" name='submit'>Submit</button>
        </div>
        </div>
    </form>
    <a href="/bloggers" style='color:blue;font-size:20px;'>click here to go to home page</a>
</body>
</html>