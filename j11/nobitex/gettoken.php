<?php
include('client.php');
$data['username']='';
$data['password']='';
$data['captcha']='api';
$res=getToken($data);
$_SESSION['key']= $res->key;
if ($res->status=='success') {
      $_SESSION['key']= $res->key;
      echo "key:".$res->key;
}else echo "error";
