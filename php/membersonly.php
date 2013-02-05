<!DOCTYPE html>

<?php //php setup and login check
   include("/home/webserver/public_html/phpheader.php");
   include("/home/webserver/public_html/checklogin.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Members Only</title>
      <link rel="stylesheet" href="/home/webserver/public_html/media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         YOU MADE IT INSIDE. WOO!
         <?php
         // Define the full path to your folder from root 
         $path = "./.."; 

         // Open the folder 
         $dir_handle = @opendir($path) or die("Unable to open $path"); 

         // Loop through the files 
         while ($file = readdir($dir_handle)) { 
            if($file == "." || $file == ".." || $file == "index.php" ) continue; 
            echo "<a href=\"$file\">$file</a><br />"; 
         } 
         // Close 
         closedir($dir_handle);
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
