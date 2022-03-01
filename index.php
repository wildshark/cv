<?php
session_start();
include("control/control.php");
include("control/global.php");
if(!isset($_GET['cv'])){
    if(!isset($_REQUEST['submit'])){
        if(!isset($_REQUEST['main'])){
            session_destroy();
            require("loginform/index.php");
            exit();
        }else{
            require("control/navigation.php");
        }
    }else{
        require("control/model.php");
    }
}else{

    $cv['endpoint']="view-staff-cv";
    $cv['ref']=$_GET['cv'];
    $profile = shell($cv);
    if($profile == false){
        echo"";
    }else{
        $fname = $profile['fname'];
        $sname = $profile['sname'];
        $dob = $profile['dob'];
        $nationality = $profile['nationality'];
        $state = $profile['state'];
        $gender = $profile['gender'];
        $position = $profile['position'];
        $mobile = $profile['mobile'];
        $email = $profile['email'];
        $address = $profile['address'];
        if(!isset($profile['image'])){
            $picture = "https://bootdey.com/img/Content/avatar/avatar7.png";
        }else{
            $picture = $profile['image'];
        }
        require("profile/index.php");
    }   
}

?>