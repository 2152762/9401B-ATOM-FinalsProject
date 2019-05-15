<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAMCIS Petition</title>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <style type="text/css">
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-form">
    <form action="register.php" method="post">
        <h2 class="text-center">Sign Up</h2>
        <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="idno" class="form-control" placeholder="ID Number" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="course" class="form-control" placeholder="Course" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </div>
        <div class="clearfix text-center">
            <a href="signup.php">Login</a>
        </div>
    </form>
</div>
</body>
</html>