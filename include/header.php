<div id="container">
   <div id="preheader"></div>
   <div id="header">
      <h1>Pintsize Server</h1>
   </div>
   <div id="navigation">
      <ul>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/index.php") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/index.php">Home</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/html/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/html/index.php">HTML</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/php/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/php/index.php">PHP</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/javascript/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/javascript/index.php">JavaScript</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/mysql/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/mysql/index.php">MySQL</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/alaina/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/alaina/index.php">ALAINA</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/contact/") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/contact/index.php">Contact</a></li>
         <li><a 
         <?php
            if(strpos($_SERVER['REQUEST_URI'], "/~webserver/php/logout.php") !== false)
               echo " style='
                display: block;
                float: left;
                padding: 5px 25px;
                text-decoration: none;
                border-left: 5px solid#004488; /*dark gray*/
                color:#333333; 
                background:#dddddd;'";
         ?> href="/~webserver/php/logout.php">Logout</a></li>
      </ul>
    </div>