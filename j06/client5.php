<?php
$url = "http://127.0.0.1/restapi/j06/api5.php";

$data=['tool'=>134 , 'arz'=>35];
$json_data = json_encode($data);


$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
curl_setopt($client , CURLOPT_POST , 1) ;
curl_setopt($client , CURLOPT_POSTFIELDS , $json_data ) ;

$res= curl_exec($client);
curl_close($client);
echo "Result:".$res;