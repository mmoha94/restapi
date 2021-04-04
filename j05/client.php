<?php
// soap client
$options = [ 
             'uri' => 'http://codenevisan.com/ws/ser1' , 
             'location'=>'http://127.0.0.1/restapi/j05/server.php'
];

$client = new SoapClient(null , $options);
$mo = $client->__call('Mohit' , [20 , 10] );
echo "Mohit : $mo ";
$ms = $client->__call('Masahat' , [20 , 10] );
echo "  -  Masahat : $ms ";
?>