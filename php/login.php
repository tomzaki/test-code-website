<!DOCTYPE html>

<?php 
   $dir_inc = "../include/"; 
   include($dir_inc."phpheader.php");  
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Login Page</title>
      <link rel="stylesheet" href="../media/style.css" type="text/css" media="screen">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <?php //validation script 
            if(isset($_POST["username"]) && isset($_POST["password"])){ 
               
               if ((!ereg("^[A-Za-z0-9]", $_POST['username'])) || (strlen($_POST['username']) < 4)) {
                  echo("<span style='color: #993300;'>Invalid username. Try again.</span><br><br>");               
               } else {
                  
                  //database variables for login
                  $mySQL_loc = "localhost";
                  $mySQL_usr = "root";
                  $mySQL_pwd = "bethlehood";
                  $mySQL_db  = "webserver";
                  //connect to the MySQL server
                  mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
                  //select database
                  mysql_select_db($mySQL_db) or die(mysql_error());
               
                  $username = mysql_real_escape_string($_POST["username"]);
                  $password = hash("sha256", $_POST["password"]);
                  
                  $sql = "SELECT id FROM members WHERE username = '$username' AND password = '$password'";
                  $result = mysql_query($sql) or die(mysql_error());
               
                  if(mysql_num_rows($result) == 1) {
                     //success, update session and redirect to members only
                     $_SESSION['loggedin'] = hash("sha256",$username.$password.time());
                     header('Location: membersonly.php'); 
                     exit; 
                  } else if (mysql_num_rows($result) > 1) {
                     //something fishy is going on cause multiple rows matched.
                     //maybe notify sysadmin by email?
                     // $$$ - todo: make mailer function to simplify sending emails
                  } else {
                     //username and password don't match in database
                     echo("<span style='color: #993300;'>Username and Password do not match. Try again.</span><br><br>");
                  }
               }
            } else {
               echo("Please log in:<br><br>");
            }
         ?>
         <form action="login.php" method="post">
            Username: <input type="text" name="username"><br>
            Password:  <input type="password" name="password"><br>      
            <input type="submit" value="Log In">
         </form>
         <br><br>
         <a href="register.php">Register</a> to create an account.
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>  
  
<html>
