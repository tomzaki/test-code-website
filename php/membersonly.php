<!DOCTYPE html>

<?php //php setup and dircetory for header and footer import
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
   include($dir_inc."checklogin.php"); // add this to make mage secure
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Members Only</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         YOU MADE IT INSIDE. WOO!<br><br>
         <?php
            if(isset($_COOKIE["logindata"])) {
               echo("You'll stay logged in (even after you close your browser) ".
                    "until you choose to log out. Remember to log out before ".
                    "leaving a public computer");
            } else {
               echo("You will be logged out at ".$_COOKIE['loginexpire']." ".
                    "unless you reamin active on the site.<br><br>");
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
