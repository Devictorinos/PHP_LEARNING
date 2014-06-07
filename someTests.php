<?php
$a = 5;
$b = $a; // присваиваем переменой b значение а
$b = 3; // изменяем значение b
echo 'а =', $a, ' b = ', $b;

echo "<br />";
// когда мы изменили b на а это никак не повлияло посколько мы просто скопировали в b значение а
// тот же пример только со сылкой
$a = 5;
$b = &$a; // присваиваем переменой b значение а
$b = 6; // изменяем значение b
echo 'а =', $a, ' b = ', $b; // как видим изменяя b мы изменили и а. Посути b это и есть а поскольку там просто сылка.

/**
 * @author Jay Gilford
 */

/**
 * get_links()
 * 
 * @param string $url
 * @return array
 */

   // function getLinks($link)
    //{
        /*** return array ***/
     //   $ret = array();

        /*** a new dom object ***/
      //  $dom = new domDocument;

        /*** get the HTML (suppress errors) ***/
      //  @$dom->loadHTML(file_get_contents($link));

        /*** remove silly white space ***/
      //  $dom->preserveWhiteSpace = false;

        /*** get the links from the HTML ***/
        //$links = $dom->getElementsByTagName('a');
    
        /*** loop over the links ***/
      //  foreach ($links as $tag)
      //  {
      //      $ret[$tag->getAttribute('href')] = $tag->childNodes->item(0)->nodeValue;
      //  }

      //  return $ret;
   // }*/


       /*** a link to search ***/
   // $link = "http://yad2.co.il";

    /*** get the links ***/
   // $urls = getLinks($link);

    /*** check for results ***/
   // if(sizeof($urls) > 0)
   // {
    //    foreach($urls as $key=>$value)
    //    {
     //       echo $key . ' - '. $value . '<br >';
     //   }
   // }
   // else
   // {
      //  echo "No links found at $link";
   // }


    