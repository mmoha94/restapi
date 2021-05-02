<?php
function index(){
   global $conn;
   $res=mysqli_query($conn , "select * from tbl_fields");
   $data=[];
   while($row=mysqli_fetch_assoc($res))
   $data[]=$row;
   Response(200 , 'OK' , $data);

}
function delete($fid){
    global $conn;
    $res=mysqli_query($conn , 
      "delete from tbl_fields where fid=$fid ");
    if ($res) 
         Response(200 , '1 record deleted' );
    else Response(400 , 'DB error' );
 
 }
switch($method)
{
    case 'index'  : index();
                    break; 
    case 'delete' : delete($data->fid);
                    break; 

    default : Response(400 , "method not found");                                  
}
?>