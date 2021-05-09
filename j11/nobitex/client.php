<?php
session_start();
function PubRequest($method , $data=[] )
{
    $url = "https://api.nobitex.ir/v2/".$method;
    $query = http_build_query($data);
    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS ,  $query ) ;
    $res= curl_exec($client);    
    curl_close($client);
    //echo $res; exit;
    $res = json_decode($res);
    return $res ; 
}
function getToken($data)
{
    $url = "https://api.nobitex.ir/auth/login/";
    $query = http_build_query($data);

    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS , $query ) ;
    $res= curl_exec($client);  
    //echo $res;exit;  
    curl_close($client);
    $res = json_decode($res);
    return $res ; 
}

function Request($method , $data=[] )
{
    $key = $_SESSION['key'];
    $header=["Content-Type:application/json",
             "Authorization:Token $key"];

    $url = "https://api.nobitex.ir/users/".$method;

    $json = json_encode(  $data );
    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, 0);    
    curl_setopt($client , CURLOPT_HTTPHEADER , $header) ;
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS , $json ) ;
    $res= curl_exec($client);    
    curl_close($client);
    echo $res; exit;
    $res = json_decode($res);
    return $res ; 
}