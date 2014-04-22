<?php

// show negative messages
if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo $error;    
    }
}

// show positive messages
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo $message;
    }
}

?>
<!-- errors & messages -->
<div style="direction:rtl;">
<!-- register form -->
<form method="post" action="register.php" name="registerform">   
    
    <!-- the user name input field uses a HTML5 pattern check -->
    <label for="login_input_username">שם משתמש (יכול להחיל רק אותיות ומספרים, 2 ל 64 תווים)</label>
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Zא-ת0-9]{2,64}" name="user_name" required />
    <br />
    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">דאור אלקטרוני</label>    
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />        
    <br />
    <label for="login_input_password_new">סיסמא (מינימום 6 תווים)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
    <br />
    <label for="login_input_password_repeat">חזור על סיסמא</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />        
    <br />
    <input type="submit"  name="register" value="register" />
    </div>
</form>

<!-- backlink -->
<a href="index.php">חזרה לדף כניסה</a>