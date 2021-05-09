<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('client.php') ;
$data['symbol']='BTCIRT';
$res=PubRequest('trades' , $data);
if($res->status!='ok')
{
 echo "error";
 exit;
} ?>
<table border="1" width="500">
<tr>
   <td>زمان</td>
   <td>قیمت</td>
   <td>حجم</td>
   <td>نوع</td>
  </tr>
<?php foreach($res->trades as $row): ?>
  <tr>
   <td><?=$row->time ?></td>
   <td><?=$row->price ?></td>
   <td><?=$row->volume ?></td>
   <td><?=$row->type ?></td>
  </tr>
<?php endforeach; ?>



</body>
</html>