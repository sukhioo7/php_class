<!doctype html>
<html lang="en">
<?php include('connection.php'); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/blogs.css">
    <link rel="stylesheet" href="css/navbar.css">
  </head>
  <body>
    <?php include('navbar.php') ?>

    <main class="main-div">
      <div class="blog-list">
        <?php
            if (isset($_POST['search_btn'])){
              $search = $_POST['user_search'];
              $select_blogs = "select * from blogs where blog_title like '%$search%' or  introduction like '%$search%' or
              sub_heading1 like '%$search%' or sub_heading2 like '%$search%' or sub_heading3 like '%$search%' or
              sub_heading4 like '%$search%'";
            }else{
              $select_blogs = "select * from blogs";
            }

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
      <div class="filter-list">
          <h2>Filters</h2>
          <div class="filter-container">
            <form class="mt-4">
              <div class="col-md-4 w-100 mb-2">
                <label for="inputState" class="form-label">Category</label>
                <select id="inputState" class="form-select">
                  <option selected>Choose...</option>
                  <option value="Weight Loss">Weight Loss</option>
                    <option value="Weight Gain">Weight Gain</option>
                    <option value="Food">Food</option>
                    <option value="Food">Health</option>
                    <option value="Food">Muscle Gain</option>
                    <option value="Food">Yoga</option>
                </select>
              </div>
              <div class="col-md-4 w-100 mt-4 mb-3">
                <div class="row">
                  <div class="col">
                    <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off" checked>
                    <label class="btn" for="option5">Ascending</label>  
                  </div>
                  <div class="col">
                    <input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off">
                    <label class="btn" for="option6">Descending</label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
          </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>