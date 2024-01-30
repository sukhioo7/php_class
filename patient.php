<!DOCTYPE html>

<?php include('connection.php')  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="patient.css">
    <title>Patient</title>
</head>
<body>
    <?php include('navbar.php')  ?>
    <div class="d-flex w-100 justify-content-around ">
        <h1 class="text-dark mt-3 ">Patients</h1>
        <div class="dropdown w-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="patient.php?gender=male">Male</a>
                <a class="dropdown-item" href="patient.php?gender=female">Female</a>
                <a class="dropdown-item" href="patient.php?sort-age=asc">Sort By Age ASC</a>
                <a class="dropdown-item" href="patient.php?sort-age=desc">Sort By Age DESC</a>
            </div>
        </div>
    </div>
    <div>
        <div>
            <?php
                if (isset($_COOKIE['file-msg'])){
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>File Saved</strong> Your file is saved as Patients.csv.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php                          
                }
            ?>
            <a href="action.php?save-as-csv" class="btn btn-outline-dark btn-block">Save As CSV</a>
            <?php
                if (!isset($_SESSION['emp_id'])){
                    header('location:login.php');
                }
                if (isset($_GET['gender'])){
                    $gender = $_GET['gender'];
                    $patient_querry = "select * from patient where patient_gender='$gender'";
                }elseif(isset($_GET['sort-age'])){
                    if ($_GET['sort-age']=='asc'){
                        $patient_querry = "select * from patient order by patient_age";
                    }else{
                        $patient_querry = "select * from patient order by patient_age desc" ;
                    }
                }elseif (isset($_POST['search_patient'])){
                    $user_search = $_POST['user_search'];
                    $patient_querry = "select * from patient where patient_name like '%$user_search%' or 
                                        patient_age like '%$user_search%' or patient_email like '%$user_search%' or 
                                        patient_city like '%$user_search%' or
                                        patient_symtomps like '%$user_search%' or patient_phone like '%$user_search%'";
                }else{
                    $patient_querry = 'select * from patient';
                }
                $raw_patients = mysqli_query($connection,$patient_querry);
                
                if ($raw_patients->num_rows!=0){
                    while($patient = mysqli_fetch_assoc($raw_patients)){

            ?>
                    <div class="d-flex patient-card ">
                        <div>
                            <img src="img/patient.jpg" alt="">
                        </div>
                        <div>
                            <h3 class='d-flex justify-content-between'><?php echo $patient['patient_name']; ?> 
                            <span>
                                <?php
                                    if ($_SESSION['emp_designation']=='doctor'){
                                ?>
                                        <a class='btn btn-outline-success mr-2' href="update.php?edit_id=<?php echo $patient['patient_id']; ?>">Edit</a>
                                        <a class='btn btn-outline-danger' href="action.php?del_id=<?php echo $patient['patient_id']; ?>">Delete</a>
                                <?php  
                                    }
                                ?>
                            </span>
                        </h3>
                            <p><span><b>Gender : </b><?php echo $patient['patient_gender']; ?> </span><span><b>Age : </b><?php echo $patient['patient_age']; ?> </span><span><b>City : </b><?php echo $patient['patient_city']; ?></span></p>
                            <p><span><b>Phone : </b>+91 <?php echo $patient['patient_phone']; ?> </span><span><b>Email : </b><?php echo $patient['patient_email']; ?></span></p>
                            <p>
                                <h5><b>Symptoms</b></h5>
                                <p><?php echo $patient['patient_symtomps']; ?></p>
                            </p>
                        </div>
                    </div>
            <?php        
                    }
                }else{
                    echo '<h1 class="text-center text-danger">No Data Found</h1>';
                }
            ?>
        </div>
    </div>
    
</body>
</html>