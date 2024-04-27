<?php include('connection.php');

?>

<!--------------------------------- Patient Registration ----------------------------------------->


<?php
$target_folder = 'media/patient_image/';
if (isset($_POST['registration'])){
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $symptoms = $_POST['symptoms'];
    $target_file = $target_folder . $_FILES['image']['name'];

    if (!empty($full_name) and !empty($age) and !empty($email) and !empty($phone)
        and !empty($city) and !empty($gender) and !empty($symptoms)){

        $email_query = "select * from patients where patient_email='$email'";
        $check_email = mysqli_query($response,$email_query);
        if ($check_email->num_rows==0){
            $phone_query = "select * from patients where patient_phone='$phone'";
            $check_phone = mysqli_query($response,$phone_query);
            if ($check_phone->num_rows==0){
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                $insert_patient_query = "insert into patients(patient_name,patient_age,patient_email,patient_phone
                                        ,patient_gender,patient_city,patient_symptoms,patient_image) values 
                                        ('$full_name',$age,'$email','$phone','$gender','$city','$symptoms','$target_file');";
            
                $res = mysqli_query($response,$insert_patient_query);
                setcookie('success','account-created',time()+10,'/');
                header('location:index.php');
            }else{
                setcookie('error','phone-exist',time()+10,'/');
                header('location:index.php');
            }
        }else{
            setcookie('error','email-exist',time()+10,'/');
            header('location:index.php');
        }
    }else{
        setcookie('error','empty-fields',time()+10,'/');
        header('location:index.php');
    }
}

?>

<!--------------------------------- Patient Delete ----------------------------------------->
<?php
if (isset($_GET['delete'])){
    $patient_id = $_GET['delete'];

    $select_query = "select patient_image from patients where patient_id=$patient_id;";
    $raw_patient = mysqli_query($response,$select_query);
    $patient = mysqli_fetch_assoc($raw_patient);
    unlink($patient['patient_image']);

    $delete_query = "delete from patients where patient_id=$patient_id";

    $res = mysqli_query($response,$delete_query);
    if ($res){
        header('location:patients.php');
    }else{
        echo 'Something bad happend';
    }
}

?>


<!--------------------------------- Patient Update ----------------------------------------->

<?php

if (isset($_POST['patient_update'])){
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $symptoms = $_POST['symptoms'];

    if (!empty($full_name) and !empty($age) and !empty($city) and !empty($symptoms)){
        $update_patient = "update patients set patient_name='$full_name', patient_age=$age, 
                            patient_city='$city', patient_symptoms='$symptoms' where patient_id=$id;";

        $res = mysqli_query($response,$update_patient);
        if ($res){
            header('location:patients.php');
        }else{
            echo "ERROR hai ji";
        }
    }
}

?>

<!--------------------------------- Patient Search ----------------------------------------->

