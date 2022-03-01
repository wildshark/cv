<?php

function qr($data){
   
    $data = "https://app.iquipedigital.com/cv/?cv".$data;
    return"<img src='https://api.qrserver.com/v1/create-qr-code/?data={$data}&amp;size=100x100' alt='' title='' />";
}

function shell($data){

    $ssl = true;

//echo $url ="https://api.iquipedigital.com/cv/?".http_build_query($data);
//exit;

$url ="https://api.iquipedigital.com/cv/?";


    if($ssl == false){
        $ssl = array(//http
            "verify_peer" => true,
            "allow_self_signed" => false
            );
    }else{
        $ssl = array(//https
        "verify_peer" => false,
        "allow_self_signed" => true
        );
    }
    
    $http = array(
        'method'=>"POST",
        'header'=>
        "Accept-language: en\r\n".
        "Content-type: application/x-www-form-urlencoded\r\n",
        'content'=>http_build_query($data));

    $options = array(
        'ssl' => $ssl,
        'http'=>$http);

    $context = stream_context_create($options);
    $request = fopen($url,'rb',false,$context);
    $response = stream_get_contents($request);
    $result = json_decode($response,true);

    return $result;
}
?>