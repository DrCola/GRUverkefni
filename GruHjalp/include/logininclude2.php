<?php
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
     $userinfo = $db_man-> getUserLogsfullname($name);
     $user = $db_man-> updateonline($userinfo[0],1);
                         

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

