<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);


echo "<h1><a href='index.php'>Clear</a></h1>";

$data = [
    'name' => "Pedro",
    "email" => "pedrocavt@gmail.com"
];

$arguments = http_build_query($data);
echo "<h1><a href='index.php?{$arguments}'>Args By Array</a></h1>";

var_dump($_GET);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataFilter = http_build_query([
    'name' => "Pedro",
    "email" => "pedrocavt@gmail.com",
    "script" => "<script>alert('se fudeu')</script>",
    "site" => "http://pedro.com.br"
]);

echo "<h1><a href='index.php?{$dataFilter}'>Data Filter</a></h1>";

$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

$filter = [
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "script" => FILTER_SANITIZE_SPECIAL_CHARS,
    "site" => FILTER_VALIDATE_URL
];

$dataUrlFilter = filter_input_array(INPUT_GET, $filter);

var_dump($dataUrl);

var_dump($dataUrlFilter);
