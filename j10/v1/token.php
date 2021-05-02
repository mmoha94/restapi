<?php
include('config.php');
function randStr($length = 10) {
    $characters = '0123456789abcdefghijklmnop!@#$%^&*(qrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function Response1($status , $message )
{
    header("Content-Type:application/json");
    header("HTTP/1.1 $status");
    $res['message'] = $message ;
    echo json_encode($res);
    exit;
}
function Response($status , $message , $token='' )
{
    header("Content-Type:application/json");
    header("HTTP/1.1 $status");
    $res['status'] =  $status ;
    $res['access_token'] =  $token ;
    $res['token_type'] = 'bearer';
    echo json_encode($res);
    exit;
}

$req = file_get_contents("php://input");
parse_str($req , $params);
$uname = $params['username'];
$upass = $params['password'];
$sql="select * from tbl_users 
      where uname='$uname' and upass='$upass'";
$res = mysqli_query($conn , $sql);
$user =mysqli_fetch_assoc($res) ;
if($user)
{
   $uid = $user['uid']; 
   $token=randStr(200);
   $sql="update tbl_users 
         set access_token='$token' 
         where uid=$uid ";
   mysqli_query($conn , $sql);      
   Response(200,"OK",$token);
} else  Response1(401,"access denied");  




?>