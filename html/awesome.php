<!DOCTYPE html>

<?php 
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<html lang="en">

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - HTML Tags</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         Is this awesome?<br>
         <form>
           <select>
            <option value=1>Yes</option>
            <option value=2 selected>Indeed</option>
            <option value=3>Of course</option>
            <option value=4>Undoubtedly</option>
            <option value=5>It is decidedly so</option>
           </select>
         </form>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>

</html>
