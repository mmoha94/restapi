<?php
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