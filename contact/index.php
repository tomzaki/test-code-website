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
            Leave a message for me here. Please fill in all fields<br><br>
            Your Name:<br><input type="text" name="name"><br><br>
            Your Email:<br><input type="text" name="email"><br><br>
            Your Messgae:<br><textarea name="message" cols="100" rows="5"></textarea><br><br>
            <input type="submit" value="Send" />
         </form>
         <?php
            //form submitted
            if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])){
               //add data to table
               $name  = mysql_real_escape_string($_POST["name"]);
               $email = mysql_real_escape_string($_POST["email"]);
               $msg   = mysql_real_escape_string($_POST["message"]);
               mysql_query("INSERT INTO messages 
                  (name, email, msg) VALUES('".$name."', '".$email."', '".$msg."')") 
                  or die(mysql_error());  
               echo "<br>Message Sent<br>";
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
