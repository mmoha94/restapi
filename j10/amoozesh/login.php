<?php
include('client.php');
if(isset($_POST['user'])) {
   $user = $_POST['user'];
   $pass = $_POST['pass'];

$res = getToken($user , $pass);
if ($res->status==200) {
      $_SESSION['access_token']= $res->access_token;
     header("location:stud-index.php");
}else echo $res->message;
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
  <form action="login.php" method="post">
    <h1>Authorization </h1>
    username: <br>
    <input type="text" name="user">
    <br>
    password:<br>
    <input type="password" name="pass">
 <br>
 <input type="submit" value="login"/>
  </form>    
</body>
</html>