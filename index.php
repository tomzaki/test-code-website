<!DOCTYPE html>

<?php 
	$dir_inc = "include/";
   include($dir_inc."phpheader.php");
?>

<html lang='en'>

   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <title>Pintsize Server - Home2</title>
      <link rel="stylesheet" href="media/style.css" type="text/css" media="screen">
      <link rel="icon" href="favicon.ico">
   </head>

   <body>
      <?php include($dir_inc."header.php"); ?>
      <div id="content">
         <h2>Welcome to the landing page.<br></h2>
         <h4>The navigation pane above has some links. You should click them.<br>
         <br>Below are some broken links to old pages that have been moved
             or no longer exist. You will find little enjoyment from them.</h4>
         <ul>
            <li><a href="/~webserver/awesome/index.html">Awesome</a></li>
            <li><a href="/~webserver/awesome/cats.html">Cats</a></li>
            <li><a href="/~webserver/awesome/morecats.html">More Cats</a></li>
            <li><a href="/~webserver/php_test/test.php">PHP Info</a></li>
            <li><a href="/~webserver/php_test/form.php">PHP Form Test</a></li>
            <li><a href="/~webserver/phpmyadmin/index.php">PHPMyAdmin</a></li>            
            <li><a href="http://www.tomzaki.com">tomzaki</a></li>            
            <li><a href="http://64.121.112.21:8082/~public">downloads</a></li>
         </ul>	
         <?php
            //Check to see if magic quotes are enabled
            //echo (get_magic_quotes_gpc()) ? "Enabled<br>" : "Disabled<br>";
            
            //Cookie test: prints welcom messgae for first time visitors and the
            //date and time of the user's last visit if they have a cookie
            $visit = time("G:i - m/d/y");
            if(isset($_COOKIE['lastVisit'])){
               $visit = $_COOKIE['lastVisit'];
               echo "Your last visit was - ". $visit; 
            } else {
               echo "Welcome to Pintsize Server!<br>";
            }
            setcookie('lastVisit', date("G:i - m/d/y"));   
         ?>
         <!--get this text to align to bottom-->
         <p style="position: fixed; bottom: 85px;">
            <h5><i>If you happened to stumble upon this site somehow, via remarkably
            dumb luck or otherwise, feel free to browse around. 
            Fair warning though, there isn't much to see...</i></h5>
         </p>
		</div>
		<?php include($dir_inc."footer.php"); ?>
  </body>
  
</html>
