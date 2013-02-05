<!DOCTYPE html>

<?php 
   include("/home/webserver/public_html/checklogin.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - PHP</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="form.php">PHP Form</a></li>
            <li><a href="test.php">PHP Info</a></li>
            <li><a href="phpmyadmin/index.php">PHPMyAdmin</a></li>
            <li><a href="resistorcalc.php">Resistor Gain Tool</a></li>
         </ul>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
