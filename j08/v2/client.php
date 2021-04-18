<?php
function Request($section , $method , $data=[] )
{
    $url = "http://127.0.0.1/restapi/j08/v2/api.php";
    $req['section']= $section;
    $req['method'] = $method;
    $req['data']   = $data ;
    $json_req = json_encode( $req  );
    $client = curl_init($url);
    curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
    curl_setopt($client , CURLOPT_POST , 1) ;
    curl_setopt($client , CURLOPT_POSTFIELDS , $json_req ) ;
    $res= curl_exec($client);    
    curl_close($client);
    //echo $res; exit;
    $res = json_decode($res);
    return $res ; 
}