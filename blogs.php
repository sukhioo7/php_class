<!doctype html>
<html lang="en">
<?php include('connection.php'); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/blogs.css">
  </head>
  <body>
    <?php include('navbar.php') ?>

    <main class="main-div">
      <div class="blog-list">
        <?php
            $select_blogs = "select * from blogs";

            $result = $conn->query($select_blogs);

            if ($result->num_rows>0){
              while ($blog = $result->fetch_assoc()){
        ?>
                <div class="card mb-3">
                  <img src="https://thumbs.dreamstime.com/b/wooden-pathway-lush-green-tropical-jungle-sunlight-serene-nature-walk-concept-wooden-pathway-lush-green-322646384.jpg" 
                  class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
        <?php
              }
            }

        ?>

      </div>
      <div class="filter-list">
        bye
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>