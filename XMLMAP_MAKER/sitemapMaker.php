<?php



require_once "php/db_connect.php";


$sql = "SELECT `pages_niceurl` FROM `pages` ";


$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$xml = new DOMDocument('1.0', 'utf-8');
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
//$xml->xmlStandalone = false;

$urlset = $xml->createElement('urlset');
$urlsetAtt = $xml->createAttribute('xmlns');
$urlsetAtt->value = 'http://www.sitemaps.org/schemas/sitemap/0.9';
$urlset->appendChild($urlsetAtt);


$xml->appendChild($urlset);

foreach ($result as $xmap) {

    $loc = $xml->createElement('loc');


    $locText = $xml->createTextNode('http://'.$_SERVER['HTTP_HOST'] . "/" . $xmap['pages_niceurl'].'');
    $loc->appendChild($locText);

    $url = $xml->createElement('url');
    $url->appendChild($loc);


    $urlset->appendChild($url);
}
 
$xml->save("sitemap.xml");

if ($xml->save("sitemap.xml")) {

    echo "Link to your sitemap file is - <strong>http://".$_SERVER['HTTP_HOST']."/sitemap.xml</strong><br/><br/>";

    echo "<xmp>". $xml->saveXML() ."</xmp>";
} else {
    echo "there is a problem with creating XML MAP file";
}



