<?php
require("config.php");
require("nusoap.php");

$SrvAddr = 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl';
$PayAddr = 'https://bpm.shaparak.ir/pgwchannel/startpay.mellat';
$CallBack= "https://www.codenevisan.com/bpm/pay-verify.php";
$namespace='http://interfaces.core.sw.bps.com/';


$client = new nusoap_client($SrvAddr);
if($client->getError())
	die("Error in conneting to WS");

$params=array(
   'terminalId'     =>BPM_ID ,
   'userName'       =>BPM_USER ,
   'userPassword'   =>BPM_PASS ,
   'orderId'        =>1,
   'amount'         =>100 ,
   'localDate'      =>date("Ymd") ,
   'localTime'      =>date("His") ,
   'additionalData' =>"kharid" ,
   'callBackUrl' =>'' );

   $result=$client->call("bpPayRequest" , $params , $namespace);
   if($client->fault || $client->getError())
	   die("Error in Call payRequest");

   $res=explode(',',$result);
   $resCode=$res[0];
   $refId  =$res[1];
   if ( $resCode!=0)
	   die("Error in PayRequest #".$resCode);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1 align=""> conneting to BANK </h1>
<form id="pay1" action="<?php echo $PayAddr; ?>" method="post">
	<input type="hidden" value="<?php echo $refId; ?>" name="RefId">
</form>
<script > document.getElementById("pay1").submit(); </script>


</body>
</html>
