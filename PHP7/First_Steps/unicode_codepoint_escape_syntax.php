<?php

//Four-digit codepoints
echo '<pre>' . print_r("<p> Caf\u{00e9} Royal", true) . '</pre>';

$tel = "\u{260e}";

echo "<p>{$tel} (212) 555-555</p>";

//Five-digit codepoints
echo "<p>PHP 7 has spaceships! \xF0\x9F\x9A\x81 </p>";

//Landings zeros omitted
echo "<p>Caf\u{e9} Royal</p>";

//<<<<<json not affected
echo json_decode("\"\u00e9\"");