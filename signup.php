<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful registration</title>
</head>
<body>
    <?php
    require_once("./db/conn.php");
    $errors = [];
   
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $created=date('y-m-d');

    $email_sql="SELECT email FROM users WHERE email ='$email'";
    $email_query = mysqli_query($connect,$email_sql);

    if(empty($firstname)){
        $errors['firstname'] = 'first name cannot be empty'.'<br>';
    }

    if(empty($lastname)){
        $errors['lastname'] = 'last name cannot be empty <br>';
    }

    if(empty($email)){
        $errors['email'] = 'email cannot be empty';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']= 'please enter a valid email address';
    }else if(mysqli_num_rows($email_query)){
        $errors['email'] = "<p style='color:red'>Email already exist !</p>";
    }

    if(empty($pass)){
        $errors['password'] = 'Password cannot be empty';
    }

    if(isset($errors)){
        foreach($errors as $error){
            echo $error;
        }
    }else{
        //register user
       
        $sql="INSERT INTO users (firstname, lastname, email, password, date_created) VALUE('$firstname', '$lastname', '$email', '$pass', '$created')";
        $query = mysqli_query($connect, $sql);
        if($query){
            echo "<h2>Registration successful</h2>";
        }        
    }

    
    ?>
</body>
</html>