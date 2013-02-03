<!DOCTYPE html>

<?php 
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<html lang="en">

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Users Only</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">    
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <?php
            //uses session to pull in username and 
            //password variables from previous page
            if($_SESSION["valid_login"]){
               echo "Login successful.<br><br>";
               echo "Username: ".$_SESSION["username"]."<br>";
               echo "Password: ".$_SESSION["password"]."<br><br>";
            } else {
               echo "Black Magic!<br><br>"; //somehow got to this page with invalid login
            }
         ?>
      <a href="form.php">Back to login</a>
    </div>
    <?php include($dir_inc."footer.php"); ?>
  </body>

</html>
