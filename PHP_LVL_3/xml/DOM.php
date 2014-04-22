<?
header('Content-Type: text/html');

$dom = new DomDocument();
$dom->load('firstStep.xml');
//$dom->preserveWhiteSpace = false;
$root = $dom->documentElement;

//echo $root->nodeType;

$books = $root->childNodes;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1" width="100%">
        <tr>
            <th>Author</th>
            <th>Title</th>
            <th>Year of Publishing</th>
            <th>Price</th>
        </tr>
        <?
            foreach ($books  as $book) {

                if ($book->nodeType === 1) {
                    
                    echo "<tr>";
                    foreach ($book->childNodes as $item) {
                            
                            if ($item->nodeType === 1) {
                                echo "<td>".$item->textContent."</td>";
                            }
                        }    
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>