<?php

namespace captcha;

!(isset($_SESSION)) ? session_start() : '';


header("Cache-Control: no-store, no-cache, must-revalidate");

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

foreach (array_rand($captchaArray, 2) as $key) {

               $captchaText .= $captchaArray[$key];
}


putenv('GDFONTPATH=' . realpath('.'));



class Captcha
{
    public $wdth;
    public $height;
    public $fontSize;
    public $cpacha;
    public $textColor;
    public $captchaText;
    public $drawingPoint;

    public function __construct($captchaText = '', $drawingPoint = '.')
    {
        $this->captchaText = $captchaText;
        $this->drawingPoint = $drawingPoint;
    }

    public function createCaptha()
    {
        
        $point = '.';
        $this->width = 202;
        $this->height = 46;
        $this->captcha = imagecreate($this->width, $this->height);

        imagecolorallocate($this->captcha, 211, 211, 211);
        $this->textColor = imagecolorallocate($this->captcha, 56, 56, 56);
        $num = 0;

        /*** Drawing Points ***/
        for ($j=-7; $j <= $this->height + 4; $j+=10) {

            for ($i=-7; $i < $this->width; $i+=10) {

                    imagettftext($this->captcha, 15, 0, $i, $j, $this->textColor, 'arial.ttf', $this->drawingPoint);

            }

        }
 
        //Drawing captcha
        imagettftext($this->captcha, 18, 0, 48, 30, $this->textColor, 'arial.ttf', $this->captchaText);

        return $this->captcha;

    }
}


    $_SESSION['captcha'] = $captchaText;
    $captcha = new Captcha($captchaText);
    
    $capt = $captcha->createCaptha();
    header('Content-Type: image/jpeg');
    imagejpeg($capt);
    imagedestroy($capt);

    
    die();
