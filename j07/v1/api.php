<?php
function mohit( $tool , $arz)
{
    $m = 2 * ( $tool + $arz ) ;
    return $m;
}
function masahat( $tool , $arz)
{
    $m = $tool * $arz ;
    return $m;
}

$req = file_get_contents("php://input");
parse_str($req , $params);
$method = $params['method'];
$tool   = $params['tool'];
$arz    = $params['arz'];
switch($method)
{
    case 'mohit'  : $res = mohit( $tool , $arz  );
                    break; 
    case 'masahat' :$res = masahat( $tool , $arz  );
                    break;                    
}

header("Content-Type:application/json");
header("HTTP/1.1 200");
header("X-Author:mohammadi");
echo $res;

?>