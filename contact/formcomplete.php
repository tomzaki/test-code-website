<!DOCTYPE html>

<?php 
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
      <title>Pintsize Server - Contact</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         Sending Message...
         <?php
            $name  = "";
            $email = "";
            $msg   = "";
            //form submitted
            if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])){
               //add data to table
               $name  = mysql_real_escape_string($_POST["name"]);
               $email = mysql_real_escape_string($_POST["email"]);
               $msg   = mysql_real_escape_string($_POST["message"]);
               mysql_query("INSERT INTO messages 
                  (name, email, msg) VALUES('".$name."', '".$email."', '".$msg."')") 
                  or die(mysql_error());  
               
               //MAIL SENDING CODE
               require_once "Mail.php";

               $from = $name." <noreply.tomzaki@gmail.com>";
               $to = "noreply.tomzaki@gmail.com";
               $subject = "Contact";
               $body = "From: ".$name.
                     "\nEmail: ".$email.
                     "\nMessage:\n".$msg;

               $host = "ssl://smtp.gmail.com";
               $port = "465";
               $username = "zakatk857@gmail.com";
               $password = "bUgaboo78";

               $headers = array ('From' => $from,
                  'To' => $to,
                  'Subject' => $subject);
               $smtp = Mail::factory('smtp',
                  array (
                     'host' => $host,
                     'port' => $port,
                     'auth' => true,
                     'username' => $username,
                     'password' => $password));

               $mail = $smtp->send($to, $headers, $body);

               if (PEAR::isError($mail)) {
                  echo("<br>Message failed to send, try again.");
               } else {
                  echo("<br>Message successfully sent!");
               }
               echo("<br   ><a href='index.php'>Return to Contact Page</a>");
            }

         ?>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>
  
</html>