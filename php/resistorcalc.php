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
      <script type="text/javascript" src="resistor_tool.js"></script>
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content_left">         
         <div id="result">
            <?php include("resistortool.php"); ?>
         </div>
      </div>
      <div id="content_right">
         <table style="box-shadow: none;">
            <colgroup>
               <col span="1" style="width: 250px;">
            </colgroup>
            <tr><td style="vertical-align: top;">
               <form method="post">
               
               <?php 
                  $gain   = isset($_POST['gain'])   ? $_POST['gain']   : "100"; 
                  $thresh = isset($_POST['thresh']) ? $_POST['thresh'] : "5";
                  $r1l    = isset($_POST['r1l'])    ? $_POST['r1l']    : "0";
                  $r1h    = isset($_POST['r1h'])    ? $_POST['r1h']    : "999";
                  $tol    = isset($_POST['tol'])    ? $_POST['tol']    : "E48";
                  $inv    = isset($_POST['inv'])    ? $_POST['inv']    : 1;
                  echo("
                  Type:<br><select type='text' name='inv'>
                     <option value=1".(($inv == 1) ? " selected" : "").">Non-Inverting</option>
                     <option value=0".(($inv == 0) ? " selected" : "").">Inverting</option>
                  </select><br><br>
                  Gain:<br>              <input  type='text' name='gain'   value=$gain><br><br>
                  Gain Threshold(%):<br> <input  type='text' name='thresh' value=$thresh><br><br>
                  R1 Low:<br>            <input  type='text' name='r1l'    value=$r1l><br><br>
                  R1 High:<br>           <input  type='text' name='r1h'    value=$r1h><br><br>      
               
                  Resistor Tolerance:<br><select type='text' name='tol'>
                     <option value='E6'".  (!strcmp($tol,"E6")   ? " selected" : "").">20%</option>
                     <option value='E12'". (!strcmp($tol,"E12")  ? " selected" : "").">10%</option>
                     <option value='E24'". (!strcmp($tol,"E24")  ? " selected" : "").">5%</option>
                     <option value='E48'". (!strcmp($tol,"E48")  ? " selected" : "").">2%</option>
                     <option value='E96'". (!strcmp($tol,"E96")  ? " selected" : "").">1%</option>
                     <option value='E192'".(!strcmp($tol,"E192") ? " selected" : "").">0.5%</option>
                  </select><br><br>
                  ");
               ?>
                  <input type="submit" value="Calculate" onclick="calc()"><br>
                  <p style="font-size: 75%">                  
                     Note: There is a known sorting bug in this applicaiton. The results are first sorted by
                     &Delta; and then by R1. The sorting is <i>almost</i> perfect, but for some reason
                     the last item in the list is always out of place. As far as I can tell this is a
                     bug with php5's usort function and not my &Delta; comparison function.
                  </p>
               </form>
         </table>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>