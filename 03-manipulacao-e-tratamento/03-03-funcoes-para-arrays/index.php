<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge"
];

$assoc = [
    "band1" => "AC/DC",
    "band2" => "Nirvana",
    "band3" => "Alter Bridge"
];
//adiciona valor no começo
array_unshift($index, "", "SOAD", "Metallica");
$assoc = ['band4' => 'xuxa', 'band5' => 'tiririca'] + $assoc;

//adiciona valor no final
array_push($index, "ronaldo");
$assoc = $assoc + ['band6' => 'kaka'];

//remove valor no começo
array_shift($index);
array_shift($assoc);

//remove valor no final
array_pop($index);
array_pop($assoc);

//remove valores vazios
array_unshift($index, "");
$index = array_filter($index);

var_dump([
    $index,
    $assoc
]);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

//reverte a ordem dos valores
$index = array_reverse($index);
$assoc = array_reverse($assoc);

//ordena pelos valores mantendo os indices
asort($index);
asort($assoc);

//orderna pelas keys CRESCENTE
ksort($index);
ksort($assoc);

//orderna pelas keys DECRESCENTE
krsort($index);
krsort($assoc);

//ordena pelo valores e substitue os indices
sort($index);

var_dump([
    $index,
    $assoc
]);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    [
        array_keys($assoc), //pega as keys
        array_values($assoc)//pega os values
    ]
]);

//verifica se há o valor no array
if (in_array('AC/DC', $assoc)) {
    echo "<p>ROOOOOOOOOOOOCK</p>";
}

//transforma array em string
$arrayToString = implode(", ", $assoc);
echo "<p>Eu curso {$arrayToString}</p>";

//transforma string em array
var_dump(explode(", ", $arrayToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    'name' => "Pedro",
    "company" => "Tray",
    "mail" => "pedrocavt@gmail.com"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}<br>
        <a href="mailto:{{email}}" title="Enviar email para {{name}}">Enviar Email</a></p>
    </article>
TPL;

echo $template;

echo str_replace(
    array_keys($profile),
    array_values($profile),
    $template 
);