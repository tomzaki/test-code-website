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
         <br>
         <form onsubmit="wiggle()" method="POST">
            <input type="text" name="tag" value="html">
            <input type="submit" value="wiggle tag">
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
   function move() {
      for(i=0; i < e_length; i++) {
         e_style = elements[i].style;
         e_style.position='absolute';
         e_style.left = (Math.sin(R*x1 + i*x2 + x3) * x4 + x5) + "px";
         e_style.top  = (Math.cos(R*y1 + i*y2 + y3) * y4 + y5) + "px"
      }
      R++;
   }
   function wiggle() {
      var R=0;
      var x1=  0.10; var y1=  0.05;
      var x2=  0.25; var y2=  0.24;
      var x3=  1.60; var y3=  0.24;
      var x4=300.00; var y4=200.00;
      var x5=300.00; var y5=200.00;
      var elements = document.getElementsByTagName("<?php echo($_POST['tag']); ?>"); 
      var e_length = elements.length;      
      setInterval(move(),5);
   }
</script>