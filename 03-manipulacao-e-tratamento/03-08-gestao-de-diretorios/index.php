<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__ . "/folder";

if (!file_exists($folder) && !is_dir($folder)) {
    mkdir($folder, 0755);
} else {
    var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

$file = __DIR__ . "/file.txt";

var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__)
);

if (!file_exists($file) || !is_file($file)) {
    $open = fopen($file, "w");
    fclose($open);
} else {
    // var_dump(filemtime($file), filemtime(__DIR__ . "/folder/file.txt"));
    // copy($file, $folder . "/" . basename($file));
    // rename(__DIR__ . "/folder/file.txt", __DIR__ . "/folder/" . time() . "." . pathinfo($file)["extension"]);
    rename($file, __DIR__ . "/folder/" . time() . "." . pathinfo($file)["extension"]);
}
/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

// mkdir(__DIR__ . "/remove");

$dirRemove = __DIR__ . "/remove";
$dirFiles = array_diff(scandir($dirRemove), ['.', '..']);
$dirCount = count($dirFiles);

var_dump(scandir($dirRemove), $dirFiles, $dirCount);

if ($dirCount > 1) {
    echo "CLEAR";
    foreach (scandir($dirRemove) as $fileItem) {
        $fileItem = __DIR__ . "/remove/{$fileItem}";
        if (file_exists($fileItem) && is_file($fileItem)) {
            unlink($fileItem);
        }
    }
}