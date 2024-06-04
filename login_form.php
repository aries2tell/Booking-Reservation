<?php


@include 'config.php';


session_start();


$errors = [];


if(isset($_POST['submit'])){

   
    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    } else {
        $errors[] = 'Email is required!';
    }

   
    if(isset($_POST['password'])){
        $pass = md5($_POST['password']);
    } else {
        $errors[] = 'Password is required!';
    }

  
    if(empty($errors)){
        $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass' ";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);

           
            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                header('location: admin.php'); 
                exit(); 
            } elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                header('location: user.php'); 
                exit(); 
            }
        } else {
            $errors[] = 'Incorrect email or password!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

 
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

      * {
         font-family: 'Poppins', sans-serif;
         margin:0; padding:0;
         box-sizing: border-box;
         outline: none; border:none;
         text-decoration: none;
      }
    .form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background-image: url('bg.png');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
}
      .form-container form {
         padding:20px;
         border-radius: 5px;
         box-shadow: 0 5px 10px rgba(0,0,0,.1);
         background: #fff;
         text-align: center;
         width: 500px;
      }

      .form-container form h3 {
         font-size: 30px;
         text-transform: uppercase;
         margin-bottom: 10px;
         color:#333;
      }

      .form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:#313030;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: #858484;
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:#313030;
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: #313030;
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}


   </style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      // Display errors if any
      if(!empty($errors)){
         foreach($errors as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
   </form>

</div>

</body>
</html>
