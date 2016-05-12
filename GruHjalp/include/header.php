<?php

?>

<style type="text/css">

.typeahead, .tt-query, .tt-hint {
  border: 2px solid #CCCCCC;
  border-radius: 8px;
  font-size: 24px;
  height: 30px;
  line-height: 30px;
  outline: medium none;
  padding: 8px 12px;
  width: 396px;
}
.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #0097CF;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #999999;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 422px;
}
.tt-suggestion {
  font-size: 24px;
  line-height: 24px;
  padding: 3px 20px;
  color:black;
}
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
</style>

<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheet.css">

 <script type="text/javascript" src="js/jquery.js"></script>



        
        <script>
        autoloadpage();
         setInterval(function () { autoloadpage(); }, 1000);  
        function autoloadpage() {
            $.ajax({
                url: "myndin.php",
                type: "POST",
                success: function(html) {
                    $(".wrapper123").html(html); 
                }
            });
        }
        </script>

       
        
        <script>
        autoloadpage2();
         setInterval(function () { autoloadpage2(); }, 750);  
        function autoloadpage2() {
            $.ajax({
                url: "activityreload.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".activityboxreload").html(html); 
                },
    fail: function() {                                     
      $('.activityboxreload').html('<div class="activityboxreload">Reyndu aftur seinna.</div>');
    }

            });
        }
        </script>
        <script>
        autoloadpage3();
         setInterval(function () { autoloadpage3(); }, 750);  
        function autoloadpage3() {
            $.ajax({
                url: "chatreload.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".chatreload").html(html); 
                },
    fail: function() {                                       
      $('.chatreload').html('<div class="chatreload">Reyndu aftur seinna.</div>');
    }
            });
        }
        </script>

        <script>
        autoloadpage4();
         setInterval(function () { autoloadpage4(); }, 1500);  
        function autoloadpage4() {
            $.ajax({
                url: "userlist.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".userlist").html(html); 
                },
    fail: function() {                                       
      $('.userlist').html('<div class="userlist">Reyndu aftur seinna.</div>');
    }
            });
        }
        </script>
<meta charset="utf-8" />

<?php $title = basename($_SERVER['SCRIPT_FILENAME'], '.php'); $title = str_replace('_', ' ', $title);  $title = ucwords($title);
if (isset($_POST['logout'])) {
    // empty the $_SESSION array
    $_SESSION = [];
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    // end session and redirect
    session_destroy();

    header('Location: http://tsuts.tskoli.is/2t/gus/vef2a3u/v5/authentication/login_pdo.php');
    exit;
}


        if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$getmessages = $db_man->getmessage($user[0]);
$messagescount = $db_man->messagescount($user[0]);
?>
<title>Myndir<?php if (isset($title)) {echo "&#8212;{$title}";} ?> </title>




<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  
      <div class="container">

        <div class="navbar-header ">
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   
    <script src="typeahead.min.js"></script>

    
           
  
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            
        </div><!--navbar-header-->
         
      </div><!--container-->
    <!--admin bar í sidebar-->
    


<form class="navbar-brand"  method="post" action="include/profa.php"  >
               <input type="text" style="color:black;" name="typeahead" class="typeahead tt-query" autocomplete="on" spellcheck="false" placeholder="Leita af notendum" >
               <input type="submit" value="Upload Image" name="submit" hidden>
            </form>
            <div id="navbar" class="navbar-collapse collapse">
      <form class="navbar-form navbar-right" >
        


   
<div class="wrapper123">
    
    </div>
    </form><!--navbar-form navbar-right-->
      </div><!--navbar-collapse -->
    </nav><!--navbar navbar-inverse navbar-fixed-top-->



<label class="collapse22 " for="_1">Sýna Virkni</label>
  <input id="_1" type="checkbox">
  <div><div class=" scrollactivity">
    <div class="activityboxreload">
    </div> 
      </div></div>




<label class="collapseChat2" for="_5">notendur</label>
  <input id="_5" type="checkbox">
  <opnalokanotendum>
    <aaa2 class="chatbox2">
    <div class="userlist">
    </div> 
  </aaa2>

</opnalokanotendum>




<!--
<body onload="setInterval('chat.update()', 1000)">

    <div id="page-wrap">
    
        
        
        <p id="name-area"></p>
        
        <div class=" scrollactivity2">
    <div class="activityboxreload">
    </div> 
      </div>
        
        <form id="send-message-area">
            Name: <input name="name" id="name" type="text" /><br />
             <input type="button" id="searchForm" onclick="SubmitForm();" value="Send" />
        </form>
    
    </div>

</body>
-->


<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#myform").validate({
      debug: false,
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: "Please let us know who you are.",
        email: "A valid email will help us get in touch with you.",
      },
      submitHandler: function(form) {
        // do other stuff for a valid form
        $.post('process2.php', $("#myform").serialize(), function(data) {
          $('#results').html(data);
        });
      }
    });
  });
  </script>
  <style>
  label.error { width: 250px; display: inline; color: red;}
  </style>
<script>
function funClear() {

    document.getElementById("form1").reset();

} 

</script>
  <form name="myform" id="myform" action="" method="POST">  
<!-- The Name form field -->

<label class="collapseChat " for="_3">Spjall</label>
  <input id="_3" type="checkbox">
  <opnalokachat>
    <aaa class="chatbox">
    <div class="chatreload">
    </div> 
     



   
      





  <br>
<!-- The Email form field -->
     
    <input type="text" name="message" id="message" size="30" value=""/> 

  <br>
<!-- The Submit button -->
<?php
$user = $db_man->getUserLogsfullname($name);
echo '<button name="btn" class="btn"   type="submit" value="'.$user[0].'" onclick="setTimeout(myFunction, 100);">Senda skilaboð</button>'."<br>";
?>


<script>



function myFunction() {
    document.getElementById("message").value = "";
}
</script>
  
</form>


</opnalokachat>
</aaa>
<br>
<br>
<!--
<p id="demo"></p>

<p><strong>Note:</strong> This example is opened in a new frame and will be treated as a new "session".</p>

<script>
var x = history.length;
document.getElementById("demo").innerHTML = x;
</script> -->
