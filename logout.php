<?php
try{
   session_start();
   if(session_destroy()) {
      header("Location: test1.php");
   }
}
catch (Exception $ex) 
{
   echo $ex->getMessage();
}
?>