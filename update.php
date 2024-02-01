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
    <link rel="stylesheet" href="style.css">
    <title>Update Patient</title>
</head>
<body>
    <?php include('navbar.php')  ?>
    <?php
         if (!isset($_SESSION['emp_id'])){
            header('location:login.php');
        }
        if (isset($_GET['edit_id'])){
            $patient_id = $_GET['edit_id'];

            $select_patient = "select * from patient where patient_id=$patient_id";

            $raw_patient = mysqli_query($connection,$select_patient);

            $patient = mysqli_fetch_assoc($raw_patient);
        }
    ?>
    <div>
        <h1 class="text-primary text-center mt-3">Update Patient</h1>
        <form action='action.php' method='post' enctype="multipart/form-data" class='pr-5 pl-5 ml-5 mr-5'>
            <div class="row">
                <input type="hidden" name="id" value="<?php echo $patient['patient_id']; ?>">
                <div class="col">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" value="<?php echo $patient['patient_name']; ?>" name='full_name' placeholder="Full Name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Age</label>
                    <input type="number" class="form-control" value="<?php echo $patient['patient_age']; ?>" name='age' placeholder="Age" >
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name='email' value="<?php echo $patient['patient_email']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone No.</label>
                <input type="number" class="form-control" name='phone' value="<?php echo $patient['patient_phone']; ?>" id="exampleInputPassword1" placeholder="Phone No.">
            </div>
            <div class="row">
            <div class="col custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" required>
                    
                </div>
            <div class="col">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" name='city' value="<?php echo $patient['patient_city']; ?>" placeholder="City">
                </div>
                <div class="col">
                   <p><label for="exampleInputEmail1">Gender</label></p> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name='gender' type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name='gender' type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Symptoms</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='symptoms' rows="3"><?php echo $patient['patient_symtomps']; ?></textarea>
            </div>
            <button name='patient_update' type="submit" class="btn btn-success btn-block mt-3">Update</button>
        </form>
    </div>
</body>
</html>