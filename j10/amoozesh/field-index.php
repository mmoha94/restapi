<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fields</title>
</head>
<body>
<h2>
Fields
</h2>
<hr>
<?php
include('client.php');
$res = Request('fields' , 'index');

if ($res->status==200) : ?>
  <table width="600" border="1">
    <tr> 
      <td>fid</td>
      <td>fname</td>
      <td></td>
    </tr>
<?php foreach($res->data as $row): ?>
    <tr> 
      <td><?=$row->fid?></td>
      <td><?=$row->fname?></td>
      <td><a href="field-delete.php?fid=<?=$row->fid?>">
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