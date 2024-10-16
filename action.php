<?php include('connection.php'); ?>

<!-- ++++++++++++++++++ Add NEW BLOG +++++++++++++++++ -->
<?php

if (isset($_POST['add_blog_btn'])){
    $blog_title = $_POST['blog_title'];
    $introduction = $_POST['introduction'];
    $category  = $_POST['category'];
    $sub_heading1 = $_POST['sub_heading1'];
    $sub_heading2 = $_POST['sub_heading2'];
    $sub_heading3 = $_POST['sub_heading3'];
    $sub_heading4 = $_POST['sub_heading4'];
    $content1 = $_POST['content1'];
    $content2 = $_POST['content2'];
    $content3 = $_POST['content3'];
    $content4 = $_POST['content4'];
    
    if (!empty($blog_title) and !empty($introduction) and !empty($category) and !empty($sub_heading1) 
    and !empty($sub_heading2) and !empty($sub_heading3) and !empty($sub_heading4) and !empty($content1) 
    and !empty($content2) and !empty($content3) and !empty($content4)){

        $insert_blog_query = "insert into blogs (blog_title,introduction,category,sub_heading1,sub_heading2,
        sub_heading3,sub_heading4,content1,content2,content3,content4) values ('$blog_title','$introduction',
        '$category','$sub_heading1','$sub_heading2','$sub_heading3','$sub_heading4',
        '$content1','$content2','$content3','$content4')";

        $result = $conn->query($insert_blog_query);

        if ($result){
            setcookie('success',"Blog Added Successfully.",time()+8,'/');
            header('location:add_blog.php');
        }else{
            setcookie('error',$conn->error,time()+8,'/');
            header('location:add_blog.php');
            // echo "Error: ". $conn->error;
        }
        
    }else{
        setcookie('error',"Please Fill All The Fields.",time()+8,'/');
        header('location:add_blog.php');
    }
}


?>

<!-- ++++++++++++++++++ Delete BLOG +++++++++++++++++ -->

<?php 

if (isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];

    $delete_query = "delete from blogs where blog_id = $id";

    $result = $conn->query($delete_query);
    // $result = True;
    if ($result){
        // echo "Blog Deleted Successfuly.";
        header('location:blogs.php');
    }else{
        echo "Error: ". $conn->error;
    }
}

?>

<!-- ++++++++++++++++++ Update BLOG +++++++++++++++++ -->
<?php

if (isset($_POST['update_blog_btn'])){
    $blog_id = $_POST['blog_id'];
    $blog_title = $_POST['blog_title'];
    $introduction = $_POST['introduction'];
    $category  = $_POST['category'];
    $sub_heading1 = $_POST['sub_heading1'];
    $sub_heading2 = $_POST['sub_heading2'];
    $sub_heading3 = $_POST['sub_heading3'];
    $sub_heading4 = $_POST['sub_heading4'];
    $content1 = $_POST['content1'];
    $content2 = $_POST['content2'];
    $content3 = $_POST['content3'];
    $content4 = $_POST['content4'];
    
    if (!empty($blog_title) and !empty($introduction) and !empty($category) and !empty($sub_heading1) 
    and !empty($sub_heading2) and !empty($sub_heading3) and !empty($sub_heading4) and !empty($content1) 
    and !empty($content2) and !empty($content3) and !empty($content4)){

        $update_query = "update blogs set blog_title='$blog_title', category='$category', introduction='$introduction',
        sub_heading1='$sub_heading1', sub_heading2='$sub_heading2', sub_heading3='$sub_heading3',
        sub_heading4='$sub_heading4', content1='$content1', content2='$content2', content3='$content3',
        content4='$content4' where blog_id=$blog_id";

        $result = $conn->query($update_query);

        if ($result){
            echo "Blog Updated Successfully.";
        }else{
            echo "Error: ". $conn->error;
        }

    }else{
        echo "Please Fill All The Fields.";
    }
}


?>
<!-- ++++++++++++++++++ SignUp User +++++++++++++++++ -->

<?php

if (isset($_POST['signup'])){

    $target_folder = 'profile_photos/';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    
    $profile_photo = $_FILES['profile_photo'];

    if (!empty($first_name) and !empty($last_name) and !empty($email) and !empty($country) 
    and !empty($city) and !empty($password) and !empty($confirm_password)){

        if ($password === $confirm_password){
                $encrypted_password = password_hash($password, PASSWORD_ARGON2I);

                if ($profile_photo['name']){
                    $image_name = $profile_photo['name'];
                    $target_file = $target_folder. $image_name;
                    move_uploaded_file($profile_photo['tmp_name'], $target_file);
                }

                $insert_user_query = "insert into users (first_name, last_name, email, country, city, profile_image 
                , password) values ('$first_name', '$last_name', '$email', '$country', '$city', '$target_file', '$encrypted_password')";
        
                $result = $conn->query($insert_user_query);
                
                if ($result){
                    echo "User Added Successfully.";
                }else{
                    if (str_contains($conn->error,'email')){
                        echo "This Email is already exists.";
                    }else{
                        echo "Error: ". $conn->error;
                    }
                }
        }
    }
}


?>