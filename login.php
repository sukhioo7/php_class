<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="mr-5 ml-5 p-3">
        <h1 class="text-center text-dark m-3">Login</h1>
    <form method="POST" action="action.php" class="ml-5 pl-5 mr-5 pr-5">
    <?php
            if (isset($_COOKIE['login-msg'])){
                if ($_COOKIE['login-msg']=='value-error'){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Empty Fields</strong> Please fill all the fields.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php        
                }                    
            }
        ?>
        <?php
            if (isset($_COOKIE['login-msg'])){
                if ($_COOKIE['login-msg']=='employee-error'){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid Details</strong> Your email or password in incorrect.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php        
                }                    
            }
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" pmlaceholder="Password">
        </div>
        <button name="login" type="submit" class="btn btn-success w-100"><b>Login</b></button>
    </form>
    </div>
</body>
</html>