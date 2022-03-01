<?php
$submit = explode("-",$_REQUEST['submit']);

switch($submit[0]){

    case"user";
        if($submit[1] === "login"){
            $_REQUEST['endpoint'] = $submit[1];
            $response = shell($_REQUEST);
            if($response == false){
                $url['user'] ="user-zero";
            }else{
                $token = md5(json_encode($response));
                setcookie("token",$token);
                setcookie("id",$response['company_id']);
                $url['main'] ="dashboard";
                $url['token'] = $token;
            }
        }
    break;

    case"profile";
        
        if($submit[1] === "add"){
            if(isset($_FILES['image'])){
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                
                //$extensions= array("jpeg","jpg","png");
                
               // if(in_array($file_ext,$extensions)=== false){
               //    $errors=101;
               // }
                
                if($file_size > 2097152){
                     echo 'File size must be excately 2 MB';
                     exit;
                }
                
                if(empty($errors)==true){
                   move_uploaded_file($file_tmp,"images/".$file_name);
                    $_REQUEST['endpoint'] = 'add-profile'; 
                    $_REQUEST['image'] ="images/".$file_name;
                }else{
                   $errors = "upload failed";
                   exit;
                }
            }
        }elseif($submit[1] === "update"){
            $_REQUEST['endpoint'] = 'update-profile';
        }elseif($submit[1] === "delete"){
            $_REQUEST['endpoint'] = 'delete-profile';
        }
        $_REQUEST['id'] = $_COOKIE['id'];
        $response = shell($_REQUEST);
        $url['main'] = $_COOKIE['page'];
        $url['token'] = $_COOKIE['token'];
        if($response == false){   
            $url['e'] = 100;
        }else{
            $url['e'] = 200;
        }
    break;
}

header("location: ?".http_build_query($url));
?>