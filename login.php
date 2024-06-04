<?php 
require_once 'controllers/authController.php'; 
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
            background-color: #f8f9fa;
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
        .form-div h3 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control-lg {
            border-radius: 5px;
        }
        .btn-block {
            border-radius: 5px;
        }
        .text-center {
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .form-div {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form action="login.php" method="post">
                    <h3 class="text-center">Login</h3>
                    <div class="form-group">
                        <label for="username">Username or email</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                   
                    <div class="form-group">
                        <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Login</button>
                    </div>

                    <p class="text-center">Not Registered? <a href="signup.php">Sign Up</a></p>

                    <p class="text-center"><a href="forgot_password.php">Forgot Password?</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
