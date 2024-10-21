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
      <form class="d-flex me-3" method="post" action="blogs.php" role="search">
        <input class="form-control me-2" name="user_search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search_btn" type="submit">Search</button>
      </form>
    </div>
    <?php if (isset($_SESSION['user_id'])){ ?>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="profile-pic">
                <img src="<?php echo $_SESSION['profile_photo'] ?>" alt="Profile Picture">
            </div>
        <!-- You can also use icon as follows: -->
          <!--  <i class="fas fa-user"></i> -->
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="add_blog.php"><i class="fas fa-cog fa-fw"></i> Add New Blog</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-sliders-h fa-fw"></i> Account</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
          </ul>
        </li>
    </ul>
    <?php }else { ?>
      <a href="login.php" class="btn btn-outline-primary ms-2">Login</a>
      <a href="signup.php" class="btn btn-primary ms-2">Signup</a>
    <?php } ?>
  </div>
</nav>

<!-- github.com/sukhioo7/php_class -->