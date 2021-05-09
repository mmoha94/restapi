<?php
include('client.php');
$data['username']='';
$data['password']='';
$data['captcha']='api';
$res=getToken($data);
if ($res->status=='success') {
      $_SESSION['token']= $res->key;
      echo $res->key;
}else echo "error";