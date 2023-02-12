<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/upload";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

var_dump([
    "filesize" => ini_get("upload_max_filesize"),
    "postsize" => ini_get("post_max_size")
]);

var_dump([
    filetype(__DIR__ . "/index.php"),
    mime_content_type(__DIR__ . "/index.php")
]);

var_dump($_FILES);

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if ($_FILES && !empty($_FILES['file']['name'])) {
    $fileUpload = $_FILES['file'];
    var_dump($fileUpload);

    $allowdTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];

    $newFileName = time() . mb_strstr($fileUpload['name'], ".");

    if (in_array($fileUpload["type"], $allowdTypes)) {
        if (move_uploaded_file($fileUpload['tmp_name'], __DIR__ . "/upload/{$newFileName}")) {
            echo "Arquivo enviado com sucesso";
        } else {
            echo "Erro inesperado";
        }
    } else {
        echo "Tipo de arquivo não permitido";
    }

} else if (empty($_FILES) && $getPost) {
    echo "Arquivo grande demais";
} else if ($_FILES) {
    echo "Selecione um arquivo antes de enviar";
}

require __DIR__ . "/form.php";

var_dump(scandir(__DIR__ . "/upload"));