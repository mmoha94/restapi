<?php
include('client.php');
$sid=$_GET['sid'];
$res = Request('studs' , 'delete' , ['sid'=>$sid] );
echo $res->message;
?>