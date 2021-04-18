<?php
$conn = mysqli_connect("localhost:3308","root","","amoozesh"); 
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

    default : Response(400 , "method not found");                                  
}
?>