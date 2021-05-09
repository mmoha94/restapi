<?php
include('client.php');
$data['number']='';
$data['bank']=' ';
$res= Request('cards-add');
if($res->status!='ok'){
    echo "error"; exit;
}
else echo "card added";
?>    
