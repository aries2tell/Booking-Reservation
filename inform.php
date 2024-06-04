<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
            <div class="col-md-4 offset-md-4 form-div">
                <div class="alert alert-warning">
                    This website collects your personal information. By proceeding to this website, you consent to the collection.
                </div>
                <form action="signup.php" method="post">
                    <div class="form-group">
                        <button type="submit" name="choice" value="yes" class="btn btn-primary btn-block btn-lg">Yes</button>
                    </div>
                </form>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <button type="submit" name="choice" value="no" class="btn btn-primary btn-block btn-lg">No</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
