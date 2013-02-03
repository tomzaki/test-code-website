<!DOCTYPE html>

<?php
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - MySQL</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <ul>
            <li><a href="maketable.php">Create Tables</a></li>
            <li><a href="disptable.php">Display Tables</a></li>
            <li><a href="adddata.php">Add Data to Table</a></li>
            <li><a href="disprowdata.php">Get Data from Table</a></li>
         </ul>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
