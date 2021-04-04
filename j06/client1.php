<?php
$url = "http://127.0.0.1/mabahes/sess06/api1.php";

$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
$res= curl_exec($client);
curl_close($client);
$book = json_decode($res);
echo "BNAME:".$book->bname . " , PRICE:".$book->price;

?>