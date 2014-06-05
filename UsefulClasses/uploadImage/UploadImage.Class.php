<?php


class UploadImage {

    protected $_thumbsWidth  = 400;
    protected $_thumbsHeight = 400;//'image/jpg', 'image/png', 'image/jpeg'
    protected $_allowedExtention  = array('image/jpg', 'image/png', 'image/jpeg');
    protected $_allowedSize;
    protected $_allowedWidth;
    protected $_allowedHeght;
    protected $_destinationFolder = array(
                                       "main"   => "images/",
                                       "thumbs" => "thumbs/"
                                    );
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

    public function showErrors()
    {
        return $this->_errorCollector;
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

        //if image all ready exists setting image with number
        if(file_exists($this->_destinationFolder['main'] . $this->_imageName)) {

            $this->_imageNewName = $img[0] . "_" . time() . "." . $img[1];

        } else {

            $this->_imageNewName = $img[0] . "." . $img[1];
        }

        return $this;
    }


    /**
     * Uploading main Image
     */
    private function moveUploadedImage()
    {
        move_uploaded_file($this->_imageTmpName, $this->_destinationFolder['main'] .  $this->_imageNewName);
        return $this;
    }

    /**
     * Uploading image
     */
    public function uploadMainImage()
    {
        if ($this->_imageError == 0) {

            $this->checkImageSize();
            $this->checkImageExtention();
            $this->checkImageDimensions();

            if(empty($this->_errorCollector)) {
                $this->changeImageName()->moveUploadedImage()->createThumbs();
            }

        }

        return $this;
    }

    /**
     * Creating thumbs images
     */
    private function createThumbs()
    {

          if ($this->_imageHeight > $this->_imageWidth) {

              $this->_thumbsWidth = ($this->_imageWidth / $this->_imageHeight) * $this->_thumbsHeight;
          } else {
              $this->_thumbsHeight = ($this->_imageHeight / $this->_imageWidth) * $this->_thumbsWidth;
          }

          $tmpImg = imagecreatetruecolor($this->_thumbsWidth, $this->_thumbsHeight);
          switch ($this->_imageType) {

              case "image/jpeg":
              case "image/jpg":
                  $src = imagecreatefromjpeg($this->_destinationFolder['main'] .  $this->_imageNewName);
                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);
                  imagejpeg($tmpImg, $this->_destinationFolder['thumbs'] .  $this->_imageNewName, 100);
                  break;
              case "image/png":
                  $src = imagecreatefrompng($this->_destinationFolder['main'] .  $this->_imageNewName);
                  imagecopyresampled($tmpImg, $src, 0, 0, 0 ,0, $this->_thumbsWidth, $this->_thumbsHeight, $this->_imageWidth, $this->_imageHeight);
                  imagepng($tmpImg, $this->_destinationFolder['thumbs'] .  $this->_imageNewName, 24);

                  break;

          }

        return $this;
    }

    /**
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
     * @return bool
     */
    private function checkImageExtention()
    {

        if(!in_array($this->_imageType, $this->_allowedExtention)) {

            $this->_errorCollector[] = "The Image Extention is not Allowed!";

        }

        return $this;
    }


    private function checkImageDimensions()
    {
        if ($this->_imageWidth > $this->_allowedWidth) {

            $this->_errorCollector[] = "Image Dimension Width is Not Allowed!";

        } else if ($this->_imageHeight > $this->_allowedHeght) {

            $this->_errorCollector[] = "Image Dimension Height is Not Allowed!";

        }
    }



    /**
     * @param $extention
     * @return $this
     */
    public function addImageExtention($extention)
    {
        array_push($this->_allowedExtention, $extention);
        return $this;
    }

    /**
     * @param array $allowedExtention
     * @return $this
     */
    public function addAllowedExtention(array $allowedExtention)
    {
        $this->_allowedExtention = $allowedExtention;
        return $this;
    }

    /**
     * @param $allowedWidth
     * @return $this
     */
    public function setAllowedWidth($allowedWidth)
    {
        $this->_allowedWidth = $allowedWidth;
        return $this;
    }

    /**
     * @param $allowedHeght
     * @return $this
     */
    public function setAllowedHeght($allowedHeght)
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
     * @param $destinationFolder
     * @return $this
     */
    public function addDestinationFolder(array $destinationFolder)
    {
        $this->_destinationFolder = $destinationFolder;
        return $this;
    }





} 