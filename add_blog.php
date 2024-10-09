<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="container mb-5 ">
        <h1 class="text-center text-dark mt-5 mb-3">Add Blog</h1>
        <div class="blog-form border rounded p-5 ">
        <form action="action.php" method="POST" class="form-floating">
            <div class="form-floating mb-3">
                <input name="blog_title" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Blog Title</label>
            </div>
            <div class="mb-3">
                <select name="category" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Category</option>
                    <option value="Weight Loss">Weight Loss</option>
                    <option value="Weight Gain">Weight Gain</option>
                    <option value="Food">Food</option>
                    <option value="Health">Health</option>
                    <option value="Muscle Gain">Muscle Gain</option>
                    <option value="Yoga">Yoga</option>
                </select>
            </div>
            <div class="form-floating mb-3">
                <textarea name="introduction" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
                <label for="floatingTextarea2">Introduction</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading1" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content1" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading2" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content2" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading3" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content3" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <div class="form-floating mb-3">
                <input name="sub_heading4" type="text" class="form-control" id="floatingPassword" placeholder="Introduction">
                <label for="floatingPassword">Sub Heading</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="content4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px"></textarea>
                <label for="floatingTextarea2">Content</label>
            </div>
            <button name="add_blog_btn" class="btn btn-dark w-100">Submit</button>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>