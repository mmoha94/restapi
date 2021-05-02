<?php
session_start();
function getToken($username , $password)
{
    $url = "http://127.0.0.1/restapi/j10/v1/token.php";

    $params['grant_type']='password';
    $params['username']= $username;
    $params['password'] = $password;
    $query=http_build_query($params);

    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS , $query ) ;
    $res= curl_exec($client);    
    curl_close($client);
    $res = json_decode($res);
    return $res ; 
}

function Request($section , $method , $data=[] )
{
    $access_token=$_SESSION['access_token'];
    $header=["Content-Type:application/json",
             "Authorization:bearer $access_token"];

    $url = "http://127.0.0.1/restapi/j10/v1/api.php";
    $req['section']= $section;
    $req['method'] = $method;
    $req['data']   = $data ;
    $json_req = json_encode( $req  );
    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client , CURLOPT_HTTPHEADER , $header) ;
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS , $json_req ) ;
    $res= curl_exec($client);    
    curl_close($client);
    //echo $res; exit;
    $res = json_decode($res);
    return $res ; 
}