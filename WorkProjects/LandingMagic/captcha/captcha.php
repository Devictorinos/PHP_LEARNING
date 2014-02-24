<?php

namespace captcha;

!(isset($_SESSION)) ? session_start() : '';



putenv('GDFONTPATH=' . realpath('.'));
$captchaText = $_SESSION['captcha'];
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
        imagettftext($this->captcha, 18, 0, 48, 30, $this->textColor, 'Hobby-of-night.ttf', $this->captchaText);
        return $this->captcha;

    }
}



    
    $captcha = new Captcha($captchaText);
    
    $capt = $captcha->createCaptha();
    header('Content-Type: image/jpeg');
    imagejpeg($capt);
    imagedestroy($capt);
