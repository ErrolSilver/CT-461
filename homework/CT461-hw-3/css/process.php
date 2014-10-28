<?php
  mysql_connect("localhost","root","");
  mysql_select_db("php_databaseajax");
 
  $name=$_POST["name"];
  $message=$_POST["message"];
 
  $query=mysql_query("INSERT INTO comment(name,message) values('$name','$message') ");
 
  if($query){
    echo "Your comment has been sent";
  }
  else{
    echo "Error in sending your comment";
  }
?>
