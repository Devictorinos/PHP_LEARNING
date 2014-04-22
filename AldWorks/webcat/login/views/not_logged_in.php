<!-- errors & messages -->
<?php




?>



<div class="logout_message_container">
  
        <?php


        // show negative messages
        if ($login->errors) {
            foreach ($login->errors as $error) {
                echo $error;    
            }
        }
        

        // show positive messages
        if ($login->messages) {
            foreach ($login->messages as $message) {
                echo $message;
            }
        }

    ?>


</div>
<!-- errors & messages -->
<div class="index_container">
  
    <div class="index_header">
            
            <div class="index_logo"><img src="img/logo.png" /></div>


 </div>

 <div class="index_content">
  
        <div class="index_login rtl">


          <!-- login form box -->
          <form method="POST" action="index.php" name="loginform">
              
              <table id="user_login" name="user_login">
                <tr>
                      <td><label for="login_input_username">שם משתמש :</label></td>
                      <td><input id="login_input_username" class="login_input form-control" type="text" name="user_name" required /></td>
                </tr>
                <tr>
                      <td><label for="login_input_password">סיסמה :</label></td>
                      <td><input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required /></td>
                </tr>

              </table>

               <input id="login_btn" type="submit"  name="login" value="כניסה" class="btn btn-primary"/>

            <!--   <button id="login_btn" type="submit" class="btn btn-primary">כניסה</button> -->
              <!-- <input type="submit"  name="login" value="Log in" /> -->

          </form>

       <!--  <a href="register.php">Register new account</a>   -->
  <br/>
  <br/>
  <br/>
  <br/>
      <a style="font-weight:bold;direction:rtl;margin-right:45px;" href="../index.php">חזרה לאתר</a>
   </div>
</div>
</div>