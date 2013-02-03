<!DOCTYPE html>

<?php //php setup and dircetory for header and footer import
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - JavaScript</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <form onsubmit="argue()">
            <input type="submit" value="CLICK ME"> to save the princess!
         </form>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>

<script>
   function argue() {
      var result = confirm('YOUR PRINCESS IS IN ANOTHER CASTLE, MARIO.');
      while(!result){
         result = confirm('CANCEL IS NOT A VALID OPTION, PRESS OK AND ACCEPT DEFEAT.');
      }
      alert("YOU LOSE!");
   }
</script>