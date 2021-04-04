<?php
require("config.php");
require("nusoap.php");
$SrvAddr = 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl';


function Request($ws , $method , $params)
{
   $namespace='http://interfaces.core.sw.bps.com/';
   $result=$ws->call($method , $params , $namespace);
   if($ws->fault || $ws->getError())
	   return [-1,-1];
   
   $res=explode(',',$result);
   return $res;
}



if(!isset($_POST['RefId'])) 
	die("Error parameters not found");

$RefId  =addslashes($_POST['RefId']);
$ResCode  =addslashes($_POST['ResCode']);
$SaleOrderId =addslashes($_POST['SaleOrderId']);
$SaleReferenceId=addslashes($_POST['SaleReferenceId']);
$CardHolderPan  =addslashes($_POST['CardHolderPan']); 
$Pdate = date("Y-m-d H:i:s");

if($ResCode!=0)
	die("Error in Payment #$ResCode");

$client = new nusoap_client($SrvAddr);
if($client->getError())
	die("Error in conneting to WS");

$params=array(
   'terminalId'     =>BPM_ID ,
   'userName'       =>BPM_USER ,
   'userPassword'   =>BPM_PASS ,
   'orderId'        =>$SaleOrderId,
   'saleOrderId'    =>$SaleOrderId ,
   'saleReferenceId'=>$SaleReferenceId  );

   $settle  =false;
   $inquiry =false;
   $reverse =false;
   $complete=false;

   $res=Request( $client , "bpVerifyRequest" ,$params);
   if ( $res[0]!=0) {
	   echo("Error in bpVerifyRequest #".$res[0]);
	   $inquiry=true;
   }else $settle=true;
   if( $inquiry)
   {
	 $res=Request( $client , "bpInquiryRequest" ,$params);
     if ( $res[0]!=0) {
	   echo("Error in bpInquiryRequest #".$res[0]);
	   $reverse=true;
     }else $settle=true;
   }
   if( $settle)
   {
	 $res=Request( $client , "bpSettleRequest" ,$params);
     if ( $res[0]!=0) {
	   echo("Error in bpSettleRequest #".$res[0]);
	   $reverse=true;
     }else $complete=true;
   }
   if( $reverse)
   {
	 $res=Request( $client , "bpReversalRequest" ,$params);
	 echo "تراکنش با خطا مواجه شد، اگر مبلغی از حساب شما کسر شده باشد، برگشت داده خواهد شد.";
     $status="falied";
   }

 if( $complete)
   {
	 echo "پرداخت با موفقیت انجام شد  . شناسه مرجع پرداخت شما : " . $SaleReferenceId; 
	 $status="complete";
	  
  }
 $sql= "UPDATE tbl_orders SET      refId='$RefId',
	                               saleRefId='$SaleReferenceId',
								   cardId = '$CardHolderPan',
								   pdate='$Pdate' ,
								   status='$status'
								   WHERE orderId='$SaleOrderId' " ;
$res=mysqli_query($conn , $sql);
?>


