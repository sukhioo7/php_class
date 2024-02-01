<?php include('connection.php') ?>

<!-- +++++++++++++++++++++++++++++ Insert Patient +++++++++++++++++++++++++++++++++++++++ -->
<?php
$target_folder = 'media/patient_image/';


// media/patient_image/hospital_imgae.jpg 


if (isset($_POST['patient_register'])){
    
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $symptoms = $_POST['symptoms'];
    $target_file = $target_folder . $_FILES['image']['name'];
    
    if (!empty($full_name) and !empty($age) and !empty($city) and !empty($gender) 
            and !empty($phone) and !empty($email) and !empty($symptoms)){
    
        $select_email = "select * from patient where patient_email='$email'";
        $select_phone = "select * from patient where patient_phone='$phone'";
    
        $email_res = mysqli_query($connection,$select_email);
        $phone_res = mysqli_query($connection,$select_phone);
        if ($email_res->num_rows==0){
            if ($phone_res->num_rows==0){
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                $insert_patient = "insert into patient (patient_name,patient_age,patient_city,
                                    patient_gender,patient_phone,patient_email,patient_symtomps,patient_image) 
                                    values ('$full_name',$age,'$city','$gender','$phone','$email',
                                    '$symptoms','$target_file');";
            
                $response = mysqli_query($connection,$insert_patient);
                if ($response){
                    header('location:success.php');
                }else{
                    echo 'Patient Not Register';
                }          
            }else{
                echo 'Phone number already exist';
            }
        }else{
            echo 'Email Already Exist';
        }
    
    
    }else{
        echo 'Values are empty';
    }
}

?>

<!-- +++++++++++++++++++++++++++++ Delete Patient +++++++++++++++++++++++++++++++++++++++ -->

<?php
if (isset($_GET['del_id'])){
    if (!isset($_SESSION['emp_id'])){
        header('location:login.php');
    }
    $patient_id = $_GET['del_id'];

    $select_query = "select patient_image from patient where patient_id=$patient_id;";
    $raw_patient = mysqli_query($connection,$select_query);
    $patient = mysqli_fetch_assoc($raw_patient);
    unlink($patient['patient_image']);

    $delete_query = "delete from patient where patient_id=$patient_id";
    $del_res = mysqli_query($connection,$delete_query);
    if ($del_res){
        header('location:patient.php');
    }else{
        echo 'Server Error';
    }
}

?>


<!-- +++++++++++++++++++++++++++++ Edit Patient +++++++++++++++++++++++++++++++++++++++ -->

<?php 
if (isset($_POST['patient_update'])){
    print_r($_FILES);
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $symptoms = $_POST['symptoms'];
    $target_file = $target_folder . $_FILES['image']['name'];
    
    if (!empty($full_name) and !empty($age) and !empty($city) and !empty($gender) 
            and !empty($phone) and !empty($email) and !empty($symptoms)){
    
        $select_email = "select * from patient where patient_email='$email'";
        $select_phone = "select * from patient where patient_phone='$phone'";

        $patient_detail = "select patient_email,patient_phone from patient where patient_id='$id'";


        $email_res = mysqli_query($connection,$select_email);
        $phone_res = mysqli_query($connection,$select_phone);

        $patient_res = mysqli_query($connection,$patient_detail);
        $patient = mysqli_fetch_assoc($patient_res);

        if ($email_res->num_rows==0 or $patient['patient_email']==$email){
            if ($phone_res->num_rows==0 or $patient['patient_phone']==$phone){

                $select_query = "select patient_image from patient where patient_id=$id;";
                $raw_patient = mysqli_query($connection,$select_query);
                $patient = mysqli_fetch_assoc($raw_patient);
                unlink($patient['patient_image']);

                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                $update_patient = "update patient set patient_name='$full_name', patient_age=$age, patient_city='$city',
                                    patient_phone='$phone', patient_email='$email',patient_gender='$gender',
                                    patient_symtomps='$symptoms',patient_image='$target_file' where patient_id=$id";
            
                $response = mysqli_query($connection,$update_patient);
                if ($response){
                    header('location:patient.php');
                }else{
                    echo 'Patient Not Register';
                }          
            }else{
                echo 'Phone number already exist';
            }
        }else{
            echo 'Email Already Exist';
        }
    
    
    }else{
        echo 'Values are empty';
    }
}


?>

<!-- +++++++++++++++++++++++++++++ signup +++++++++++++++++++++++++++++++++++++++ -->

<?php
if (isset($_POST['signup'])){
    $name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if (!empty($name) and !empty($designation) and !empty($email) and !empty($password) 
    and !empty($confirm_password)){
        $email_query = "select * from employee where emp_email='$email'";

        $check_email = mysqli_query($connection,$email_query);

        if ($check_email->num_rows==0){
            if ($password==$confirm_password){
                $encrpyted_pass = password_hash($password,PASSWORD_ARGON2I);

                $insert_query = "insert into employee(emp_name,emp_designation,emp_email,emp_password)
                                values ('$name','$designation','$email','$encrpyted_pass');";

                $success = mysqli_query($connection,$insert_query);
                setcookie('signup-msg','success',time()+8,'/');
                header('location:signup.php');
            }else{
                setcookie('signup-msg','password-error',time()+8,'/');
                header('location:signup.php');
            }
        }else{
            setcookie('signup-msg','email-error',time()+8,'/');
            header('location:signup.php');
        }
    }else{
        setcookie('signup-msg','value-error',time()+8,'/');
        header('location:signup.php');
    }
}

?>

<!-- +++++++++++++++++++++++++++++ login +++++++++++++++++++++++++++++++++++++++ -->

<?php
if (isset($_POST['login'])){
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) and !empty($password)){
        $select_query = "select * from employee where emp_email='$email';";

        $raw_data = mysqli_query($connection,$select_query);
        if ($raw_data->num_rows==1){
            $employee = mysqli_fetch_assoc($raw_data);
            $emp_password = $employee['emp_password'];

            $pass_check = password_verify($password,$emp_password);

            if($pass_check){
                $_SESSION['emp_id'] = $employee['emp_id'];
                $_SESSION['emp_name'] = $employee['emp_name'];
                $_SESSION['emp_designation'] = $employee['emp_designation'];
                // echo $_SESSION['emp_id'];
                header('location:index.php');
            }else{
                setcookie('login-msg','employee-error',time()+8,'/');
                header('location:login.php');
            }
        }else{
            setcookie('login-msg','employee-error',time()+8,'/');
            header('location:login.php');
        }
    }else{
        setcookie('login-msg','value-error',time()+8,'/');
        header('location:login.php');
    }
}

?>
<!-- +++++++++++++++++++++++++++++ Saving CSV File +++++++++++++++++++++++++++++++++++++++ -->
<?php
if (isset($_GET['save-as-csv'])){
    $my_file = fopen("C:\\Users\\Sukh-e\\Desktop\\Patients.csv",'w');
    fwrite($my_file,"Patient ID,Name,Age,Gender,City,Phone,Email,Symptoms\n");

    $select_query = "select * from patient";
    $raw_data = mysqli_query($connection,$select_query);

    while($patient = mysqli_fetch_assoc($raw_data)){
        $id = $patient['patient_id'];
        $name = $patient['patient_name'];
        $age = $patient['patient_age'];
        $city = $patient['patient_city'];
        $gender = $patient['patient_gender'];
        $phone = $patient['patient_phone'];
        $email = $patient['patient_email'];
        $symptoms = $patient['patient_symtomps'];

        $text = "$id,$name,$age,$gender,$city,$phone,$email,$symptoms\n";

        fwrite($my_file,$text);
    }
    fclose($my_file);

    setcookie('file-msg','success',time()+8,'/');
    header('location:patient.php');
    
}
?>