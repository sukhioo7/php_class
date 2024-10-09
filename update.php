<!doctype html>
<?php include('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="container mb-5 ">
        <h1 class="text-center text-dark mt-5 mb-3">Update Blog</h1>
        <div class="blog-form border rounded p-5 ">
        <?php

            if (isset($_GET['update_id'])){
                $blog_id = $_GET['update_id'];

                $select_query = "select * from blogs where blog_id=$blog_id";

                $result = $conn->query($select_query);

                if ($result->num_rows>0){
                    $blog = $result->fetch_assoc();
                } else {
                    header('Location: blogs.php');
                }
            }

        ?>
        <form action="action.php" method="POST" class="form-floating">
            <div class="form-floating mb-3">
                <input name="blog_title" type="text" value="<?php echo $blog['blog_title'] ?>" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Blog Title</label>
            </div>
            <div class="mb-3">
                <select name="category" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Category</option>
                    <option value="Weight Loss">Weight Loss</option>
                    <option value="Weight Gain">Weight Gain</option>
                    <option value="Food">Food</option>
                    <option value="Food">Health</option>
                    <option value="Food">Muscle Gain</option>
                    <option value="Food">Yoga</option>
                </select>
            </div>
            <div class="form-floating mb-3">
                <textarea name="introduction" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"><?php echo $blog['introduction'] ?></textarea>
                <label for="floatingTextarea2">Introduction</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading1" value="<?php echo $blog['sub_heading1'] ?>" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content1" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"><?php echo $blog['content1'] ?></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading2" value="<?php echo $blog['sub_heading2'] ?>" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content2" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"><?php echo $blog['content2'] ?></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading3" value="<?php echo $blog['sub_heading3'] ?>" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content3" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"><?php echo $blog['content3'] ?></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading4" value="<?php echo $blog['sub_heading4'] ?>" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"><?php echo $blog['content4'] ?></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <button name="update_blog_btn" class="btn btn-dark w-100">Update</button>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>