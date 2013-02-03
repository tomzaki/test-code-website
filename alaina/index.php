<!DOCTYPE html>

<?php //php setup and dircetory for header and footer import
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Page Title</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <form action="index.php" method="post">
            <?php
            //make sure the post and or session variables are set
            $name = isset($_POST["a_name"]) 
                     ? $_POST["a_name"] 
                     : (isset($_SESSION["a_name"]) ? $_SESSION["a_name"] : "ALAINA"); 
            $num  = isset($_POST["a_num"]) 
                     ? $_POST["a_num"] 
                     : (isset($_SESSION["a_num"]) 
                        ? $_SESSION["a_num"] 
                        : 4); 
            //create table name input
            echo "name: <input type='text' name='a_name' value='$name'><br>";
            echo "number of loops: <input type='text' name='a_num' value=$num maxlength='2' size='1'><br>";
            ?>
            <input type="submit">
         <form>
         <?php
            if(isset($_POST["a_name"])){
               $_SESSION["a_name"] = $_POST["a_name"]; //update the name 
            }
            if(isset($_POST["a_num"])){
               $_SESSION["a_num"] = $_POST["a_num"]; //update the number of loops
            }
            if(isset($_SESSION["a_name"])){
               if($_SESSION["a_name"]!=""){
                  for($i = 0; $i < $num; $i++){
                     echo "<h1><span class='rainbow'> THIS IS ".strtoupper($_SESSION["a_name"])
                          ."'S PAGE. IT IS THE BEST PAGE.</span></h1>";
                  } 
               }
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>
