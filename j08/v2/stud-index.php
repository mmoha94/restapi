<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
<h2>
Students
</h2>
<hr>
<?php
include('client.php');
$res = Request('studs' , 'index');
if ($res->status==200) : ?>
  <table width="600" border="1">
    <tr> 
      <td>sid</td>
      <td>sname</td>
      <td>avgr</td>
      <td>fid</td>
      <td></td>
    </tr>
<?php foreach($res->data as $row): ?>
    <tr> 
      <td><?=$row->sid?></td>
      <td><?=$row->name?></td>
      <td><?=$row->avgr?></td>
      <td><?=$row->fid?></td>
      <td><a href="stud-delete.php?sid=<?=$row->sid?>">
      delete 
      </a></td>
    </tr>

<?php endforeach; ?>

  </table>  
<?php else: ?>
<h3> <?php echo $res->message; ?> </h3>
<?php endif; ?>  
</body>
</html>