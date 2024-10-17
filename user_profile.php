<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user_profile.css">
  </head>
  <body>
  <div class="container">
    <div class="main-body">
        <div class="mb-2">
            <?php include('navbar.php') ?>
        </div>

    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-success ms-2 w-100">Edit</button>
                    <button class="btn btn-danger ms-2 w-100">Delete Account</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Kenneth Valdez
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      India
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Ropar
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number Blogs</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      12
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <h2>Your Blogs</h2>
              </div>
              <div class="row p-2 gutters-sm">
                <div class="card mb-3 mt-3">
                    <img height="350vw" src="img/blog1.jpg"
                    class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hello</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex placeat nihil dolorem voluptates ullam iste excepturi. Quos architecto numquam accusamus, vitae, aliquid excepturi, veniam hic dolores enim optio cum ipsa....</p>
                        <p class="card-text"><small class="text-muted">Friday, Mar 2 2024</small></p>
                    </div>
                    <a href="blog_view.php" class="btn btn-primary m-2">Read More</a>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>