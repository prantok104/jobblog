<?php
   session_start();
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   $dbcon = mysql_select_db('blog3');
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
   
?>