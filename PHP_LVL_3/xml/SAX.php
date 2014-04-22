<?php

header('Content-Type: text/html; charset=utf-8');

//Sax is xml tool for only read xml files
$sax = xml_parser_create('utf-8');

//linking and calling functions onStartTag and onCloseTag
xml_set_element_handler($sax, 'onStartTag', 'onCloseTag');

//calling to onTagText function
xml_set_character_data_handler($sax, 'onTagText');
echo "<table>";
function onStartTag($parser, $startTag, $attr)
{
    if ($startTag != "BOOK" && $startTag != 'CATALOG') {
        echo "<td>";
    }

    if ($startTag == 'BOOK') {
        echo '<tr>';
    }
    
}

function onCloseTag($parser, $closeTag)
{

    if ($closeTag != "BOOK" && $closeTag != 'CATALOG') {
        echo "</td>";
    }
    if ($closeTag == 'BOOK') {
        echo '</tr>';
    }
    
}

function onTagText($parser, $text)
{
    echo $text;
}


xml_parse($sax, file_get_contents('firstStep.xml'));
echo "</table>";
