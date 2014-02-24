<?php

session_start();

/* Generating Captcha symbols */
function generateCaptcha()
{
      $captchaText = '';
      $captchaArray = array( "1","2","3","4","5","6","7","8","9","0",
                              "a","b","c","d","e","f","g","h","i","j",
                              "k","l","m","n","o","p","q","r","s","t",
                              "u","v","w","x","y","z","A","B","S","D",
                              "E","F","J","H","I","J","K","L","M","N",
                              "O","P","Q","R","S","T","U","V","W","X",
                              "Y","Z"
                            );

      shuffle($captchaArray);

    foreach (array_rand($captchaArray, 8) as $key) {

               $captchaText .= $captchaArray[$key];
    }
          
    return $captchaText;
};

$_SESSION['captcha'] = generateCaptcha();

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="bower_components/jquery/jquery.min.js"></script>
  <script type="text/javascript" >

      $(document).ready(function(){

          $('.refresh-captcha').on('click', function(){

              $('.captcha img').attr('src', 'captcha/captcha.php');
                 
          });

      });

  </script>
</head>
<body>
  <header class="header-container">
    <div class="header-wrapper">
      <div class="header">
          <div class="logo">
            
          </div>
          <div class="header-aside">
            <div class="register-ac">
              <a id="register-modal-button" href="#">Register Account</a>
            </div>
          </div>

          <div class="clearfix"></div>
      </div>        
    </div>    
  </header>
  <section class="content-container">
    <div class="content">
      <div class="inner-content">

        <form class="login-form" action="#" method="POST" name="logininForm" >
<!-- ********************************************** -->         
          <div class="form-parts">

            <div class="form-label">
              <label for="Login">Login</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="text" name="log[login]" value="" />
            </div>

            <div class="clearfix"> </div>
          </div>
          
<!-- ********************************************** -->        
          <div class="form-parts">

            <div class="form-label">
              <label for="Password">Password</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="password" name="log[password]" value=""/>
            </div>

            <div class="clearfix"> </div>
          </div>
 <!-- ********************************************** -->          
          <div class="form-parts">
            <div class="form-submit">
              <input class="form-btn" type="submit" name="logIn" value="Login"/>
            </div>
          </div>
  <!-- ********************************************** -->         
        
        
        </form>
        
      </div>
    </div>    
  </section>
 


  <div id="register-modal">
  <?php


  if (isset($_COOKIE['captcha'])) {

      echo $_COOKIE['captcha'];
  }
?>
    <span class="close-reg-modal">
    <a href="#">X</a>
    </span>
    
    <div class="moadal-header">
      

    </div>

    <form class="login-form" action="#" method="POST" name="logininForm">
<!-- ********************************************** -->         
          <div class="form-parts">

            <div class="form-label">
              <label for="Login">Login Name</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="text" name="register[login]" value="" />
            </div>

            <div class="clearfix"> </div>
          </div>
          


 <!-- ********************************************** -->         
          <div class="form-parts">

            <div class="form-label">
              <label for="Email">Email</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="email" name="register[Email]" value="" />
            </div>

            <div class="clearfix"> </div>
          </div>
          

<!-- ********************************************** -->        
          <div class="form-parts">

            <div class="form-label">
              <label for="Password">Password</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="password" name="register[password]" value="" />
            </div>

            <div class="clearfix"> </div>
          </div>


<!-- ********************************************** -->        
          <div class="form-parts">

            <div class="form-label">
              <label for="Repeat Password">Repeat Password</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="password" name="register[repeatPassword]"  value=""/>
            </div>

            <div class="clearfix"> </div>
          </div>

<!-- ********************************************** -->  
          <div class="register-captcha">
            <div class="captcha">
              <img src="captcha/captcha.php" alt="">
            </div>
            <div class="refresh-captcha">
                  REF
            </div>

            <div class="clearfix"></div>

          </div> 

          <div class="form-parts">

            <div class="form-label">
              <label for="Captcha">Enter Captcha</label>
            </div>

            <div class="form-input">
              <input class="form-field" type="text" name="Captcha" id="captchaField" value="" />
            </div>

            <div class="clearfix"> </div>
          </div>

 <!-- ********************************************** -->          
          <div class="form-parts">
            <div class="form-submit">
              <input class="form-btn" type="submit" name="register" value="Register" />
            </div>
          </div>
  <!-- ********************************************** -->         
        
        
    </form>

  </div>

</body>
<script type="text/javascript" src="bower_components/jquery/jquery.min.js"></script>
<script type="text/javascript">
  
  $(function(){

      /* *** GLOBAL VARIABELS *** */
      var windowWidth = $(window).width();//Getting body width
      var windowHeight = $(window).height();//Getting body height


      var registerModalWidth = $('#register-modal').width();//getting register modal width
      var registerModalHeight = $('#register-modal').height();//Getting register modal height

      var centerWidthPoint = (windowWidth - registerModalWidth) / 2;//getting width center point
      var centerHeightPoint = (windowHeight - registerModalHeight) / 2;//getting height center point


      var divRegModal = $('#register-modal');//Register Modal Div
      var closeRegisterModal = $('.close-reg-modal a');//Close  register modal button

      /* *** GLOBAL VARIABELS ENDS *** */

      /* ================================= */

      /* *** REGISTER MODAL FUNCTIONS *** */

      //Setting position of register modal
      $('#register-modal').css({

          "position": "absolute",

          top : -(registerModalHeight+10) + "px",

          left: centerWidthPoint + "px"

      });// set register modal position position ends 
        
      //Show register modal function
      $('#register-modal-button').on('click', function(event){

          event.preventDefault();//Disabling Link Effect

          divRegModal.fadeIn(800);//div register modal

          $("body").css({

              "background" : "#777777"

          });

          // set register modal position 
          divRegModal.animate({
           
              top : centerHeightPoint + "px"
            
          },800);// set register modal position ends 

      });//Show register modal function Ends


      closeRegisterModal.on('click', function(event){

          event.preventDefault();

          $("body").css({

              "background" : "transparent"

          });

          divRegModal.fadeOut();

          divRegModal.animate({
           
              top : -(registerModalHeight+10) + "px"
            
          },300);// set register modal position position ends 

      });


  }); //end document ready function
</script>
</html> 
