<?php
include('client.php');
if(isset($_POST['name']))
{
    $data['name'] = $_POST['name'];
    $data['avgr'] = $_POST['avgr'];
    $data['fid']  = $_POST['fid'];
    $res = Request("studs","add",$data);
    if($res->status==200)
       header("location:stud-index.php");
    else echo $res->message;   
}
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
add student
</h1>
<hr>
    <form action="stud-add.php" method="post">
       name : <br>
       <input type="text" name="name"/> <br>
       average : <br>
       <input type="text" name="avgr"/> <br>
       Field : <br>
       <input type="text" name="fid"/> <br> 

       <input type="submit" value="  Add "   />
    </form>
</body>
</html>