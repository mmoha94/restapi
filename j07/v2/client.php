<?php
$url = "http://127.0.0.1/restapi/j07/v2/api.php";

$data=['method'=>'mohit' ,'tool'=>134 , 'arz'=>35];
$query=http_build_query($data);

$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
curl_setopt($client , CURLOPT_POST , 1) ;
curl_setopt($client , CURLOPT_POSTFIELDS , $query ) ;

$res= curl_exec($client);
curl_close($client);
$res = json_decode($res);
if ( $res->status==200)
{
    $data = $res->data;
    echo "Result: " . $res->data;
} else echo $res->message;
