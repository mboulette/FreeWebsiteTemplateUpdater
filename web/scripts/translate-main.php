<?php
$patch_name = 'Modification de traduction sur Main.php';

echo 'Modification de traduction sur Main.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/Layout/Main.php';

$string1 = "_('API Communication Error')";
$replace1 = 'Helper_Trans::translate("Page", "API Communication Error")';



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