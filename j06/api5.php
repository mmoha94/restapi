<?php
$json_data = file_get_contents("php://input");
$data =json_decode($json_data); 
$tool =$data->tool;
$arz  =$data->arz;

$mohit = 2 * ( $tool + $arz ) ;
echo $mohit;
?>