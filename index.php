<!doctype html>
<?php include('connection.php') ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      .card>img{
          object-fit: cover;
          object-position: 0 0px;
      }
    </style>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
  </head>
  <body>
    <?php include('navbar.php') ?>
    <main class="container">
      <h1 class="text-center mt-5 mb-5">Latest Blogs</h1>
      <div class="latest-blog">
      <?php
            $select_blogs = "select * from blogs order by blog_id desc limit 3";

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
    </main>
    <?php include('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>