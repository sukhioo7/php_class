<?php include('connection.php'); ?>

<!--------------------------------- Patient Registration ----------------------------------------->

<?php
if (isset($_POST['registration'])){
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];

    $insert_patient_query = "insert into patients(patient_name,patient_age,patient_email,patient_phone
                            ,patient_gender,patient_city,patient_symptoms) values 
                            ('$full_name',$age,'$email','$phone','$city','$gender','$symptoms');";

    $res = mysqli_query($response,$insert_patient_query);

    echo $res;
}



?>