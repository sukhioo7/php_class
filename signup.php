<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body>div>div{
            background-color: #F1F1F1;
            border-radius:15px;
        }
    </style>
    <title>Hospital | Login</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <div>
        <h1 class="text-center">Sign Up</h1>
        <div class="m-5 p-5">
            <form action="action.php" method="POST">
                <?php
                    if (isset($_COOKIE['success'])){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Account Created!</strong> Hola ;).
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    }
                ?>
                <?php
                    if (isset($_COOKIE['error'])){
                    if ($_COOKIE['error']=='empty-fields'){
                ?>                    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Empty Feilds!</strong> Please Fill all the fields.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    }
                    }
                ?>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First name" name="first_name" aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last name" name="last_name" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Designation</label>
                        <select class="form-select" name="designation" aria-label="Designation">
                            <option selected>Select One</option>
                            <option value="doctor">Doctor</option>
                            <option value="nurse">Nurse</option>
                        </select>
                    </div>
                </div>
                <?php
                    if (isset($_COOKIE['error'])){
                        if ($_COOKIE['error']=='email-exist'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email Exist!</strong> This Email is already in use.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                        }
                    }
                ?>
                <?php
                    if (isset($_COOKIE['error'])){
                        if ($_COOKIE['error']=='phone-exist'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Phone Exist!</strong> This Phone is already in use.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                        }
                    }
                ?>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" placeholder="Email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Phone" aria-label="Phone">
                    </div>
                </div>
                <?php
                    if (isset($_COOKIE['error'])){
                        if ($_COOKIE['error']=='password'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password Mismatched!</strong> Password do not matched.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                        }
                    }
                ?>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <button type="submit" name="signup" class="mt-3 btn btn-outline-success w-100">Signup</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>