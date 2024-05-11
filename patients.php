<!doctype html>
<?php include('connection.php'); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/patient.css">
  </head>
  <body>
    <?php include('navbar.php') ?>
    <div class="main">
        <div class="heading">
            <h1 class="text-center">Patients</h1>
        </div>
        <div class="patients">
            <?php
                if(!isset($_SESSION['staff_id'])){
                    header('location:login.php');
                }
                if (isset($_POST['search-btn'])){
                    $query = $_POST['search'];
                
                    if (!empty($query)){
                        $search_query = "select * from patients where patient_name like '%$query%' or patient_id like '%$query%' or
                                        patient_email like '%$query%' or patient_city like '%$query%' or patient_symptoms like '%$query%';";
                                        
                        $raw_data = mysqli_query($response,$search_query);

                        if ($raw_data->num_rows!=0){
                            while($patient = mysqli_fetch_assoc($raw_data)){
                        ?>
                            <div class="patient-card">
                                <div class="img-patient">
                                    <img src="<?php echo $patient['patient_image']; ?>" alt="">
                                    <p>Patient ID : <?php echo $patient['patient_id']; ?></p>
                                </div>
                                <div>
                                    <h2><?php echo $patient['patient_name']; ?></h2>
                                    <p><?php echo $patient['patient_symptoms']; ?></p>
                                    <div>
                                        <p><span><b>Gender : </b><?php echo $patient['patient_gender']; ?></span> <span><b>Age : </b><?php echo $patient['patient_age']; ?></span> <span><b>City : </b><?php echo $patient['patient_city']; ?></span></p>
                                        <p><b>Email : </b><?php echo $patient['patient_email']; ?></p>
                                        <p><b>Phone : </b>+91 <?php echo $patient['patient_phone']; ?></p>
                                    </div>
                                </div>
                                <?php
                                if (isset($_SESSION['staff_designation'])){
                                    if ($_SESSION['staff_designation']=='doctor'){
                                ?>

                                    <a href="action.php?delete=<?php echo $patient['patient_id']; ?>" class="btn btn-outline-danger w-100">Delete</a>
                                    <a href="update_patient.php?update=<?php echo $patient['patient_id']; ?>" class="btn mt-2 btn-outline-success w-100">Update</a>
                                    
                                <?php
                                    }
                                }
                                ?>
                            </div>
                <?php
                            }
                        }
                        else{
                            echo '<h1 class="text-center text-danger mt-5">No Data Found</h1>';
                        }
                    }else{
                        echo '<h1 class="text-center text-danger mt-5">No Data Found</h1>';
                    }
                }else{
                    $select_query = 'select * from patients;';
                    $raw_data = mysqli_query($response,$select_query);
    
                    if ($raw_data->num_rows!=0){
                        while($patient = mysqli_fetch_assoc($raw_data)){
                    ?>
                            <div class="patient-card">
                                <div class="img-patient">
                                    <img src="<?php echo $patient['patient_image']; ?>" alt="">
                                    <p>Patient ID : <?php echo $patient['patient_id']; ?></p>
                                </div>
                                <div>
                                    <h2><?php echo $patient['patient_name']; ?></h2>
                                    <p><?php echo $patient['patient_symptoms']; ?></p>
                                    <div>
                                        <p><span><b>Gender : </b><?php echo $patient['patient_gender']; ?></span> <span><b>Age : </b><?php echo $patient['patient_age']; ?></span> <span><b>City : </b><?php echo $patient['patient_city']; ?></span></p>
                                        <p><b>Email : </b><?php echo $patient['patient_email']; ?></p>
                                        <p><b>Phone : </b>+91 <?php echo $patient['patient_phone']; ?></p>
                                    </div>
                                </div>
                                <?php
                                if (isset($_SESSION['staff_designation'])){
                                    if ($_SESSION['staff_designation']=='doctor'){
                                ?>

                                    <a href="action.php?delete=<?php echo $patient['patient_id']; ?>" class="btn btn-outline-danger w-100">Delete</a>
                                    <a href="update_patient.php?update=<?php echo $patient['patient_id']; ?>" class="btn mt-2 btn-outline-success w-100">Update</a>
                                    
                                <?php
                                    }
                                }
                                ?>
                               
                            </div>
                <?php
                            }
                        }
                    }
                ?>
                
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>