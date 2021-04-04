<?php
// soap client
$options = [ 
       'uri'=>'http://interfaces.core.sw.bps.com/',
       'location'=>'https://bpm.shaparak.ir/pgwchannel/startpay.mellat'
];
$client = new SoapClient(null , $options);
$params=array(
    'terminalId'     =>1000 ,
    'userName'       =>'ali' ,
    'userPassword'   =>'123' ,
    'orderId'        =>1,
    'amount'         =>2 ,
    'localDate'      =>date("Ymd") ,
    'localTime'      =>date("His") ,
    'additionalData' =>"kharid" ,
    'callBackUrl' =>'page1.php' );

$res = $client->__call('bpPayRequest' , $params );
var_dump($res);

?>