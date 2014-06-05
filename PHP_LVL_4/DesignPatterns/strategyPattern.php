<?

abstract class FileNamingStrategy
{
    abstract public function createLinkName($fileName);
}

class ZipFile extends FileNamingStrategy
{
    public function createLinkName($fileName)
    {
        return "http://localhost/downloads/{$fileName}.zip";
    }
}

class TarGzFile extends FileNamingStrategy
{
    public function createLinkName($fileName)
    {
        return "http://localhost/downloads/{$fileName}.tar.gz";
    }
}

class FileStrategy
{
    protected $__type;

    public function __construct()
    {
        if (strstr($_SERVER['HTTP_USER_AGENT'], "Win")) {
            $this->__type = new ZipFile();
        } else {
            $this->__type = new TarGzFile();
        }
    }

    public function getLink($name)
    {
        return $this->__type->createLinkName($name);
    }
}

$obj = new FileStrategy();
$link1 = $obj->getLink("file_1");
$link2 = $obj->getLink("file_2");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="<?=$link1?>">gdfgfdgdf</a><br />
    <a href="<?=$link2?>">gfdgdfgdf</a><br />
</body>
</html>
