<?php

/**
 * Class UploadImage
 * Author Victor Lubchuk
 * Created 08-06-2014
 */

/**********************************************
 *** ++++++    AVALIABLE  METHODS    ++++++ ***
 *********************************************/
/*
 *
 * ************************************
 *
 * protected method changeImageName()
 * create uniq name to image -  "not expecting any parameters" returnig this
 *
 * ************************************
 *
 * protected method moveUploadedImage()
 * uploading original image to temporary directory - "not expecting any parameters" returning this
 *
 * ************************************
 *
 * protected method rotateImage()
 * rotating image expects to 3 parameters
 * first is degrees
 * second is background color for example 0 is black
 * third paramether is transparency, by default is kept but if set and non-zero, transparent colors are ignored
 * returning this
 *
 * ************************************
 *
 * protected method checkImageSize() - not expecting to any parameters
 * returning array of errors or empty array
 * returning this
 *
 * ************************************
 *
 * protected method checkImageExtention() - not expecting to any parameters
 * returning array of errors or empty array
 * returning this
 *
 * ************************************
 *
 * protected method checkImageDimensions() - not expecting to any parameters
 * returning array of errors or empty array
 * returning this
 *
 * *************************************
 *
 * public method explodeImage()
 * exploding image file to parts - "expects to receive image" returning this
 *
 * ************************************
 *
 * public method  uploadMainImage()
 * executing changeImageName()->moveUploadedImage() - returning this
 *
 * ************************************
 *
 * public method createThumbs($width = null , $height = null, $folder = null, callable $rotate = null, array $args = null)
 * create new image - expecting to one required parameter number 3
 * if not set width and height they are be defined by default of class
 *  " parameter nubmer 3 - "folder/" "
 *
 * ++++ optional rotate the image +++
 *
 * rotate parameters numbers is  4 , 5
 * parameter 4 must be type of callable - object and method
 * parameter 5 must be type of array - all 3 paramether are required
 * first is degrees
 * second is background color for example 0 is black
 * third paramether is transparency, by default is kept but if set and non-zero, transparent colors are ignored
 *
 * full example createThumbs(200, 200, 'Pic1/', array($img, 'rotateImage'), [90, 0, null])
 * returning this
 *
 * ************************************
 *
 * public method fishish() - unlinking temporary image
 * returning array - errors, image path exclude image folder, image name
 *
 * ************************************
 *
 *  ++++++++++++ Helper Methods all PUBLIC +++++++++++++
 *
 * addAllowedExtention($extention)
 * changeAllowedExtention(array $allowedExtention)
 * changeAllowedWidth($allowedWidth)
 * changeAllowedHeght($allowedHeght)
 * setAllowedSize($allowedSize)
 * changePath($path)
 * changeTemporaryPath($path)
 *
 * ************************************
 *          RUN EXAMPLE
 *
    $img = new UploadImage();
    $img->explodeImage($_FILES['image']);
    $img->changeTemporaryPath('/var/www/UsefulClasses/images/');
    $img->changePath('/var/www/UsefulClasses/images/');
    $img->uploadMainImage();
    $img->createThumbs(200, 200, 'Pic1/', array($img, 'rotateImage'), [90, 0, null])
        ->createThumbs(300, 400, 'Pic2/', array($img, 'rotateImage'), [180, 0, null])
        ->createThumbs(600, 600, 'Pic3/', array($img, 'rotateImage'), [270, 0, null]);
    $result = $img->fishish();

 * */


class UploadImage {

    protected $_path = '/var/www/UsefulClasses/uploadImage/';
    protected $_thumbsWidth  = 200;
    protected $_thumbsHeight = 200;//'image/jpg', 'image/png', 'image/jpeg'
    protected $_allowedExtention  = array('image/jpg', 'image/png', 'image/jpeg');
    protected $_allowedSize;
    protected $_allowedWidth;
    protected $_allowedHeght;
    protected $_temporaryFolder = 'temp/';
    protected $_temporaryPath = '/var/www/UsefulClasses/uploadImage/';
    protected $_thumbFolder;
    protected $_imageNewName;
    protected $_errorCollector = array();
    protected $_imageRotate;




    /* IMAGE VARIABLES */
    protected $_imageName;
    protected $_imageType;
    protected $_imageTmpName;
    protected $_imageSize;
    protected $_imageError;
    protected $_imageWidth;
    protected $_imageHeight;
    protected $_imageDimensions;

    public function __construct()
    {
        $this->_allowedHeght     = 1000;
        $this->_allowedWidth     = 1000;
        $this->_allowedSize      = 5120 * 1024;//5 megabyte // 5120 kilobyte

    }

    /**
     * @param array $imageFile
     * @return $this
     */
    public function explodeImage($imageFile)
    {


        $this->_imageName       = $imageFile["name"];
        $this->_imageType       = strtolower($imageFile['type']);
        $this->_imageTmpName    = $imageFile['tmp_name'];
        $this->_imageSize       = $imageFile['size'];
        $this->_imageError      = $imageFile['error'];
        $this->_imageDimensions = getimagesize($imageFile['tmp_name']);
        $this->_imageWidth      = $this->_imageDimensions[0];
        $this->_imageHeight     = $this->_imageDimensions[1];

        return $this;
    }


    /**
     * Uploading main image image
     */
    public function uploadMainImage()
    {
        if ($this->_imageError == 0) {

            $this->checkImageSize();
            $this->checkImageExtention();
            $this->checkImageDimensions();

            if(empty($this->_errorCollector)) {
                $this->changeImageName()->moveUploadedImage();
            }

        }

        return $this;
    }

    /**
     * Creating thumbs images
     */
    public function createThumbs($width = null , $height = null, $folder = null, callable $rotate = null, array $args = null)
    {
         /*   if (!empty($this->_errorCollector)) {
                return $this->_errorCollector;

            }*/

          if (!is_null($width) && !is_null($height)) {
              $this->_thumbsWidth  = $width;
              $this->_thumbsHeight = $height;
          }

          if(!is_null($folder) && !is_dir($this->_path . $folder) && !file_exists($this->_path . $folder)) {

              mkdir($this->_path . $folder);
              chmod($this->_path . $folder, 0774);

              $this->_thumbFolder = $folder;
          } else {
              $this->_thumbFolder = $folder;
          }

          if ($this->_imageHeight > $this->_imageWidth) {

              $this->_thumbsWidth = ($this->_imageWidth / $this->_imageHeight) * $this->_thumbsHeight;
          } else {
              $this->_thumbsHeight = ($this->_imageHeight / $this->_imageWidth) * $this->_thumbsWidth;
          }

          $tmpImg = imagecreatetruecolor($this->_thumbsWidth, $this->_thumbsHeight);

          switch ($this->_imageType) {

              case "image/jpeg":
              case "image/jpg":


                  $src = imagecreatefromjpeg($this->_temporaryPath . $this->_temporaryFolder .  $this->_imageNewName);

                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);

                  /* if rotate is true rotating the image*/
                  if (is_array($rotate) && method_exists($rotate[0], $rotate[1])) {

                      $tmpImg = $this->rotateImage($tmpImg, $args[0], $args[1], $args[2]);

                  }

                  imagejpeg($tmpImg, $this->_path . $this->_thumbFolder .  $this->_imageNewName, 100);
                  imagedestroy($src);
                  break;
              case "image/png":

                  $src = imagecreatefrompng($this->_temporaryPath . $this->_temporaryFolder .  $this->_imageNewName);

                  /* if rotate is true rotating the image*/
                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);

                  if (is_array($rotate) && method_exists($rotate[0], $rotate[1])) {

                      $tmpImg = $this->rotateImage($tmpImg, $args[0], $args[1], $args[2]);
                  }

                  imagepng($tmpImg, $this->_path . $this->_thumbFolder .  $this->_imageNewName);
                  imagedestroy($src);
                  break;

          }

        return $this;
    }


    /**
     * Unlinking temporary image
     * @return array of errors
     */
    public function fishish()
    {
        unlink($this->_temporaryPath . $this->_temporaryFolder . $this->_imageNewName);
        return array($this->_errorCollector, $this->_path, $this->_imageNewName);
    }


    //TODO create method for insert image data to data base and if exists POST data
    public function prepareDataForDb(array $data)
    {

    }


    /**
     * @return $this
     */
    protected function changeImageName()
    {

        $img = explode('.', $this->_imageName);// exploding image to two part - 1 name 2 extention

        if (!is_dir($this->_temporaryPath . $this->_temporaryFolder)) {
            /*     echo $this->_temporaryPath . $this->_temporaryFolder;
                 die();*/
            mkdir($this->_temporaryPath . $this->_temporaryFolder);
            chmod($this->_temporaryPath . $this->_temporaryFolder, 0774);
        }

        $this->_imageNewName = $img[0] . "_" . time() . "." . $img[1];
        //$this->_imageNewName = $img[0] . "_" . sprintf("%s_%dx%d_thumb", $this->_imageName, "_", "_") . "." . $img[1];

        return $this;
    }


    /**
     * Uploading main Image
     */
    protected function moveUploadedImage()
    {
        move_uploaded_file($this->_imageTmpName, $this->_temporaryPath . $this->_temporaryFolder .  $this->_imageNewName);
        return $this;
    }

    //TODO check minimum image size
    /**
     * Checking image size
     * @return bool
     */
    protected function checkImageSize()
    {

        if($this->_imageSize > $this->_allowedSize) {

            $this->_errorCollector['size'] = "Image Size is Not Allowed!";
        }

        return $this;
    }

    /**
     * Cchecking image extention
     * @return bool
     */
    protected function checkImageExtention()
    {

        if(!in_array($this->_imageType, $this->_allowedExtention)) {

            $this->_errorCollector['extention'] = "The Image Extention is not Allowed!";

        }

        return $this;
    }


    /**
     * Checkin image width and height
     * @return $this
     */

    protected function checkImageDimensions()
    {
        if ($this->_imageWidth > $this->_allowedWidth) {

            $this->_errorCollector['dimensions'] = "Image Dimension Width is Not Allowed!";

        } else if ($this->_imageHeight > $this->_allowedHeght) {

            $this->_errorCollector['dimensions'] = "Image Dimension Height is Not Allowed!";

        }

        return $this;
    }


    /**
     * rotating image
     * @param $image
     * @param $degrees
     * @param int $bg
     * @param null $transparency
     * @return resource
     */
    protected function rotateImage($image, $degrees, $bg = 0, $transparency = null)
    {
        $this->_imageRotate = imagerotate($image, $degrees, $bg , $transparency);

        return $this->_imageRotate;
    }



    /**
     * @param $extention
     * @return $this
     */
    public function addAllowedExtention($extention)
    {
        array_push($this->_allowedExtention, $extention);
        return $this;
    }

    /**
     * @param array $allowedExtention
     * @return $this
     */
    public function changeAllowedExtention(array $allowedExtention)
    {
        $this->_allowedExtention = array();
        $this->_allowedExtention[] = $allowedExtention;
        return $this;
    }

    /**
     * @param $allowedWidth
     * @return $this
     */
    public function changeAllowedWidth($allowedWidth)
    {
        $this->_allowedWidth = $allowedWidth;
        return $this;
    }

    /**
     * @param $allowedHeght
     * @return $this
     */
    public function changeAllowedHeght($allowedHeght)
    {
        $this->_allowedHeght = $allowedHeght;
        return $this;
    }

    /**
     * @param $allowedSize
     * @return $this
     */
    public function setAllowedSize($allowedSize)
    {
        $this->_allowedSize = $allowedSize;
        return $this;
    }


    /**
     * @param $path
     * @return $this
     */
    public function changePath($path)
    {
        $this->_path = $path;

        return $this;
    }

    public function changeTemporaryPath($path)
    {
        $this->_temporaryPath = $path;

        if(!is_dir($this->_temporaryPath . $this->_temporaryFolder) && !file_exists($this->_temporaryPath . $this->_temporaryFolder)) {

            mkdir($this->_temporaryPath . $this->_temporaryFolder);
            chmod($this->_temporaryPath . $this->_temporaryFolder, 0774);
        }

        return $this;
    }





} 