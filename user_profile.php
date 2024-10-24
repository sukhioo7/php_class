<!doctype html>
<?php include('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user_profile.css">
    <link rel="stylesheet" href="css/navbar.css">
  </head>
  <body>
  <div class="container">
    <div class="main-body">
        <div class="mb-2">
            <?php include('navbar.php') ?>
        </div>
        <?php if (isset($_SESSION['user_id'])){

          $user_id = $_SESSION['user_id'];
          $select_user =  "select u.first_name, u.last_name,
          u.profile_image, u.city, u.country, u.email, u.user_id, count(b.blog_id) 
          as num_blogs  from blogs as b inner join users as u on
          b.published_by = u.user_id where u.user_id =$user_id";
          
          $raw_data = $conn->query($select_user);

          $user = $raw_data->fetch_assoc();
          // echo "<pre>";
          // print_r($user);
          // echo "</pre>";

        }else{ 
          header('location: login.php'); 
        }?>
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $user['profile_image']; ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $user['first_name'].' '.$user['last_name']; ?></h4>
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
                      <?php echo $user['first_name'].' '.$user['last_name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $user['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user['country']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user['city']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number Blogs</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user['num_blogs']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <h2>Your Blogs</h2>
              </div>
              <div class="row p-2 gutters-sm">
                <?php
                    $select_blogs = "select b.blog_id,b.blog_title, b.category, b.introduction,
                  b.sub_heading1, b.sub_heading2, b.sub_heading3, b.sub_heading4, 
                  b.content1, b.content2, b.content3, b.content4, b.post_date from blogs as b inner join users as u on
                  b.published_by = u.user_id where b.published_by=$user_id";

                    $result = $conn->query($select_blogs);

                    if ($result->num_rows>0){
                      while ($blog = $result->fetch_assoc()){
                        $random_number = random_int(1,6);
                        $imgage_path = "img/blog$random_number.jpg";
                      
                        $real_time = strtotime($blog['post_date']);
                ?>
                        <div class="card mb-3">
                          <img height="350vw" src="<?php echo $imgage_path ?>" 
                          class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $blog['blog_title'] ?></h5>
                            <p class="card-text"><?php echo substr($blog['introduction'],0,180) ?>...</p>
                            <p class="card-text"><small class="text-muted"><?php echo date('l, j M Y',$real_time); ?></small></p>
                          </div>
                          <a href="blog_view.php?blog_id=<?php echo $blog['blog_id'] ?>" class="btn btn-primary m-2">Read More</a>
                        </div>
                <?php
                      }
                    }

                ?>
              </div>



            </div>
          </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>