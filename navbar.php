<?php session_start(); ?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fit Bande</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blogs.php">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
      </ul>
      <form class="d-flex" method="post" action="blogs.php" role="search">
        <input class="form-control me-2" name="user_search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search_btn" type="submit">Search</button>
      </form>
      <a href="add_blog.php" class="btn btn-outline-secondary ms-2">Add New Blog</a>
      <a href="login.php" class="btn btn-outline-primary ms-2">Login</a>
      <a href="signup.php" class="btn btn-primary ms-2">Signup</a>
      <div class="bg-danger rounded ps-3 pe-1 pt-1 pb-1 ms-2">
        <span href="#">
          <img src="<?php echo $_SESSION['profile_photo'] ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top bg-white" style="border-radius: 50%;">
          <a href="logout.php" class="btn ms-4 bg-white text-black ms-2">Logout</a>
        </span>
      </div>
    </div>
  </div>
</nav>

<!-- github.com/sukhioo7/php_class -->