<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=people_list;charset=utf8', 'root', '123');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}

$sql = "SELECT `people_fname`, `people_lname` FROM `people` ";


$query  = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$xml = new DOMDocument('1.0', 'utf-8');
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
//$xml->xmlStandalone = false;

$urlset = $xml->createElement('urlset');

$xml->appendChild($urlset);

foreach ($result as $xmap) {

    $firstName = $xml->createElement('firstName');
    $lastName  = $xml->createElement('lastName');

    $firstNameText = $xml->createTextNode(''.$_SERVER['HTTP_HOST'] . "/" . $xmap['people_fname'].'');
    $lastnameText  = $xml->createTextNode(''.$_SERVER['HTTP_HOST'] . "/" . $xmap['people_lname'].'');

    $firstName->appendChild($firstNameText);
    $lastName->appendChild($lastnameText);

    $url = $xml->createElement('url');
    $url->appendChild($firstName);
    $url->appendChild($lastName);

    $urlset->appendChild($url);
}
 
$xml->save("sitemap.xml");

if ($xml->save("sitemap.xml")) {

    echo "Link to your sitemap file is - <strong>http://".$_SERVER['HTTP_HOST']."/sitemap.xml</strong><br/><br/>";

    echo "<xmp>". $xml->saveXML() ."</xmp>";
} else {
    echo "there is a problem with creating XML MAP file";
}


