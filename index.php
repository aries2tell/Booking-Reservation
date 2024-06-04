<?php 
require_once 'controllers/authController.php';

if(!isset($_SESSION['id'])){
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Login</title>

    <style>
          body {
          
            background-image: url('bg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .form-div {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <?php if(isset($_SESSION['message'])):?>
                    <div class="alert  <?php echo $_SESSION['alert-class']; ?>">
                        <?php 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                            unset($_SESSION['alert-class']);
                        ?>
                    </div>
                <?php endif?>   
                <h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

                

               <?php if(!$_SESSION['verified']):  ?>
                    <div class="alert alert-warning">
                        Welcome to  Reservation Website Just click the button 
                        to Proceed to the Collab Room / Study Room 
                        <form action="choices.php" method="post">
                            <div class="form-group">
                            <button  type="submit" name="go to rooms" class="btn btn-primary btn-block btn-lg">Go to Rooms</button>
                        </form>
                    </div>
                    </div>
                <?php endif;?>

                <?php if($_SESSION['verified']):  ?>
                    <button class="btn btn-block btn-lg btn-primary">I am verified!</button>
                <?php endif;?>

            </div>
        </div>
    </div>
</body>
</html>

