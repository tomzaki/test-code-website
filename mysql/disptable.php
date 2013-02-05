<!DOCTYPE html>

<?php //php setup and dircetory for header and footer import
   $dir_inc = "../include/";
   include($dir_inc."phpheader.php");
?>

<?php //MySQL setup
   include($dir_inc."mySQLconfig.php")
   //connect to the MySQL server
   mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
   //select database
   mysql_select_db($mySQL_db) or die(mysql_error());
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - MySQL Display Table</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>   
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <?php 
            echo "<br>Connected to MySQL server @$mySQL_loc.
                  <br>Opened the database [$mySQL_db].
                  <br>Choose a table to display below.<br><br>";
         ?> 
         <form style="font-family:courier new;" action"disptable.php" method="post">
            <?php
            //make sure the session variable is set
            $table_name = isset($_POST["mySQL_tbl"]) 
                        ? $_POST["mySQL_tbl"] 
                        : (isset($_SESSION["mySQL_tbl"]) ? $_SESSION["mySQL_tbl"] : ""); 
            //create table name input
            echo "Table Name: <input type='text' name='mySQL_tbl' value='$table_name'><br>"
            ?>
            <input type="submit" value="Display">
         </form>
         <?php
            //form submitted
            if(isset($_POST["mySQL_tbl"])){
               //table exists
               if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$_POST["mySQL_tbl"]."'"))==1){
                  //query for MySQL table data
                  $table_data = mysql_query("SELECT * FROM ".$_POST["mySQL_tbl"])
                     or die(mysql_error());
                  //query for MySQL field data (names, type, etc)
                  $fields = mysql_query("SHOW COLUMNS FROM ".$_POST["mySQL_tbl"])
                     or die(mysql_error());
                  //retrieve just the field names   
                  $field_data = null; 
                  while($data = mysql_fetch_row($fields)){
                     $field_data[$data[0]] = $data[0];
                  }
                  //iteratively generate HTML table with MySQL table data 
                  echo "<br>All data from the [".$_POST["mySQL_tbl"]."] table:<br>";
                  echo "<table border='1'>";
                  echo "<tr>";
                  foreach($field_data as $i => $field_name){
                     echo "<th>$field_name</th>";
                  }
                  echo "</tr>";
                  while($row_data = mysql_fetch_array($table_data)){
                     echo "<tr>";
                     $num_fields = mysql_num_rows($table_data);
                     foreach($field_data as $key => $data){
                        echo "<td>".$row_data[$field_data[$data]]."</td>";
                     }
                  }
                  echo "</tr></table>";
                  $_SESSION["mySQL_tbl"] = $_POST["mySQL_tbl"]; //update the current table
               } else {
                  //report error that table exists $$$(move this to the top of the page?)
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