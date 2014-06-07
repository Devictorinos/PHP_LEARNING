<?php


class UploadImage {

    protected $_path = '/var/www/UsefulClasses/uploadImage/';
    protected $_thumbsWidth  = 200;
    protected $_thumbsHeight = 200;//'image/jpg', 'image/png', 'image/jpeg'
    protected $_allowedExtention  = array('image/jpg', 'image/png', 'image/jpeg');
    protected $_allowedSize;
    protected $_allowedWidth;
    protected $_allowedHeght;
    protected $_destinationFolder = 'temp/';
    protected $_thumbFolder;
    protected $_imageNewName;
    protected $_errorCollector = array();




    /* IMAGE VARIABLES */
    private $_imageName;
    private $_imageType;
    private $_imageTmpName;
    private $_imageSize;
    private $_imageError;
    private $_imageWidth;
    private $_imageHeight;
    private $_imageDimensions;

    public function __construct()
    {
        $this->_allowedHeght     = 1000;
        $this->_allowedWidth     = 1000;
        $this->_allowedSize      = 5120 * 1024;//5 megabyte // 5120 kilobyte

    }

    /**
     * Unlinking temporary image
     * @return array of errors
     */
    public function fishish()
    {
        unlink($this->_path . $this->_destinationFolder . $this->_imageNewName);
        return array($this->_errorCollector, $this->_path, $this->_imageNewName);
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
     * @return $this
     */
    protected function changeImageName()
    {

        $img = explode('.', $this->_imageName);// exploding image to two part - 1 name 2 extention

        if (!is_dir($this->_destinationFolder)) {

            mkdir($this->_destinationFolder);
            chmod($this->_destinationFolder, 0775);
        }

            $this->_imageNewName = $img[0] . "_" . time() . "." . $img[1];
            //$this->_imageNewName = $img[0] . "_" . sprintf("%s_%dx%d_thumb", $this->_imageName, "_", "_") . "." . $img[1];

        return $this;
    }


    /**
     * Uploading main Image
     */
    private function moveUploadedImage()
    {
        move_uploaded_file($this->_imageTmpName, $this->_destinationFolder .  $this->_imageNewName);
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
    public function createThumbs($width = null , $height = null, $folder = null)
    {
          if (!is_null($width) && !is_null($height)) {
              $this->_thumbsWidth  = $width;
              $this->_thumbsHeight = $height;
          }

          if(!is_null($folder) && !is_dir($this->_path . $folder) && !file_exists($this->_path . $folder)) {

              mkdir($this->_path . $folder);
              chmod($folder, 0775);

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


                  $src = imagecreatefromjpeg($this->_destinationFolder .  $this->_imageNewName);
                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);
                  imagejpeg($tmpImg, $this->_path . $this->_thumbFolder .  $this->_imageNewName, 100);
                  imagedestroy($src);
                  break;
              case "image/png":

                  $src = imagecreatefrompng($this->_destinationFolder .  $this->_imageNewName);
                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);
                  imagepng($tmpImg, $this->_path . $this->_thumbFolder .  $this->_imageNewName);
                  imagedestroy($src);
                  break;

          }

        return $this;
    }

    //TODO create method for insert image data to data base and if exists POST data
    public function prepareDataForDb(array $data)
    {

    }

    //TODO check minimum image size
    /**
     * Checking image size
     * @return bool
     */
    private function checkImageSize()
    {

        if($this->_imageSize > $this->_allowedSize) {

            $this->_errorCollector[] = "Image Size is Not Allowed!";
        }

        return $this;
    }

    /**
     * Cchecking image extention
     * @return bool
     */
    private function checkImageExtention()
    {

        if(!in_array($this->_imageType, $this->_allowedExtention)) {

            $this->_errorCollector[] = "The Image Extention is not Allowed!";

        }

        return $this;
    }


    /**
     * Checkin image width and height
     * @return $this
     */

    private function checkImageDimensions()
    {
        if ($this->_imageWidth > $this->_allowedWidth) {

            $this->_errorCollector[] = "Image Dimension Width is Not Allowed!";

        } else if ($this->_imageHeight > $this->_allowedHeght) {

            $this->_errorCollector[] = "Image Dimension Height is Not Allowed!";

        }

        return $this;
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





} 