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
include('client.php');
$res= Request('profile');
if($res->status!='ok'){
    echo "error"; exit;
}
$profile=$res->profile;
?>    
<table border="1">
<tr>
 <td> usrname  </td>
 <td> <?=$profile->username?> </td>
</tr>
<tr>
 <td> Name  </td>
 <td> <?=$profile->firstName?> </td>
</tr>
<tr>
 <td> Family  </td>
 <td> <?=$profile->lastName?> </td>
</tr>

</table>


</body>
</html>