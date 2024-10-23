<!doctype html>
<?php include ('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view_blog.css">
    <link rel="stylesheet" href="css/navbar.css">
    <?php

        if (isset($_GET['blog_id'])){
            $id = $_GET['blog_id'];
            $random_number = random_int(1,6);
            $imgage_path = "img/blog$random_number.jpg";

            $select_query = "select b.blog_id,b.blog_title, b.category, b.introduction,
              b.sub_heading1, b.sub_heading2, b.sub_heading3, b.sub_heading4, 
              b.content1, b.content2, b.content3, b.content4, b.post_date, u.first_name, u.last_name,
              u.profile_image, u.user_id  from blogs as b inner join users as u on
              b.published_by = u.user_id where b.blog_id =$id";

            $result = $conn->query($select_query);

            if ($result->num_rows>0){
                $blog = $result->fetch_assoc();
            } else {
                header('Location: blogs.php');
            }
        }

    ?>
    <style>
        .blog-header {
            background-image: url(<?php echo $imgage_path ?>);
            background-size: cover;
        }
    </style>
  </head>
  <body>
    <nav>
      <?php include('navbar.php'); ?>
    </nav>
    <main>
        <div class="blog-header">
            <H1><?php echo $blog['blog_title'] ?></H1>
        </div>
        <?php if (isset($_SESSION['user_id'])){
                if ($_SESSION['user_id'] == $blog['user_id']){ ?>
                <div class="container edit-btn">
                    <a class="btn btn-success" href="update.php?update_id=<?php echo $blog['blog_id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="action.php?delete_id=<?php echo $blog['blog_id'] ?>">Delete</a>
                </div>
        <?php } } ?>
        <div class="blog-content mt-5 mb-5 container">
            <h3>Introduction</h3>
            <p><?php echo $blog['introduction'] ?></p>
            <h3><?php echo $blog['sub_heading1'] ?></h3>
            <p><?php echo $blog['content1'] ?></p>
            <h3><?php echo $blog['sub_heading2'] ?></h3>
            <p><?php echo $blog['content2'] ?></p>
            <h3><?php echo $blog['sub_heading3'] ?></h3>
            <p><?php echo $blog['content3'] ?></p>
            <h3><?php echo $blog['sub_heading4'] ?></h3>
            <p><?php echo $blog['content4'] ?></p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>