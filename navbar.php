<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/hospital_logo.png" alt="Logo" width="30"  class="d-inline-block align-text-top">
      Doaba Hospital
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav-underline navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="patients.php">Patient</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
        </ul>
        <form method="POST" action="patients.php" class="d-flex" role="search">
          <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button name="search-btn" class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <?php
        session_start();
        if (isset($_SESSION['staff_id'])){
        ?>
          <a href="action.php?logout=1" class="btn btn-outline-danger ms-2 me-2">Logout</a>
        <?php
        }else{
        ?>
          <a href="signup.php" class="btn btn-outline-primary ms-2 me-2">Signup</a>
          <a href="login.php" class="btn btn-outline-dark me-2">Login</a>
        <?php
        }
        ?>
    </div>
  </div>
</nav>