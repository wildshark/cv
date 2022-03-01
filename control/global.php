<?php

function menu(){
    $token = $_COOKIE['token'];
    return"
    <li class='collapsed'>
        <a class='m-link' href='?main=dashboard&token={$token}'>
            <i class='icofont-home fs-5'></i> <span>Dashboard</span> <span class='ms-auto text-end fs-5'></span>
        </a>
    </li>
    <li class='collapsed'>
        <a class='m-link' href='?main=new&token={$token}'>
            <i class='icofont-home fs-5'></i> <span>New Profile</span> <span class='ms-auto text-end fs-5'></span>
        </a>
    </li>
    <li class='collapsed'>
        <a class='m-link' href='?main=list&token={$token}'>
            <i class='icofont-home fs-5'></i> <span>Profile List</span> <span class='ms-auto text-end fs-5'></span>
        </a>
    </li>
    
    ";
}

?>