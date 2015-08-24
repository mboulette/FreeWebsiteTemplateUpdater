<?php
$patch_name = 'Ajouter le fichier custom.css';

echo 'Création du fichier custom.css<br>';

$fileToPatch = './repo/FreeWebsiteTemplate/public_html/css/custom.css';
$content = '/'.'*Ne pas supprimer, ce fichier sert de placeholder pour recevoir des rèegles de CSS custom*'.'/';

if (!file_put_contents($fileToPatch, $content)){
    http_response_code(500);
    die('Err : Can\'t create file!');
}


echo 'Ajouter la référence dans le fichier ml_default.php - ';
$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Structure/ml_default.php';

$string1 = '<link rel="stylesheet" type="text/css" media="all" href="colorbox/colorbox.css" />';
$replace1 = '<link rel="stylesheet" type="text/css" media="all" href="colorbox/colorbox.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/custom.css" />';

if (file_exists($fileToPatch)) {

    $content = file_get_contents($fileToPatch);

    if(strpos($content, $string1) !== false){
            $content = str_replace($string1, $replace1, $content);
    } else {
        http_response_code(500);
        die('Err : String1 not found!');
    }

    try {
        file_put_contents($fileToPatch, $content);
    } catch (Exception $e) {
        http_response_code(500);
        die('Err : '.$e->getMessage());
    }

    echo 'Ok';

} else {
    http_response_code(500);
    die('Err : File not found!');
}