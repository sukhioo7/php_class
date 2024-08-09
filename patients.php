<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/patient.css">
  </head>
  <body>
    <nav>
        <?php include('navbar.php'); ?>
    </nav>
    <main>
        <div class="main-header">
            <h1>Patients</h1>
        </div>
        <div class="card-section">
            <ul class="cards">
                <li>
                    <div href="" class="card">
                        <div class="img-div">
                            <img src="img/patient.jpg" class="card__image" alt="" />
                        </div>
                        <div class="card__overlay">
                            <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                            <div class="card__header-text">
                                <h3 class="card__title">Jessica Parker</h3>            
                                <span class="card__status">Patient ID : 12</span>
                            </div>
                            </div>
                            <div class="card__description">
                                <p>
                                    <span><b>Age: </b>23</span>
                                    <span><b>Gender: </b>Male</span>
                                    <span><b>City: </b>Chandigarh</span>
                                </p>
                                <p><b>Symptoms: </b>Fever and Cold</p>
                                <div class="edit-patient">
                                    <a class="btn btn-success ">Edit</a>
                                    <a class="btn btn-danger ">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                </li>
            </ul>     
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="navbar2.js"></script> -->
  </body>
</html>