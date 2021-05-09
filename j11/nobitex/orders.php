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
$res=PubRequest('orderbook' , $data);
if($res->status!='ok')
{
 echo "error";
 exit;
} ?>
<h2>درخواست های فروش</h2>
<table border="1" width="500">
<tr>
   <td>قیمت</td>
   <td>حجم</td>
  </tr>
<?php foreach($res->bids as $row): ?>
  <tr>
   <td><?=$row[0] ?></td>
   <td><?=$row[1] ?></td>
  </tr>
<?php endforeach; ?>
</table>
<h2>درخواست های خرید</h2>
<table border="1" width="500">
<tr>
   <td>قیمت</td>
   <td>حجم</td>
  </tr>
<?php foreach($res->asks as $row): ?>
  <tr>
   <td><?=$row[0] ?></td>
   <td><?=$row[1] ?></td>
  </tr>
<?php endforeach; ?>

</table>

</body>
</html>