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
            echo "Blog Added Successfully.";
        }else{
            echo "Error: ". $conn->error;
        }

    }else{
        echo "Please Fill All The Fields.";
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
