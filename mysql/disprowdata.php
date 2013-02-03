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
      <title>Pintsize Server - MySQL Display Row Data</title>
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
            echo "Table Name: <input type='text' name='mySQL_tbl' value='$table_name'>";
            ?>
            <input type="submit" value="Select Table">
         </form>
         <?php 
            //form submitted
            if(isset($_POST["mySQL_tbl"])){                
               //update current table
               $_SESSION["mySQL_tbl"] = $_POST["mySQL_tbl"];
            }
            //form submitted
            if(isset($_SESSION["mySQL_tbl"]) && $_SESSION["mySQL_tbl"] != ""){
               //count rows in that table
               if(isset($_POST["mySQL_tbl"])) $_SESSION["mySQL_tbl"] = $_POST["mySQL_tbl"];
               $sql = mysql_query("SELECT * FROM ".$_SESSION["mySQL_tbl"]) or die(mysql_error());
               $num_rows = mysql_num_rows($sql);
               if($num_rows){
                  $current_row = isset($_POST["mySQL_row"]) 
                               ? $_POST["mySQL_row"] 
                               : (isset($_SESSION["mySQL_row"]) ? $_SESSION["mySQL_row"] : ""); 
                  echo "<form style='font-family:courier new;' action'disptable.php' method='post'>
                           Row Number:
                           <select name='mySQL_row'>";
                  for($i = 0; $i < $num_rows; $i++){
                     echo "<option value=$i";
                     if($i == $current_row) echo " selected";
                     echo ">$i</option>";
                  }
                  echo    "</select>
                           <input type='submit' value='Select Row'>
                        </form>";
               }
            }
         ?>
         <?php 
            //form submitted
            if(isset($_POST["mySQL_row"])){
               //table exists
               if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$_SESSION["mySQL_tbl"]."'"))==1){
                  //query My SQL table 
                  $table_data = mysql_query("SELECT * FROM ".$_SESSION["mySQL_tbl"])
                     or die(mysql_error());
                  //get row data
                  mysql_data_seek($table_data, $_POST["mySQL_row"]);
                  $row_data = mysql_fetch_array($table_data);
                  echo "<tr><td>";
                  //query for MySQL field data (names, type, etc)
                  $fields = mysql_query("SHOW COLUMNS FROM ".$_SESSION["mySQL_tbl"])
                     or die(mysql_error());
                  //retrieve just the field names   
                  $field_data = null; 
                  while($data = mysql_fetch_row($fields)){
                     $field_data[$data[0]] = $data[0];
                  }
                  //iteratively generate HTML table with MySQL table data 
                  echo "<br>Data from [".$_SESSION["mySQL_tbl"]."]'s row number [".$_POST["mySQL_row"]."]:<br>";
                  echo "<table border='1'>";
                  echo "<tr>";
                  foreach($field_data as $i => $field_name){
                     echo "<th>$field_name</th>";
                  }
                  echo "</tr><tr>";
                  $num_fields = mysql_num_rows($table_data);
                  foreach($field_data as $key => $data){
                     echo "<td>".$row_data[$field_data[$data]]."</td>";
                  }
                  echo "</tr></table>";
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