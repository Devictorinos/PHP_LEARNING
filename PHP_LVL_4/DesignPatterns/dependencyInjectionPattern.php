<?php

//dependency Injection
class Author
{
    private $_fname;
    private $_lname;

    public function __construct($fn, $ln)
    {
        $this->_fname = $fn;
        $this->_lname = $ln;
    }

    public function getFname()
    {
        /*...*/
    }

    public function getLname()
    {
        /*...*/
    }
}

class Book
{
    private $_title;
    private $_author;

    public function __construct($title, Author $obj)//dependency Injection method
    {
        $this->_title = $title;
        $this->_author = $obj;//dependency Injection method
    }

    public function getAuthor()
    {
        /*...*/
    }

    public function getTitle()
    {
        /*...*/
    }
}

$author = new Author("Victor", "Lubchuk");

echo "<pre>" . print_r($author, true) . "</pre>";

$book = new Book("My Book", $author);//dependency Injection method

echo "<pre>" . print_r($book, true) . "</pre>";