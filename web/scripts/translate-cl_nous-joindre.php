<?php
$patch_name = 'Modification de traduction sur cl_404.php';

echo 'Modification de traduction sur cl_404.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_listItMedia.php';

$string1 = "dgettext('ItMedia', 'On television')";
$replace1 = "Helper_Trans::translate('Page', 'On television')";

$string2 = '_("Close")';
$replace2 = "Helper_Trans::translate('Page', 'Close')";

$string3 = '_("Read more")';
$replace3 = "Helper_Trans::translate('Page', 'Read more')";

$string4 = "dgettext('ItMedia', 'On the radio')";
$replace4 = "Helper_Trans::translate('Page', 'On the radio')";

$string5 = "dgettext('ItMedia', 'In the Press')";
$replace5 = "Helper_Trans::translate('Page', 'In the Press')";

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

    if(strpos($content, $string3) !== false){
        $content = str_replace($string3, $replace3, $content);
    } else {
        http_response_code(500);
        die('Err : String3 not found!');
    }

    if(strpos($content, $string4) !== false){
        $content = str_replace($string4, $replace4, $content);
    } else {
        http_response_code(500);
        die('Err : String4 not found!');
    }

    if(strpos($content, $string5) !== false){
        $content = str_replace($string5, $replace5, $content);
    } else {
        http_response_code(500);
        die('Err : String5 not found!');
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