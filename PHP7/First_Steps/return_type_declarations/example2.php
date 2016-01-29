<?php



namespace foo {

use DateTimeImmutable;

    interface HolidayInterface
    {
        public function getMemorial();// : DateTimeImmutable;

        public function getThanksGiving();
    }

}


namespace baz {

use foo\HolidayInterface as HolidayInterface;
use DateTimeImmutable;


    class Holidays implements HolidayInterface
    {
        protected $date;

        public function __construct($year = null)
        {
            $y          = $year ?? date('Y');
            $this->date = new DateTimeImmutable("January 1, {$y}");

        }

        public function getMemorial() : DateTimeImmutable
        {

            echo '<pre>' . print_r( $this->date->modify('last Monday of May'), true) . '</pre>';
            return $this->date->modify('last Monday of May');
        }

        public function getThanksGiving()
        {
            return $this->date->modify('fourth Thursday of November');
        }
    }


    $holidays = new Holidays();

    //echo '<pre>' . print_r($holidays, true) . '</pre>';
    $memorial = $holidays->getMemorial();
}



