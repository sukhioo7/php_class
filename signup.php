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
    <title>Sign Up</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div class="mr-5 ml-5 p-3">
        <h1 class="text-center text-dark m-3">Sign Up</h1>
    <form method="POST" action="action.php" class="ml-5 pl-5 mr-5 pr-5">
    <?php
            if (isset($_COOKIE['signup-msg'])){
                if ($_COOKIE['signup-msg']=='value-error'){
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
        if (isset($_COOKIE['signup-msg'])){
            if ($_COOKIE['signup-msg']=='success'){
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hola :) </strong> Account Created successfuly.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php        
        }                    
        }
    ?>
        <div class="row">
            <div class="col">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" name="full_name" placeholder="First name">
            </div>
            <div class="col form-group">
                <label for="exampleFormControlSelect1">Designation</label>
                <select name="designation" class="form-control" id="exampleFormControlSelect1">
                    <option selected>Select</option>
                    <option value="doctor">Doctor</option>
                    <option value="nurse">Nurse</option>
                </select>
            </div>
        </div>
        <div class="form-group">
        <?php
            if (isset($_COOKIE['signup-msg'])){
                if ($_COOKIE['signup-msg']=='email-error'){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email Exist</strong> This email is already exist.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php        
                }                    
            }
        ?>
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <?php
                if (isset($_COOKIE['signup-msg'])){
                    if ($_COOKIE['signup-msg']=='password-error'){
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Password Not Matched</strong> Your Password is not matching with Confirm Password.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php        
                    }                    
                }
            ?>
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="signup" class="btn btn-primary w-100"><b>Sign Up</b></button>
    </form>
    </div>
</body>
</html>