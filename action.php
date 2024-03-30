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

    if (!empty($full_name) and !empty($age) and !empty($email) and !empty($phone)
        and !empty($city) and !empty($gender) and !empty($symptoms)){

        $email_query = "select * from patients where patient_email='$email'";
        $check_email = mysqli_query($response,$email_query);
        if ($check_email->num_rows==0){
            $phone_query = "select * from patients where patient_phone='$phone'";
            $check_phone = mysqli_query($response,$phone_query);
            if ($check_phone->num_rows==0){
                $insert_patient_query = "insert into patients(patient_name,patient_age,patient_email,patient_phone
                                        ,patient_gender,patient_city,patient_symptoms) values 
                                        ('$full_name',$age,'$email','$phone','$gender','$city','$symptoms');";
            
                $res = mysqli_query($response,$insert_patient_query);
                echo 'Patient Registered';
            }else{
                echo 'Phone Exist';
            }
        }else{
            echo 'Email Exist';
        }
    }else{
        echo 'Empty Fields';
    }
}

?>

<!--------------------------------- Patient Delete ----------------------------------------->
<?php
if (isset($_GET['delete'])){
    $patient_id = $_GET['delete'];

    $delete_query = "delete from patients where patient_id=$patient_id";

    $res = mysqli_query($response,$delete_query);
    if ($res){
        header('location:patients.php');
    }else{
        echo 'Something bad happend';
    }
}

?>