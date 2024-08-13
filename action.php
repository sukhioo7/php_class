<?php include('connection.php'); ?>

<?php

if (isset($_POST['patient_register'])){
    
    $name = $_POST['full_name']; 
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $symptoms = $_POST['symptoms'];

    if (!empty($name) and !empty($age) and !empty($city) and !empty($gender) and !empty($email)
         and !empty($phone) and !empty($symptoms)){

        $check_email = "select * from patients where patient_email='$email'";
        $check_phone = "select * from patients where patient_phone='$phone'";
        
        $patient = mysqli_query($response,$check_email);
        
        if ($patient->num_rows==0){

            $patient = mysqli_query($response,$check_phone);

            if ($patient->num_rows==0){

                $patient_insert = "insert into patients(patient_name,patient_age,patient_city,patient_gender,
                patient_email,patient_phone,patient_symptoms) values 
                ('$name',$age,'$city','$gender','$email','$phone','$symptoms') ";

                $result = mysqli_query($response,$patient_insert);
                header('location:success.php');

            }else{
                echo 'This Phone is already in use.';
            }

        }else{
            echo 'This email is already in use.';
        }
    }else{
        echo 'Please Fill All the Fields.';
    }

    
 
}

?>

<?php
    if (isset($_GET['patient_id'])){
        $id = $_GET['patient_id'];
        
        $delete_query = "delete from patients where patient_id=$id;";

        $output = mysqli_query($response,$delete_query);

        // echo $output;
        if ($output){
            header('location:patients.php');
        }else{
            echo "Server Error";
        }
    }

?>
