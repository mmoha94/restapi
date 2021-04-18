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

function mohit( $tool , $arz)
{
    $m = 2 * ( $tool + $arz ) ;
    Response(200 , "OK" , $m);
}
function masahat( $tool , $arz)
{
    $m = $tool * $arz ;
    Response(200 , "OK" , $m);
}

$req = file_get_contents("php://input");
parse_str($req , $params);
$method = $params['method'];
$tool   = $params['tool'];
$arz    = $params['arz'];

switch($method)
{
    case 'mohit'  : mohit( $tool , $arz  );
                    break; 
    case 'masahat' :masahat( $tool , $arz  );
                    break;  
    default : Response(400 , "method not found");                                  
}



?>