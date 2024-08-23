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


<?php

if (isset($_POST['update_patient'])){
    
    $id = $_POST['id']; 
    $name = $_POST['full_name']; 
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $symptoms = $_POST['symptoms'];

    if (!empty($name) and !empty($age) and !empty($city) and !empty($gender) and !empty($email)
         and !empty($phone) and !empty($symptoms)){

        $patient_update = "update patients set patient_name='$name', patient_age=$age, patient_gender='$gender',
                            patient_email='$email', patient_phone=$phone, patient_city='$city', 
                            patient_symptoms='$symptoms' where patient_id=$id";

        $result = mysqli_query($response,$patient_update);
        header("location:update.php?patient_id=$id");

    }else{
        echo 'Please Fill All the Fields.';
    }

    
 
}

?>


<?php

if (isset($_POST['signup'])){
    
    $name = $_POST['full_name']; 
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($name) and !empty($designation) and !empty($email) and !empty($password)
         and !empty($confirm_password)){

        $check_email = "select * from employees where emp_email='$email'";
        
        $emp = mysqli_query($response,$check_email);
        
        if ($emp->num_rows==0){

            if ($password==$confirm_password){

                $encryped_password = password_hash($password,PASSWORD_ARGON2I);

                $emp_insert = "insert into employees (emp_name,emp_designation,emp_email,emp_password) values 
                ('$name','$designation','$email','$encryped_password');";
    
                $result = mysqli_query($response,$emp_insert);
                if ($result){
                    setcookie('success','Account Created Successfuly :) ',time()+10,'/');
                    header('location:signup.php');
                }else{
                    setcookie('error','Something Bad Happend.',time()+10,'/');
                    header('location:signup.php');
                }
            }else{
                setcookie('error','Password Do Not Matched.',time()+10,'/');
                header('location:signup.php');
            }

        }else{
            setcookie('error','This Email Is Already Exist.',time()+10,'/');
            header('location:signup.php');
        }
    }else{
        setcookie('error','Please Fill all the fields.',time()+10,'/');
        header('location:signup.php');
    }

}

?>

<?php

if (isset($_POST['login'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if (!empty($user_email) or !empty($user_password)){
        $emp_query = "select * from employees where emp_email='$user_email'";

        $raw_data = mysqli_query($response,$emp_query);

        if ($raw_data->num_rows!=0){
            $employee = mysqli_fetch_assoc($raw_data);

            $result = password_verify($user_password,$employee['emp_password']);

            if ($result){
                echo 'Login';
                // $_SESSION['emp_id'] = employees['emp_id'];
                // $_SESSION['emp_name'] = employees['emp_name'];
            }else{
                setcookie('error','Your Email or Password is incorrect.',time()+10,'/');
                header('location:login.php');
            }
        }else{
            setcookie('error','Your Email or Password is incorrect.',time()+10,'/');
            header('location:login.php');
        }
    }else{
        setcookie('error','Please Fill all the fields.',time()+10,'/');
        header('location:login.php');
    }
}

?>
