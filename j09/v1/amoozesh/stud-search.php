<?php
include('client.php');
if(isset($_POST['name']))
{
  $data=[];
  if($_POST['sid']!='')
      $data['sid'] = $_POST['sid'];
  if( $_POST['name']!='')    
      $data['name'] = $_POST['name'];
  if( $_POST['fid']!='')  
      $data['fid']  = $_POST['fid'];
  $res = Request("studs","search",$data);
}
?>

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
<form action="stud-search.php" method="post">
       sid : 
       <input type="text" name="sid"/> 
       name : 
       <input type="text" name="name"/> 
       Field : 
       <input type="text" name="fid"/>  
      <input type="submit" value="  Search "   />
</form>
<hr>
<?php
if(isset($res)):
if ($res->status==200) : ?>
  <table width="600" border="1">
    <tr> 
      <td>sid</td>
      <td>sname</td>
      <td>avgr</td>
      <td>fid</td>
      <td><a href="stud-add.php">add stud</a></td>
    </tr>
<?php foreach($res->data as $row): ?>
    <tr> 
      <td><?=$row->sid?></td>
      <td><?=$row->name?></td>
      <td><?=$row->avgr?></td>
      <td><?=$row->fid?></td>
      <td><a href="stud-delete.php?sid=<?=$row->sid?>">
      delete 
      </a>
      
      |
      <a href="stud-edit.php?sid=<?=$row->sid?>">
      edit 
      </a>
      
      </td>
    </tr>

<?php endforeach; ?>

  </table>  
<?php else: ?>
<h3> <?php echo $res->message; ?> </h3>
<?php endif; ?>  
<?php endif; ?>  
</body>
</html>