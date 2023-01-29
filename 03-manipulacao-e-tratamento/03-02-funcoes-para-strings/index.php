<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último show do AC/DC foi íncrivel";

var_dump([
    "string" => $string,
    'strlen' => strlen($string),
    'mb_strlen' => mb_strlen($string),
    'substr' => substr($string, 9),
    'mb_substr' => mb_substr($string, 9),
    'strtoupper' => strtoupper($string),
    'mb_strtoupper' => mb_strtoupper($string),
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

var_dump([
    'mb_strtoupper' => mb_strtoupper($string),
    'mb_strtolower' => mb_strtolower($string),
    'mb_convert_case UPPER' => mb_convert_case($string, MB_CASE_UPPER),
    'mb_convert_case LOWE' => mb_convert_case($string, MB_CASE_LOWER),
    'mb_convert_case TITLE' => mb_convert_case($string, MB_CASE_TITLE),
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$string .= ", fui e foi brabo";
$string .= ", iria de novo";

var_dump([
    'mb_strlen' => mb_strlen($string),
    'mb_strpos' => mb_strpos($string, ","),
    'mb_strrpos' => mb_strrpos($string, ","),
    'mb_substr' => mb_substr($string, 40+2, 14),
    'mb_strstr' => mb_strstr($string, ",", true),
    'mb_strrchr' => mb_strrchr($string, ",", true)
]);

$strReplace = $string;

echo "<p>" . $string . "</p>";
echo "<p>" . str_replace('AC/DC', "Nirvana", $strReplace) . "</p>";
echo "<p>" . str_replace(['AC/DC', 'iria'], ["Nirvana", 'não iria'], $strReplace) . "</p>";


$article = <<<ROCK
    <article>
        <h3>event</h3>
        <p>desc</p>
    </article>
ROCK;

$articleData = [
    'event' => 'Rock in Sao Paulo',
    'desc' => $strReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);

/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Pedro&email=pedrocavt@gmail.com";

mb_parse_str($endPoint, $parserEndPoint);

var_dump([
    $endPoint,
    $parserEndPoint,
    (object) $parserEndPoint
]);