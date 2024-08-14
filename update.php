<!doctype html>
<?php include('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <nav>
      <?php include('navbar.php'); ?>  
    </nav>
    <main>
      <div class='patient-form'>
        <h2 class='text-center m-2'>Update Patient</h2>
        <?php
            if (isset($_GET['patient_id'])){
                $id = $_GET['patient_id'];
                
                $select_patient = "select * from patients where patient_id=$id;";

                $raw_patient = mysqli_query($response,$select_patient);

                $patient = mysqli_fetch_assoc($raw_patient);

            }

        ?>
        <form action="action.php" method='post' class='m-3'>
          <input type="hidden" name='id' value="<?php echo $patient['patient_id'] ?>" >
          <div class='container mt-3'>
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="text" class="form-control" value="<?php echo $patient['patient_name'] ?>" id="floatingInput" name='full_name' placeholder="Ex : John Cina">
                  <label for="floatingInput">Full Name</label>
                </div>
              </div>
              <div class='col'>
                <div class="form-floating col-md">
                  <input type="number" class="form-control" value="<?php echo $patient['patient_age'] ?>" name='age' id="floatingPassword" placeholder="Ex : 23">
                  <label for="floatingPassword">Age</label>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <!-- <p><?php echo $patient['patient_email'] ?></p> -->
                  <input readonly type="email" style="border: 1px solid red;" class="form-control" value="<?php echo $patient['patient_email'] ?>" name='email' id="floatingInput" placeholder="Ex : netmax@gmail.com">
                  <label for="floatingInput">Email (View Only)</label>
                </div>
              </div>
            </div>
            <!-- Phone Number row  -->
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input readonly type="number"  style="border: 1px solid red;"  class="form-control" value="<?php echo $patient['patient_phone'] ?>" name='phone' id="floatingInput" placeholder="Ex : 4535643673">
                  <label for="floatingInput">Phone  (View Only)</label>
                </div>
              </div>
            </div>
            <!-- Phone image,city,gender row  -->
            <div class='row'>
              <div class='col'>
                <div class="form-floating mb-3 ">
                  <input type="text" class="form-control" value="<?php echo $patient['patient_city'] ?>" name='city' id="floatingInput" placeholder="Ex : CHD">
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
                    <?php
                        if ($patient['patient_gender']=='Male'){
                    ?>
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                    <?php
                        }else{
                    ?>
                            <option  value="Male">Male</option>
                            <option selected value="Female">Female</option>
                    <?php
                        }
                    ?>
                  </select>
                  <label for="floatingSelect">Gender</label>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col'>
                <div class="form-floating">
                  <textarea name='symptoms' class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $patient['patient_symptoms'] ?></textarea>
                  <label for="floatingTextarea2">Symptoms</label>
                </div>
              </div>
            </div>
            <div class='row'>
                <div class='col'>
                  <button name='update_patient' class='btn btn-outline-dark w-100 mt-2'>Update</button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>