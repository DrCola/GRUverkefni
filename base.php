<?php 
$db_host = "tsuts.tskoli.is";
$db_name = "0812952049_gru";
$db_user = "0812952049";
$db_pass = "drcolaman";

try {
    $connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Databasing</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/foundation.css">
        <script src="js/modernizr.js"></script>
                <script src="js/hover.js"></script>
        <script src="js/jquery-2.1.1.js"></script>
                  <script>
$(document).ready(function($){

//the highest number of the image you want to load
var upperLimit = 78;

//get random number between 1 and 10
//change upperlimit above to increase or 
//decrease range
var randomNum = Math.floor((Math.random() * upperLimit) + 1);    


 //change the background image to a random jpg
 //edit add closing )  to prevent syntax error
 $("#cd-intro").css("background-image","url('slider/img" + randomNum + ".jpg')");//<--changed path




 });
 </script>
  </head>
  <body>

    <nav class="cd-primary-nav">
     
    </nav> <!-- cd-primary-nav -->
  </header>
  <section id="cd-intro">

    <div id="cd-intro-tagline">

    </div> <!-- #cd-intro-tagline -->
  </section> 
    

            <?php
session_start();
echo $_SESSION["name"];
?>
<div class="cd-secondary-nav">
    <a href="#0" class="cd-secondary-nav-trigger">Menu<span></span></a> <!-- button visible on small devices -->
    <nav>
      <ul>
        <li>
          <a href="index.html">
            <span><img src="icons/HomeIcon.png" onmouseover="hoverHome(this);" onmouseout="unhoverHome(this);"></span><!-- icon -->
            <b>Home</b>
          </a>
        </li>
        <li>
          <a href="settings.html">
            <span><img src="icons/OptionsIcon.png" onmouseover="hoverOptions(this);" onmouseout="unhoverOptions(this);"></span><!-- icon -->
            <b>Settings</b>
          </a>
        </li>
        <li>
          <a href="games.html">
            <span><img src="icons/VideoGamesIcon.png" onmouseover="hoverVideoGames(this);" onmouseout="unhoverVideoGames(this);"></span><!-- icon -->
            <b>Games</b>
          </a>
        </li>
        <li>
          <a href="movies.html">
            <span><img src="icons/MovieIcon.png" onmouseover="hoverMovie(this);" onmouseout="unhoverMovie(this);"></span><!-- icon -->
            <b>Movies</b>
          </a>
        </li>
      </ul>
    </nav>
  </div> <!-- .cd-secondary-nav -->

          </ul>
        </section>
        </nav>

         

         <!--<form method="post" enctype="multipart/form-data">
          <table border="1" width="80%">
            <tr>
              <th width="50%">avatar name</th>
              <td width="50%"><input type="text" name="txt_image_name"></td>
            </tr>
            <tr>
              <th width="50%">Upload image</th>
              <td width="50%"><input type="file" name="avatar"></td>
            </tr>
            <tr> 
              <td></td>
              <td>
                <input type="submit" name="Submit" value="Save">
              </td>
            </tr>
          </table>
        </form>
-->
        <div class="row">
        <div class="large-12 columns">
        </div>
        <div class="large-9 columns right">
          <form>
            <div class="row collapse">
              <div class="large-10 small-8 columns">
              </div>

              <div class="large-2 small-4 columns">

              </div>
            </div>
          </form>

        </div>
        </div>



         
        <div class="row">
        <div class="large-12 columns">
        <div id="sliderFrame">
        <div class="wrapper">


        <div class="row">
        <div class="large-6 columns">
        </div>
        </div>
         <footer class="row">
        <div class="large-12 columns">
        </div>
      </footer>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/main.js"></script>
        <script>
        $(document).foundation();
        </script>

</body></html> 