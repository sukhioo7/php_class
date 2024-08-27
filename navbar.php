<?php session_start(); ?>
<div class='header'>
        <h3> <span class='logo-img'><img src="img/logo.png" alt=""></span> Doaba Hospital</h3>
        <div class='nav-links'>
          <a href="index.php">Home</a>
          <a href="about.php">About</a>
          <a href="contact.php">Contact Us</a>
          <a href="">Doctos</a>
          <a href="patients.php">Patients</a>
        </div>
        <div class="log-sign">
          <?php
            
            if (isset($_SESSION['emp_id'])){
          ?>
            <a class="bg-danger" href="logout.php">Logout</a>
          <?php  }else{
          ?>  
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
          <?php }?>
        </div>
</div>
<div class="search">
    <form action="patients.php" method="post">
        <input name="search" type="text" placeholder='Search for patients...'>
        <button name="search-btn">Search</button>
    </form>
</div>