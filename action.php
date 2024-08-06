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

    // if (!empty($name) and !empty($age) and !empty($city) and !empty($gender) and !empty($email)
    //      and !empty($phone) and !empty($symptoms)){

        $check_email = "select * from patients where patient_email='$email'";
        
        $patients = mysqli_query($response,$check_email);

        print_r($patients);

        // $patient_insert = "insert into patients(patient_name,patient_age,patient_city,patient_gender,
        // patient_email,patient_phone,patient_symptoms) values 
        // ('$name',$age,'$city','$gender','$email','$phone','$symptoms') ";

        // $result = mysqli_query($response,$patient_insert);
        // header('location:success.php');

    // }else{
    //     echo 'Please Fill All the Fields.';
    // }

    
 
}

?>