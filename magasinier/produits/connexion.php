<?php

//on se connecte a Mysql
try 
{ 
$conn=new PDO('mysql:host=localhost;
 dbname=socothyd','root','');
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);}
 

   catch(PDOException$e)
{echo'echec connection test <br/>'.$e->getMessage();}

?>