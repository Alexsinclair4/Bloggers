<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
    <style>
    .form-container{
        border: 2px solid green;
        background-color:skyblue;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: large;
        font-weight: bold;
        color: brown;
        width:500px;
        margin:auto;
        padding:30px 15px
    }
    .form-box{margin-top:150px;}
    button:hover{border-radius:10px;}
    h1{text-align:center;}
    tr{
        margin:30px 0px
    }
    body{background-color:wheat; color:brown; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}
    h2{text-align:center;}
    </style>
</head>
<body>
    <h2>Bloggers' Registration Page</h2>
    <div class="container">
      <div class="form-box">
       <form action="signup.php" class="form-container" method="post">
       <h1>Registration Page</h1>
        <table>m
            <tr>
                <td>
                <label>First Name</label>
                </td>
                <td>
                <input type="fullname" class="form-control" name="firstname">
                </td>
            </tr>
            <tr>
                <td>
                <label>Last Name</label>
                </td>
                <td>
                <input type="Lastname" class="form-control" name="lastname">
                </td>
            </tr>
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
        <button button class="btn btn-ig btn-danger">Submit</button>
       </form>
      </div>
    </div>
</body>
</html>