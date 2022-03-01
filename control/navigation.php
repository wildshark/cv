<?php
setcookie("page",$_REQUEST['main']);
switch($_REQUEST['main']){

    case"dashboard";
        $page = "view/dashboard.php";
    break;

    case"list";
        $data['endpoint'] ="fetch-profile";
        $data['id'] = $_COOKIE['id'];
        $profile = shell($data);
        $page = "view/list.php";
        
    break;

    case"new";
        $fname="";
        $sname="";
        $dob="";
        $nationality="";
        $state="";
        $gmale ="checked";
        $gfemale="";
        $position="";
        $mobile ="";
        $email ="";
        $address ="";
        $title="New Staff";
        $page = "view/profile.php";
    break;

    case"view";
        $data['endpoint'] ="view-profile";
        $data['id'] = $_GET['profile'];
        $profile = shell($data);
        if((!isset($profile))||($profile == false)){
            $fname="";
            $sname="";
            $dob="";
            $nationality="";
            $state="";
            $gmale ="checked";
            $gfemale="";
            $position="";
            $mobile ="";
            $email ="";
            $address ="";
            $title="New Staff";
        }else{
            $fname = $profile['fname'];
            $sname = $profile['sname'];
            $dob = $profile['fname'];
            $nationality = $profile['nationality'];
            $state = $profile['state'];
            if($profile['gender'] === "male"){
                $gmale ="checked";
                $gfemale="";
            }else{
                $gmale ="";
                $gfemale="checked";
            }       
            $position = $profile['position'];
            $mobile = $profile['mobile'];
            $email = $profile['email'];
            $address = $profile['address'];
            $title="Update". $fname." ".$sname;
        }    
           
        $page = "view/profile.php";
    break;

    case"qr";
        echo qr($_REQUEST['ref']);
        exit;
    break;
}
include("frame/dashboard.php");
?>