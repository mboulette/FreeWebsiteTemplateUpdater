<?php
$patch_name = 'Remplacer «Additionnal informations» par «Additional information»';

echo '<br />';
echo 'Modification du fichier de langue - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/locale/en_US.php';
$string1 = '=> \'Additionnal informations:\',';
$replace1 = '=> \'Additional information:\',';

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