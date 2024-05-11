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
    if(!isset($_SESSION['staff_id'])){
        header('location:login.php');
    }
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
    if(!isset($_SESSION['staff_id'])){
        header('location:login.php');
    }
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

<!--------------------------------- Patient Signup ----------------------------------------->
<?php
if (isset($_POST['signup'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($first_name) and !empty($last_name) and !empty($email) and !empty($phone)
        and !empty($designation) and !empty($password) and !empty($confirm_password)){

        $email_query = "select * from staff where staff_email='$email'";
        $check_email = mysqli_query($response,$email_query);
        if ($check_email->num_rows==0){
            $phone_query = "select * from staff where staff_phone='$phone'";
            $check_phone = mysqli_query($response,$phone_query);
            if ($check_phone->num_rows==0){
                if ($password==$confirm_password){
                    $encrypted_password = password_hash($password,PASSWORD_DEFAULT);
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                    $insert_staff_query = "insert into staff(staff_name,staff_phone,staff_email,staff_designation,staff_password) 
                                            values 
                                            ('$first_name $last_name','$phone','$email','$designation','$encrypted_password');";
                
                    $res = mysqli_query($response,$insert_staff_query);
                    setcookie('success','account-created',time()+10,'/');
                    header('location:signup.php');
                }
                else{
                    setcookie('error','password',time()+10,'/');
                    header('location:signup.php');
                }
            }else{
                setcookie('error','phone-exist',time()+10,'/');
                header('location:signup.php');
            }
        }else{
            setcookie('error','email-exist',time()+10,'/');
            header('location:signup.php');
        }
    }else{
        // echo $first_name,$last_name,$phone,$designation,$email,$password,$confirm_password;
        setcookie('error','empty-fields',time()+10,'/');
        header('location:signup.php');
    }
}

?>

<!--------------------------------- Patient Login ----------------------------------------->

<?php
if (isset($_POST['login'])){
    $email = $_POST['email'];
    $staff_password = $_POST['password'];

    if (!empty($email) and !empty($staff_password)){
        $staff_query = "select * from staff where staff_email='$email';";

        $raw_data = mysqli_query($response,$staff_query);

        $staff = mysqli_fetch_assoc($raw_data);
        if ($raw_data->num_rows==1){
            $password = $staff['staff_password'];

            $pass_check = password_verify($staff_password,$password);
            if ($pass_check){
                session_start();
                $_SESSION['staff_id'] = $staff['staff_id'];
                $_SESSION['staff_name'] = $staff['staff_name'];
                $_SESSION['staff_designation'] = $staff['staff_designation'];
                header('location:index.php');
            }else{
                setcookie('error','incorrect',time()+10,'/');
                header('location:login.php');  
            }
        }else{
            setcookie('error','incorrect',time()+10,'/');
            header('location:login.php');  
        }
    }else{
        setcookie('error','empty-fields',time()+10,'/');
        header('location:login.php');
        // echo $email,$staff_password;
    }

}
?>

<!--------------------------------- Patient Logout ----------------------------------------->
<?php
if (isset($_GET['logout'])){
    session_start();
    session_destroy();
    header('location:login.php');
}
?>