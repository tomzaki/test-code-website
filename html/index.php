<!DOCTYPE html>

<?php 
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");  
?>

<html lang="en">

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - HTML</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>       
      <div id="content">
         <ul>
            <li><a href="awesome.php">Awesome</a></li>
            <li><a href="cats.php">Cats</a></li>
         </ul>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>

</html>
