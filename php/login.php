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
         
            // actually just 20 years, but on the internet, that's forever
            $forever = time() + (20 * 365 * 24 * 60 * 60);
         
            if (isset($_SESSION['loggedin'])) {
               header('Location: membersonly.php'); 
               exit; 
            } else if (isset($_COOKIE['logindata'])) {
               //database variables for login
               $mySQL_loc = "localhost";
               $mySQL_usr = "root";
               $mySQL_pwd = "bethlehood";
               $mySQL_db  = "webserver";
               //connect to the MySQL server
               mysql_connect($mySQL_loc, $mySQL_usr, $mySQL_pwd) or die(mysql_error());
               //select database
               mysql_select_db($mySQL_db) or die(mysql_error());
               
               $username  = $_COOKIE['logindata']['username'];
               $series_id = $_COOKIE['logindata']['series_id'];
               $token     = $_COOKIE['logindata']['token'];
               
               echo("username: $username<br>".
                    "series_id: $series_id<br>".
                    "token: $token<br><br>");
               
               $sql = "SELECT id FROM members WHERE 
                       username  = '$username' AND
                       series_id = '$series_id' AND
                       token     = '$token'";
               $result = mysql_query($sql) or die("oops".mysql_error());
            
               if(mysql_num_rows($result) == 1) {
               
                  //success, typical login stuff:
                  
                  $salt = date("F"); // use full month string as salt                     
                  $_SESSION['loggedin'] = hash("sha256",$username.$password.$salt); 
                  
                  //Log out after 15 minutes with no activity 
                  setcookie('loginexpire', date("G:i - d/m/y", $expire_time), $expire_time); 
               
                  //update token
                  $token = hash("sha256", date("G:i"));
                  $sql = "UPDATE members 
                          SET token = '$token'
                          WHERE username = '$username'";
                  $result = mysql_query($sql) or die("oops".mysql_error());
                  setcookie('logindata[token]', $token, $forever);
                  //redirect
                  header('Location: membersonly.php'); 
                  exit; 
               } else if (mysql_num_rows($result) > 1) {
                  //something fishy is going on cause multiple rows matched.
                  //maybe notify sysadmin by email?
                  // $$$ - todo: make mailer function to simplify sending emails
               } else {
                  //bad login cookie
                  //delete cookie
                  setcookie('logindata', '', time()-3600);
                  //print error
                  echo("<span style='color: #993300;'>Bad login cookie.</span> Please log in:<br><br>");
               }
               
            } else if (isset($_POST["username"]) && isset($_POST["password"])){ 
               
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
                  $remember = $_POST["remember"];
                  
                  $sql = "SELECT id FROM members WHERE username = '$username' AND password = '$password'";
                  $result = mysql_query($sql) or die(mysql_error());
               
                  if(mysql_num_rows($result) == 1) {
                     //success, update session and redirect to members only
                     $salt = date("F"); // use full month string as salt                     
                     $_SESSION['loggedin'] = hash("sha256",$username.$password.$salt); 
                     
                     //Log out after 15 minutes with no activity 
                     setcookie('loginexpire', date("G:i - d/m/y", $expire_time), $expire_time);    
                     
                     //create cookie to verify for auto-login if "Keep me logged in" is checked
                     if($remember) {
                        $series_id = hash("sha256", date("i:G"));
                        $token     = hash("sha256", date("G:i"));
                        $sql = "UPDATE members 
                                SET series_id = '$series_id', token = '$token'
                                WHERE username = '$username'";
                        $result = mysql_query($sql) or die(mysql_error());
                        setcookie('logindata[username]', $username, $forever);
                        setcookie('logindata[series_id]', $series_id, $forever);
                        setcookie('logindata[token]', $token, $forever);
                     }
                     
                     //redirect
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
            Username:<br><input type="text" name="username"><br><br>
            Password:<br><input type="password" name="password"><br><br>    
            <input type="checkbox" name="remember"> Keep me logged in<br><br>
            <input type="submit" value="Log In">
         </form>
         <br><br>
         <a href="register.php">Register</a> to create an account.
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>  
  
<html>
