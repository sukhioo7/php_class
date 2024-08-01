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
    
    $patient_insert = "insert into patients(patient_name,patient_age,patient_city,patient_gender,
                        patient_email,patient_phone,patient_symptoms) values 
                        ('$name',$age,'$city','$gender','$email','$phone','$symptoms') ";

    $result = mysqli_query($response,$patient_insert);
    echo $result;
}

?>