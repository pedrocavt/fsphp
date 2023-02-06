<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

$file = __DIR__ . "/file.txt";

if (file_exists($file) && is_file($file)) {
    echo "O arquivo existe";
} else {
    echo "O arquivo não existe";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w");
    fwrite($fileOpen, "Linha 1" . PHP_EOL);
    fwrite($fileOpen, "Linha 2" . PHP_EOL);
    fwrite($fileOpen, "Linha 3" . PHP_EOL);
    fclose($fileOpen);
} else {
    var_dump(
        file($file),
        pathinfo($file),
    );
}

$open = fopen($file, "r");

while (!feof($open)) {
    echo fgets($open);
}

fclose($open);

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

$getContent = __DIR__ . "/file2.txt";

if (file_exists($getContent) && is_file($getContent)) {
    echo file_get_contents($getContent);
} else {
    $data = "RONALDO BRILHA MUITO NO CORINTHIAS";
    file_put_contents($getContent, $data);
    echo file_get_contents($getContent);
}

unlink($getContent);
unlink($file);