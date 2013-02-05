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
      <title>Pintsize Server - MySQL Add Data</title>
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
         <form style="font-family:courier new;" action="adddata.php" method="post">
            <?php
            //make sure the session variable is set
            $table_name = isset($_POST["mySQL_tbl"]) 
                        ? $_POST["mySQL_tbl"] 
                        : (isset($_SESSION["mySQL_tbl"]) ? $_SESSION["mySQL_tbl"] : ""); 
            //create table name input
            echo "Table Name: <input type='text' name='mySQL_tbl' value='$table_name'><br>"
            ?>
            [Data]Name: <input type="text" name="name"><br>
            [Data]Age : <input type="text" name="age"><br>
            <input type="submit" value="Add">
         </form>
         <?php
            //form submitted
            if(isset($_POST["mySQL_tbl"])){
               //table already exists
               if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$_POST["mySQL_tbl"]."'"))==1){
                  //add data to table
                  mysql_query("INSERT INTO ".$_POST["mySQL_tbl"]." 
                     (name, age) VALUES('".$_POST["name"]."', '".$_POST["age"]."')") 
                     or die(mysql_error());  
                  echo "<br>Successfully added new data to the [".$_POST["mySQL_tbl"]."] table<br>";
                  $_SESSION["mySQL_tbl"] = $_POST["mySQL_tbl"]; //update the current table
               } else {
                  //report error that table does not exist $$$(move this to the top of the page?)
                  echo "<span style=\"color:#f00\";>
                       <br>Table [".$_POST["mySQL_tbl"]."] does not exist. Try another name.
                       </span><br>";
               }
            }
         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>