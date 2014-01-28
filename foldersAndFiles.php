<?php

//echo __FILE__."<br>";


if (!file_exists("test")) {
    mkdir("test");//create folder
}
chdir("test");//enter inside created  folder

file_put_contents("test.txt", "hellow world");//create files inside folder
file_put_contents("test1.txt", "hellow world1");

if (!file_exists("test2")) {
    mkdir("test2");//creating another folder inside folder.
}
chdir("test2");//enter inside created  folder

file_put_contents("test2.txt", "hellow world2");//create files inside folder

chdir("..");//exit to the previous folder

file_put_contents("test3.txt", "hellow world3");//create files inside folder

chmod("test3.txt", 0775);//change premmisions of file

/*
 
 RECURSIVE FUNCTION means call to FUNCTION inside itself

 */

//recursive function that show all files and folders
function printAllFiles($dir)
{
    $list = glob($dir."/*");//shows the contents of folders "/*" - show all
        // echo "<pre>";
        // print_r($list);
        // echo "</pre>";

    for ($i=0; $i < count($list); $i++) {
        if (is_dir($list[$i])) {
            printAllFiles($list[$i]);
        } else {
             echo "<pre>";
             print_r($list[$i]);
             echo "</pre>";
        }
    }

}

printAllFiles(".");// ' . ' = means current folder.

chdir("..");

function DeleteAllFiles($dir)
{
    $list = glob($dir."/*");
    for ($i=0; $i < count($list); $i++) {

        if (is_dir($list[$i])) {
            DeleteAllFiles($list[$i]);
        } else {
            unlink($list[$i]);//dellete files
        }
    }

    rmdir($dir);//delete folder
}


//DeleteAllFiles("test");
