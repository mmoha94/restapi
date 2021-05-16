<?php
include('config.php');
function Response($status , $message , $data=[] )
{
    header("Content-Type:application/json");
    header("HTTP/1.1 $status");
    $res['status'] = $status ;
    $res['message'] = $message;
    $res['data'] = $data;
    
    echo json_encode($res);
    exit;
}

$header=apache_request_headers();
if(isset($header['Authorization'] ))
{
    $auth = $header['Authorization'];
    $temp = explode(' ',$auth);
    $token =$temp[1];
    $sql="select * from tbl_users 
          where access_token='$token'";
    $res = mysqli_query($conn , $sql);
    $user =mysqli_fetch_assoc($res) ;
    if(!$user)
       Response(401,"access denied 1");  

} else Response(401,"access denied 2"); 



$json_req = file_get_contents("php://input");
$req = json_decode($json_req);

$section= $req->section;
$method = $req->method;
$data   = $req->data;

switch($section)
{
    case 'studs'  :include('api-stud.php');
                  break; 
    case 'fields' :include('api-field.php');
                  break;                   
    default : Response(400 , "section not found");
}



?>