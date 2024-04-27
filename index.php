<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="nav-section">
        <div class="side-img">
            <img src="img/hospital.svg" alt="">
        </div>
        <div>
            <h1>Stay Safe, Stay Healthy</h1>
            <p>Welcome to our hospital's registration website. We offer a wide range of services, 
                including inpatient and outpatient care, surgery, and diagnostic testing. To 
                register for an appointment, please visit our website and provide some basic 
                information. We also offer online bill pay, medical records requests, and patient 
                education resources. We hope you find our website helpful.</p>
            <a href="#reg" class="btn btn-outline-danger">Book Appointment</a>
        </div>
    </div>
    <div id="reg" class="registration">
        <div class="registration-img">
            <h2>Book <span>Appointment</span></h2>
            <img src="img/registration-img.svg" alt="">
        </div>
        <div class="registration-form">
        <form action="action.php" enctype="multipart/form-data" method="POST" class="row g-3">
            <?php
                if (isset($_COOKIE['success'])){
            ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Patient Registered!</strong> Registration Done ;).
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                }
            ?>
            <?php
                if (isset($_COOKIE['error'])){
                  if ($_COOKIE['error']=='empty-fields'){
            ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Empty Feilds!</strong> Please Fill all the fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php
                  }
                }
            ?>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Full Name</label>
              <input name="full_name" type="text" class="form-control" id="inputEmail4" placeholder="Ex : John Cina">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Age</label>
              <input name="age" type="number" class="form-control" id="inputPassword4" placeholder="Ex : 34">
            </div>
            <div class="col-12">
              <?php
                  if (isset($_COOKIE['error'])){
                    if ($_COOKIE['error']=='email-exist'){
              ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Email Exist!</strong> This Email is already in use.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              <?php
                    }
                  }
              ?>
              <label for="inputAddress" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="inputAddress" placeholder="Ex : john@gmail.com">
            </div>
            <div class="col-12">
            <?php
                  if (isset($_COOKIE['error'])){
                    if ($_COOKIE['error']=='phone-exist'){
              ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Phone Exist!</strong> This Phone is already in use.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              <?php
                    }
                  }
              ?>
              <label for="inputAddress2" class="form-label">Phone</label>
              <input name="phone" type="number" class="form-control" id="inputAddress2" placeholder="Ex : xxxxxxxx87">
            </div>
            <div class="col-md-7">
              <label for="inputCity" class="form-label">City</label>
              <input name="city" type="text" class="form-control" id="inputCity" placeholder="Ex : CHD">
            </div>
            <div class="col-md-5">
              <label for="inputCity" class="form-label">Gender</label>
              <div>
                <input type="radio" class="btn-check" name="gender" value="Male" id="option5" autocomplete="off" checked>
                <label class="btn" for="option5">Male</label>
                <input type="radio" class="btn-check" name="gender" value="Female" id="option6" autocomplete="off">
                <label class="btn" for="option6">Female</label>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="formFile" class="form-label">Patient Image</label>
                <input name="image" class="form-control" type="file" id="formFile">
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea name="symptoms" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Symptoms</label>
              </div>
            </div>
            <div class="col-12">
              <button name="registration" type="submit" class="btn w-100 btn-danger">Registration</button>
            </div>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>