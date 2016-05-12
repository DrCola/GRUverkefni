
<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$errors = [];
$missing = [];

 



if (isset($_POST['send'])) {

    // list expected fields
    $expected = ['name', 'password'];
    $required = ['name', 'password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require './process.php';
    $name = $_POST['name'];
  $user_password = $_POST['password'];
 

$user = $db_man-> getUserLogs($name,$user_password);

if($user > 1)
{  
   $_SESSION["name"] = $name;
    session_start();
     $_SESSION["name"] = $name;
                         

}
else {
 ?> 
 
<div class="popup">
    
    <a class="close" href="#">×</a>
    <div class="content">
      <h2>Rangt password eða username</h2>
    </div>
</div>



<?php
}

}



if (isset($_POST['registersend'])) {

    // list expected fields
    $expected = ['Fname', 'Lname', 'Email','Uname','Password'];
    $required = ['Fname', 'Lname', 'Email','Uname','Password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require './process.php';
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Uname = $_POST['Uname'];
    $Password = $_POST['Password'];
    

$user2 = $db_man-> getUserLogsfullname($Uname);

if($user2 > 1)
{  ?>
  <span class="warning">Username er tekið</span>
   <?php
    echo $Uname;
    echo "hallo";

}
else
{
 

  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Email = $_POST['Email'];
  $Uname = $_POST['Uname'];
  $password = $_POST['Password'];



$db_man->newUser($Fname,$Lname,$Email,$Uname,$password);



$_SESSION["name"] = $Uname;
    session_start();
    $_SESSION["name"] = $Uname;
   
}


}

?>
<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
  
  
  <link href="css/stylesheet2.css" rel="stylesheet">
  <link href="css/indexcss.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/JFCore.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="js/javascript.js"></script>
  <script type="text/javascript" src="js/css-pop.js"></script>
  <meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;" />
 </head>
    <body>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $username = $_SESSION["name"];
}

            
            
           

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
              $user = $db_man->getUserLogsfullname($username);
              
              
              $album2 = $db_man->GetUserAlbums6($user[0]);
              
     include "include/header.php";

        ?>
 <div class="backrr img-responsive  ">
     <form action="include/updatealbum.php" method="post" enctype="multipart/form-data">
      <td><label>Veldu mynd á albumið</label></td>
    <div class="uploader" onclick="$('#filePhoto').click()">
    Dragðu myndina inn hérna eða ýttu hér.
    <img src=""/>
    <input type="file" name="imagePath"  id="filePhoto" />
    
</div>
</tr>
<label>Veldu nafn á album: </label>
<input type="text" name="Albumname" /><span id="rate" class="required"></span>
<input type="submit" value="Búa til album" name="submit">
</form>

<style>
.album1 {
  display: inline-block;
    width: 49%;
    padding: 10px;
    
    margin: 0;
}
</style>
       <?php 
      
       foreach ($album2 as $key) {
        $album3 = $db_man->countimages($key[0],$user[0]);
        ?><div class="album1"><p class="ex"><?php
        echo $key[1]; ?> </p> <?php
         echo ' <a  href=mypicturesalbum.php?val='.$key[0].' title="'.$key[3].'       '.$key[4].' "><span class="text">'.$album3[7].' myndir </span>  <img src="'.$key[5].'" height=200px width=180px>';
?> </a></div>

<?php



       }
       
           } else {
   ?>
<div id="wrapper">
    <main>
        <h2>PHP SOLUTION 5-2</h2>
        
        <?php 
         

        if ($missing || $errors) { ?>
            <p class="warning">Please fix the item(s) indicated.</p>
        <?php } ?>
   <div class="wrap">
<!-- tab style-1 -->
<div class="row">
  <div class="grid_12 columns">
    <div class="tab style-1">
              <dl>
                    <dd class="users"><a class="user active" href="#tab1" > </a></dd>
                <dd class="messages"><a class="msg" href="#tab2"> </a></dd>
                
               
              </dl>
              <ul>
                <li class="active">
                  <div class="form">   
                  <form action="" method="post" enctype="multipart/form-data"> 
                   
        <form method="post" action="">
            <p>
                
                    <?php if ($missing && in_array('name', $missing)) { ?>
                        <span class="warning">Please enter your name
                         <div class="box"></span>
                    <?php } ?>


                
                <input name="name" id="name" type="text" >
            </p>
            <p>
                
                    <?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter your password</span>
                    <?php } ?>
                
                <input name="password" id="password" type="password" >
            </p>
            
            <p>
                <input name="send" type="submit" value="Sigh in">
            </p>
        </form>
                 </div>
              </li>

                <li>

                  <div class="form">   
                    <form action="" method="post" enctype="multipart/form-data">
                      
                   <input type="text" name="Fname" class="active textbox" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" >
                    <input type="text" name="Lname" class="textbox" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" >
                     <input type="text" name="Email" class="textbox" value="Email Adress" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
                    <input type="text" name="Uname" class="textbox" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" >
                    <input type="password" name="Password" class="textbox" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
                    <div class="g-recaptcha" data-sitekey="6Ld-Zg4TAAAAAFhILd6Lfl0mQskIdr8gBw5bw8io" ></div>
                    <input name="registersend" type="submit" value="Register" >
                  </form>
                 </div>
              </li>
              
                
               
              </ul>
    </div>
</div>            
</div>      
</div>




        
    </main>

<?php
}
      ?>



  
<?php include "include/footer.php"; ?>
<script type="text/javascript" src="js/javascript.js"></script>

<script src="js/bootstrap.min.js"></script>
 
   </body>
</html>


      