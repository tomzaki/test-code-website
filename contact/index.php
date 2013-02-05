<!DOCTYPE html>

<?php 
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
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
         <form action="formcomplete.php" method="post">
            Leave a message for me here. Please fill in all fields<br><br>
            Your Name:<br><input type="text" name="name"><br><br>
            Your Email:<br><input type="text" name="email"><br><br>
            Your Messgae:<br><textarea name="message" cols="100" rows="5"></textarea><br><br>
            <input type="submit" value="Send" />
         </form>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
