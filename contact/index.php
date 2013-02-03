<!DOCTYPE html>

<?php 
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<?php //MySQL setup
   $mySQL_loc = "localhost";
   $mySQL_usr = "root";
   $mySQL_pwd = "bethlehood";
   $mySQL_db  = "test";
   //connect to the MySQL server
   mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
   //select database
   mysql_select_db($mySQL_db) or die(mysql_error());
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Contact</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <form action="index.php" method="post">
            If you want to get in contact, leave a message here and I might see it eventually:<br>
            <textarea name="message" cols="100" rows="5">Leave a message here</textarea><br>
            <input type="submit" value="save" />
         </form>
         <?php
            //form submitted
            if(isset($_POST["message"])){
               //add data to table
               mysql_query("INSERT INTO messages 
                  (msg) VALUES('".$_POST["message"]."')") 
                  or die(mysql_error());  
               echo "<br>Message Sent<br>";
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
