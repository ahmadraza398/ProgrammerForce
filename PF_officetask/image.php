<?php
include('config.php');
$response=array();


if(!$conn){
    $response['message']= "MySQL connect error";
    $response['status']=404;
}
else{
    if(is_uploaded_file($_FILES['user_image']['tmp_name']) && @$_POST['user_name']){
        $tmp_file=$_FILES['user_image']['tmp_name'];
        $img_name=$_FILES['user_image']['name'];
        $upload_dir="./images/".$img_name;
        $sql= "INSERT INTO images (user_name, user_profile) 
        VALUES ('{$_POST['user_name']}','{$img_name}')";
        if(move_uploaded_file($tmp_file,$upload_dir)&& mysqli_query($conn,$sql)){
            $response['status']=200;
            $response['message']= "Image uploaded successfully";
        }
        else{
            $response['status']=404;
            $response['message']= "Image upload failed!!";
        }
    }else{
        $response['status']=404;
        $response['message']= "Invalid Request!!";
    }
        
    }

echo json_encode($response);

?>