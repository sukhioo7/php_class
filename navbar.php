<?php 
session_start();  
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="patient.php">Patient</a>
        </li>
        </ul>
        <form method="POST" action="patient.php" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="user_search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" name="search_patient" type="submit">Search</button>
        </form>
        <?php
            if (isset($_SESSION['emp_id'])){
        ?>
                <a class="btn btn-outline-danger ml-2" href="logout.php">Logout</a>
        <?php
        }else{
        ?>
                <a class="btn btn-outline-primary ml-2" href="signup.php">Sign Up</a>
                <a class="btn btn-outline-dark ml-2" href="login.php">Login</a>
        <?php
            }
        ?>
    </div>
</nav>