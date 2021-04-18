<?php
$url = "http://127.0.0.1/restapi/j08/v1/api.php";

$method="mohit";
$data=['tool'=>134 , 'arz'=>35];
$req['section']= 'rect';
$req['method'] = $method;
$req['data']   = $data ;
$json_req = json_encode( $req  );

$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
curl_setopt($client , CURLOPT_POST , 1) ;
curl_setopt($client , CURLOPT_POSTFIELDS , $json_req ) ;

$res= curl_exec($client);
curl_close($client);
$res = json_decode($res);
if ( $res->status==200)
{
    $data = $res->data;
    echo "Result: " . $res->data;
} else echo $res->message;
