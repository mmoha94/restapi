<?php
$url = "http://127.0.0.1/mabahes/sess06/api2.php";

$client = curl_init($url);
curl_setopt($client , CURLOPT_RETURNTRANSFER , 1);
$res= curl_exec($client);
curl_close($client);
$books = json_decode($res);
//var_dump($books);
?>
<table border="1" width="500">
<tr>
    <td>Name </td>  
    <td>Price</td> 
   </tr>
<?php foreach($books as $book) { ?> 
    <tr>
    <td><?=$book->bname?> </td>  
    <td><?=$book->price?> </td> 
   </tr>
<?php } ?>


</table>