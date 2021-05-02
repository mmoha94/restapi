<?php
include('client.php');
$res = getToken('user1' , '123');
if ($res->status==200) {
      $_SESSION['access_token']= $res->access_token;
      echo $res->access_token;
}else echo $res->message;