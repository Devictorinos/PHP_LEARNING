<?php

$list = <<< END
<p class=ListParaFirst> <span style='font-fam ily: Symbol;'>.<span style='font: 7.0pt "Times New Roman"' >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>APPLES</p>
    <p class=ListParaMiddle> <span style='font-fam ily: Symbol;'>.<span style='font: 7.0pt "Times New Roman"' >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>BANANAS</p>
    <p class=ListParaMiddle> <span style='font-fam ily: Symbol;'>.<span style='font: 7.0pt "Times New Roman"' >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>ORANGES</p>
    <p class=ListParaLast> <span style='font-fam ily: Symbol;'>.<span style='font: 7.0pt "Times New Roman"' >
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </span></span>PEARS</p>
END;

$listStart = '<ul>';
$listEnd   = '</ul>';
$itemStart = '<li>';
$itemEnd   = '</li>';

//Match the last bullet point, and wrap the text
//in list with tags <ul> <li>
function lastBullet($matches) //use ($itemStart, $itemEnd, $listEnd)
{
    //echo '<pre>' . print_r($matches, true) . '</pre>';
    return "<li>{$matches[1]}</li></ul>";
}

echo $list;

echo '<hr />';

$lists = preg_replace_callback_array(

    array(
        //Match the bullet text, change case, and
        //replace with </li> tag </p> tag
        '{</span>(\w+)</p>}m' => function($matches) use ($itemEnd) {

            return ucfirst(strtolower($matches[1])) . $itemEnd;
        },
        //Match first bullet point, and add opening tags
        '{<p class=ListParaFirst[\s\S]*?</span>}m' => function($matches) use ($listStart, $itemStart) {

            return $listStart . PHP_EOL . $itemStart;
        },
        '{<p class=ListParaMiddle[\s\S]*?</span>}m' => function($matches)  use ($itemStart) {

            return $itemStart;
        },
      /*  '{<p class=ListParaLast[\s\S]*?</span>}m' => function() use ($itemStart, $itemEnd, $listEnd) {
            return $itemEnd . $listEnd;
        }*/
        '{<p class=ListParaLast[\s\S]*?</span>(\w+)</li>}m' => 'lastBullet'



    ) , $list);

echo $lists;