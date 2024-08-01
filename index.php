<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <nav>
      <div class='header'>
        <h3> <span class='logo-img'><img src="img/logo.png" alt=""></span> Doaba Hospital</h3>
        <div class='nav-links'>
          <a href="">Home</a>
          <a href="">About</a>
          <a href="">Contact Us</a>
          <a href="">Doctos</a>
          <a href="">Patients</a>
        </div>
      </div>
      <div class='nav-main'>

        <div class='nav-content'>
            <h1>Wellcome</h1>
            <p>This hospital was started by Dr. Ashutosh Gupta, M.D, in the year 1988 at a much smallerplace with only paediatric and gynae deparments. He decided to move to the present premises,known to be one of the largest hospital premises in the town, after getting positive response from the patients his dedication and enthusiasm encouraged him to gradually add other facilities namely Paediatric surgery, Neuro surgery,General surgery, Orthopaedics, Medicine, ENT, Eye and Dental in order to provide super specialised facilities under one roof.</p>
        </div>
        <div class='nav-img'>
          <div class="glass">

          </div>
            <img src="img/doc.png" alt="">
        </div>
      </div>
    </nav>
    <main>
      <div class='patient-form'>
        <h2 class='text-center m-2'>Patient Registeration</h2>
        <form action="action.php" method='post' class='m-3'>
          <div class='container mt-3'>
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="text" class="form-control" id="floatingInput" name='full_name' placeholder="Ex : John Cina">
                  <label for="floatingInput">Full Name</label>
                </div>
              </div>
              <div class='col'>
                <div class="form-floating col-md">
                  <input type="number" class="form-control" name='age' id="floatingPassword" placeholder="Ex : 23">
                  <label for="floatingPassword">Age</label>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="email" class="form-control" name='email' id="floatingInput" placeholder="Ex : netmax@gmail.com">
                  <label for="floatingInput">Email</label>
                </div>
              </div>
            </div>
            <!-- Phone Number row  -->
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="number" class="form-control" name='phone' id="floatingInput" placeholder="Ex : 4535643673">
                  <label for="floatingInput">Phone</label>
                </div>
              </div>
            </div>
            <!-- Phone image,city,gender row  -->
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="text" class="form-control" name='city' id="floatingInput" placeholder="Ex : CHD">
                  <label for="floatingInput">City</label>
                </div>
              </div>
              <div class='col d-flex align-items-center'>
                <div>
                  <!-- <label for="formFileLg" class="form-label">Large file input example</label> -->
                  <input class="form-control form-control-lg" id="formFileLg" type="file">
                </div>
              </div>
              <div class='col'>
                <div class="form-floating">
                  <select name='gender' class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <label for="floatingSelect">Gender</label>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <div class="form-floating">
                  <textarea name='symptoms' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Symptoms</label>
                </div>
              </div>
            </div>
            <div class='row'>
                <div class='col'>
                  <button name='patient_register' class='btn btn-outline-dark w-100 mt-2'>Register</button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>