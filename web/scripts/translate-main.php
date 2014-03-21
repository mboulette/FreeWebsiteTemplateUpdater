<?php
$patch_name = 'Permettre la 2nd Location';

echo 'Modification de menu_default.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Menu/menu_default.php';
$string1 = "case 'system':";
$replace1 = 'case \'system\':
            $target = isset($elem[\'attr\'][\'target\']) ? $elem[\'attr\'][\'target\'] : \'_self\';';

$string2 = 'echo "\n{$indent2}<a href=\"{$url}\"{$class}>{$title}</a>";';
$replace2 = 'echo "\n{$indent2}<a href=\"{$url}\"{$class} target=\"{$target}\">{$title}</a>";';

if (file_exists($fileToPatch)) {

    $content = file_get_contents($fileToPatch);

    if(strpos($content, $string1) !== false){
            $content = str_replace($string1, $replace1, $content);
    } else {
        http_response_code(500);
        die('Err : String1 not found!');
    }

    if(strpos($content, $string2) !== false){
            $content = str_replace($string2, $replace2, $content);
    } else {
        http_response_code(500);
        die('Err : String2 not found!');
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