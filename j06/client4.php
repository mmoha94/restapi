<?php
$url = "http://127.0.0.1/mabahes/sess06/api4.php";

$data=['tool'=>134 , 'arz'=>35];
//$query ="tool=134&arz=35"; 
$query = http_build_query($data);



$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
curl_setopt($client , CURLOPT_POST , 1) ;
curl_setopt($client , CURLOPT_POSTFIELDS ,  $query ) ;

$res= curl_exec($client);
curl_close($client);
echo "Result:".$res;