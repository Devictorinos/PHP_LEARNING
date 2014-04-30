<?php

class Logger
{
    const LOG_NAME = "control.log";

    static private $_init = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function init()
    {
        if (self::$_init === null) {
            self::$_init = new Logger();
        }

        return self::$_init;
    }

    public function log($str)
    {
        file_put_contents(self::LOG_NAME, $str.PHP_EOL, FILE_APPEND);
    }
}

$logger = Logger::init();
$logger->log("Victorino");
$logger->log("Victorino" . __LINE__);
//$log = new Logger();
echo "<pre>" . print_r($logger, true) . "</pre>";
//echo "<pre>" . print_r($log, true) . "</pre>";