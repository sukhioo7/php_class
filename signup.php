<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">

  </head>
  <body>
    <nav>
      <?php include('navbar.php'); ?>
    </nav>
    <main>
        <h1 class="text-center text-dark mt-5 m-3">SIGN UP</h1>
        <div class="container w-50">
            <?php 
                if (isset($_COOKIE['error'])){
            ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error : </strong><?php echo $_COOKIE['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php  } ?>
            
            <?php 
                if (isset($_COOKIE['success'])){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success : </strong><?php echo $_COOKIE['success'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php  } ?>
            <form class="rounded p-4 mb-5 border w-80" enctype="multipart/form-data" action="action.php" method="post">
                <div class="form-floating mb-3">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="first_name" class="form-control" id="floatingInputGrid" placeholder="First Name">
                                <label for="floatingInputGrid">First Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="last_name" class="form-control" id="floatingInputGrid" placeholder="Last Name">
                                <label for="floatingInputGrid">Last Name</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating ">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="country" class="form-control" id="floatingInputGrid" placeholder="First Name">
                                <label for="floatingInputGrid">Country</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="city" class="form-control" id="floatingInputGrid" placeholder="Last Name">
                                <label for="floatingInputGrid">City</label>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="floatingInputGrid" class="mt-1 mb-1 text-end w-100">(Optional)</label>
                <div class="form-floating mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text bg-dark text-white" for="inputGroupFile01">Profile Photo</label>
                        <input name="profile_photo" type="file" class="form-control" id="inputGroupFile01">
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="confirm-password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <div class="mb-3">
                    <button type="submit" name="signup" class="btn btn-dark w-100">Sign up</button>
                </div>
            </form>
        </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>