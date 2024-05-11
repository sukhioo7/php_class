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
        <h1 class="text-center">Login</h1>
        <div class="m-5 p-5">
            <form method="POST" action="action.php">
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
                <?php
                    if (isset($_COOKIE['error'])){
                        if ($_COOKIE['error']=='incorrect'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Details Mismatched!</strong> Username or Password is Incorrect.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                        }
                    }
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-outline-success w-100">Login</button>
            </form>
        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>