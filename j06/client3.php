<?php
$url = "http://127.0.0.1/mabahes/sess06/api3.php?bid=2";

$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
$res= curl_exec($client);
curl_close($client);
echo $res;