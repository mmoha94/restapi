<?php
function Mohit($tol , $arz){
  $mo = 2 * ( $tol + $arz) ;
  return $mo;
}
function Masahat($tol , $arz){
    $ms =  $tol * $arz ;
    return $ms;
  }

$options = ['uri' => 'http://codenevisan.com/ws/ser1' ];  
$server = new SoapServer(null , $options);
$server->addFunction('Mohit');
$server->addFunction('Masahat');
$server->handle();
?>