<?php

$mediacount = 0;
echo "Ficheiros <br>";
foreach ($_FILES['files']['tmp_name'] as $file) {
    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res === TRUE) {
        $zip->extractTo(__DIR__ . '\posts\\' . $_POST['posts'][$mediacount]);
        $zip->close();
        $mediacount++;
    }
}
echo "Foram adicionados " . $_POST['postcount'] . "anuncio(s), " . $mediacount . " dos quais com ficheiros multimedia, localizados em posts/[id]";
