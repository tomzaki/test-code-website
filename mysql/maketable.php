<!DOCTYPE html>

<?php //php setup and dircetory for header and footer import
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<?php //MySQL setup
   $mySQL_loc = "localhost";
   $mySQL_usr = "root";
   $mySQL_pwd = "bethlehood";
   $mySQL_db  = "test";
   //connect to the MySQL server
   mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
   //select database
   mysql_select_db($mySQL_db) or die(mysql_error());
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - MySQL Make Table</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>   
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <?php
            echo "<br>Connected to MySQL server @$mySQL_loc.
                  <br>Opened the database [$mySQL_db].
                  <br>Add a table below.<br><br>";
         ?> 
         <form style="font-family:courier new;" action="maketable.php" method="post">
            Table Name: <input type="text" name="mySQL_tbl"><br>
            <input type="submit" value="Create">
         </form>
         <?php
            //form submitted
            if(isset($_POST["mySQL_tbl"])){
               //table doesnt already exist
               if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$_POST["mySQL_tbl"]."'"))==0){
                  //create table 
                  mysql_query("CREATE TABLE ".$_POST["mySQL_tbl"]."(
                     id INT NOT NULL AUTO_INCREMENT, 
                     PRIMARY KEY(id),
                     name VARCHAR(30),
                     age INT)")
                     or die(mysql_error());
                  echo "<br>Created the [".$_POST["mySQL_tbl"]."] table<br>";
                  $_SESSION["mySQL_tbl"] = $_POST["mySQL_tbl"]; //update the current table
               } else {
                  //report error that table exists $$$(move this to the top of the page?)
                  echo "<span style=\"color:#f00\";>
                       <br>Table [".$_POST["mySQL_tbl"]."] already exists. Try another name.
                       </span><br>";
               }
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>