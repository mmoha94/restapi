<?php
include('client.php');
if(isset($_POST['name']))
{
    $data['sid'] = $_POST['sid'];
    $data['name'] = $_POST['name'];
    $data['avgr'] = $_POST['avgr'];
    $data['fid']  = $_POST['fid'];
    $res = Request("studs","update",$data);
    if($res->status==200)
       header("location:stud-index.php");
    else echo $res->message;   
}

$sid = $_GET['sid'];
$res =Request("studs","edit",['sid'=>$sid]);
if ( $res->status==200 ) :
   $row = $res->data;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>
edit student
</h1>
<hr>
    <form action="stud-edit.php" method="post">
    sid : <br>
       <input readonly type="text" name="sid" value="<?=$row->sid?>" /> <br>
       name : <br>
       <input type="text" name="name" value="<?=$row->name?>" /> <br>
       average : <br>
       <input type="text" name="avgr" value="<?=$row->avgr?>"/> <br>
       Field : <br>
       <input type="text" name="fid" value="<?=$row->fid?>"/> <br> 

       <input type="submit" value="  Save "   />
    </form>
</body>
</html>
<?php else:
echo $res->message;
endif; ?>