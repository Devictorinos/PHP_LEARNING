<?php

function wordsToUpper($string) : array
{
    if(empty($string) || is_null($string)) return [];

    $stringArr = explode(' ', $string);

    return array_map('strtoupper', $stringArr);
}

$input     = 'one two three four five';
$input     = '';

echo '<pre>' . print_r($input, true) . '</pre>';

$converted = wordsToUpper($input);
$converted = implode(' ', $converted);

echo '<pre>' . print_r($converted, true) . '</pre>';