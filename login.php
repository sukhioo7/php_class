<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/signup.css">
  </head>
  <body>
    <nav>
        <?php include('navbar.php'); ?>
    </nav>
    <main>
    <div class='patient-form'>
        <h2 class='text-center m-2'>Login</h2>
        <form action="action.php" method='post' class='m-3'>
          <input type="hidden" name='id'  >
          <div class='container mt-3'>
        
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="email"  class="form-control"  name='email' id="floatingInput" placeholder="Ex : netmax@gmail.com">
                  <label for="floatingInput">Email</label>
                </div>
              </div>
            </div>
            <!-- Phone Number row  -->
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="password"  class="form-control"  name='phone' id="floatingInput" placeholder="Ex : 4535643673">
                  <label for="floatingInput">Password</label>
                </div>
              </div>
            </div>

            <!-- Phone image,city,gender row  -->
            
            <div class='row'>
                <div class='col'>
                  <button name='login' class='btn btn-outline-dark w-100 mt-2'>Login</button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>