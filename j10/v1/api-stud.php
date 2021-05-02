<?php
function add($row){
  global $conn;
  $name = $row->name;
  $avgr = $row->avgr;
  $fid  = $row->fid;
  $res=mysqli_query($conn , 
    "insert into tbl_studs(name,avgr,fid) values('$name',$avgr,$fid)");
              
  if ($res) 
       Response(200 , 'record added' );     
  else Response(400 , 'DB error' );
}

function edit($sid){
  global $conn;
  $res=mysqli_query($conn , 
    "select * from tbl_studs where sid=$sid ");
  if ($res) 
  {
    $row = mysqli_fetch_assoc($res);
    if ($row) 
         Response(200 , 'ok' , $row );
    else Response(404 , 'not found' );     
  }
  else Response(400 , 'DB error' );
}

function update($row){
  global $conn;
  $sid  = $row->sid;
  $name = $row->name;
  $avgr = $row->avgr;
  $fid  = $row->fid;
  $res=mysqli_query($conn , 
    "update tbl_studs set name='$name',avgr='$avgr',fid='$fid'
              where sid=$sid ");
  if ($res) 
       Response(200 , 'record updated' );     
  else Response(400 , 'DB error' );
}

function search($row){
  global $conn;
  $sql = "select * from tbl_studs where 1=1 ";
  if (isset($row->sid)) 
     $sql.=" and sid=".$row->sid ; 
  if (isset($row->fid)) 
     $sql.=" and fid=".$row->fid ; 
  if (isset($row->name)) 
     $sql.=" and name like '%".$row->name."%' " ;      

  $res=mysqli_query($conn , $sql);
  $data=[];
  while($row=mysqli_fetch_assoc($res))
  $data[]=$row;
  Response(200 , 'OK' , $data);
}
function index(){
   global $conn;
   $res=mysqli_query($conn , "select * from tbl_studs");
   $data=[];
   while($row=mysqli_fetch_assoc($res))
   $data[]=$row;
   Response(200 , 'OK' , $data);
}
function delete($sid){
    global $conn;
    $res=mysqli_query($conn , 
      "delete from tbl_studs where sid=$sid ");
    if ($res) 
         Response(200 , '1 record deleted' );
    else Response(400 , 'DB error' );
 
 }
switch($method)
{
    case 'index'  : index();
                    break; 
    case 'delete' : delete($data->sid);
                    break; 
    case 'add'    : add($data);
                    break;                       
    case 'edit'   : edit($data->sid);
                    break; 
    case 'update' : update($data);
                    break;    
    case 'search' : search($data);
                    break;                                       
    default : Response(400 , "method not found");                                  
}
?>