<?php
$books= [ ['bname'=>'PHP Programming' , "price"=>34000 ] ,
          ['bname'=>'Web Services' , "price"=>56000 ] ,
          ['bname'=>'Rest Api' , "price"=>98000 ] ,
                 
];
        
$books_json = json_encode($books);
echo $books_json;

?>