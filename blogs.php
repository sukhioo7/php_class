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
              $select_blogs = "select b.blog_id,b.blog_title, b.category, b.introduction,
              b.sub_heading1, b.sub_heading2, b.sub_heading3, b.sub_heading4, 
              b.content1, b.content2, b.content3, b.content4, b.post_date, u.first_name, u.last_name,
              u.profile_image  from blogs as b inner join users as u on
              b.published_by = u.user_id";
            }

            $result = $conn->query($select_blogs);

            if ($result->num_rows>0){
              while ($blog = $result->fetch_assoc()){
                // echo "<pre>";
                // print_r($blog);
                // echo "</pre>";
                $random_number = random_int(1,6);
                $imgage_path = "img/blog$random_number.jpg";
               
                $real_time = strtotime($blog['post_date']);
        ?>
          <div class="blog-container">
            
            <div class="blog-header">
              <div style="background: url('<?php echo $imgage_path ?>');  background-size: cover;"  class="blog-cover">
                <div class="blog-author">
                  <h3 style='background: url("<?php echo $blog['profile_image']; ?>"); 
                  background-size: cover; 
                  border-radius: 50%;
                  content: " "; 
                  display: inline-block;
                  height: 32px;
                  margin-right: .5rem;
                  position: relative;
                  top: 8px;
                  width: 32px;'><span class="ms-5 mt-5 w-100"><?php echo $blog['first_name'].' '.$blog['last_name']; ?></span></h3>
                </div>
              </div>
            </div>

            <div class="blog-body">
              <div class="blog-title">
                <h1><a href="blog_view.php?blog_id=<?php echo $blog['blog_id'] ?>"><?php echo $blog['blog_title'] ?></a></h1>
              </div>
              <div class="blog-summary">
                <p><?php echo substr($blog['introduction'],0,180) ?>...</p>
              </div>
              <div class="blog-tags">
                <ul>
                  <li class="border text-secondary p-1 rounded"><?php echo $blog['category'] ?></li>
                </ul>
              </div>
            </div>
            
            <div class="blog-footer">
              <ul>
                <li class="published-date"><?php echo date('l, j M Y',$real_time); ?></li>
              </ul>
            </div>

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