<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$company = new StdClass;

$company->ceo = "Pedro";
$company->manager = new StdClass;
$company->manager->name = "Adrielly";

var_dump($company);

var_dump([
    "class" => get_class($company),
    "methods" => get_class_methods($company),
    "vars" => get_object_vars($company)
]);

$date = new DateTime();


var_dump([
    "class" => get_class($date),
    "methods" => get_class_methods($date),
    "vars" => get_object_vars($date),
    "parent" => get_parent_class($date),
    "subClass" => is_subclass_of($date, "DateTimeInterface")
]);