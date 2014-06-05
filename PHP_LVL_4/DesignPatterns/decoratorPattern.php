<?php

abstract class ACourse
{
     abstract public function action();
}

class Course extends ACourse
{
    public function action()
    {
        echo "hello";
    }
}

abstract class ACourseDecorator extends ACourse
{

    private $_course;

    public function __construct(ACourse $obj)
    {
        $this->_course = $obj;
    }

    public function action()
    {
        $this->_course->action();
    }
}

class CourseDecorator extends ACourseDecorator
{
    public function action()
    {
        echo "say ";

        parent::action();

        echo " to victor";
    }
}


/*$course = new Course();
$course->action();*/
$course = new Course();
echo "<pre>" . print_r($course, true) . "</pre>";

$Cdecorator = new CourseDecorator(new Course());
$Cdecorator->action();
