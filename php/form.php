<!DOCTYPE html>

<?php 
   include("/home/webserver/public_html/checklogin.php");  
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
            $_SESSION["username"] = isset($_POST["username"]) ? $_POST["username"] : null;
            $_SESSION["password"] = isset($_POST["password"]) ? sha1($_POST["password"]) : null;
            $_SESSION["valid_login"] = ($_SESSION["username"]=="webserver")
                                    && ($_SESSION["password"]==sha1("bethlehood"));
            //checks for submit button press	 
            $submitted = array_key_exists('logged_in', $_POST);
	 
            if(!$submitted){ 
               echo "Please log in.<br>";
            } else {
               if(!$_SESSION["valid_login"]) {
                  echo "Log in failed. 
                        Please check username and password and try again.<br>"; 
               } else {
                  header('Location: success.php'); 
                  exit; 
               }
            }
            echo "<br>";
         ?>
         <form style="font-family:courier new;" action="form.php" method="post">
            <!--todo:comments about invalid input after sanitation-->
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>      
            <input type="submit" name="logged_in" value="Login">
         </form>
         <br><br>
         <a href="login.php">REAL LOGIN</a>
      </div>
      <?php include($dir_inc."footer.php"); ?>
   </body>  
  
<html>
