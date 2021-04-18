<?php
include('client.php');
$fid=$_GET['fid'];
$res = Request('fields' , 'delete' , ['fid'=>$fid] );
echo $res->message;
?>