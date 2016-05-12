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
                <input name="send" type="submit" value="Sign in">
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