<?php
$patch_name = 'Modification de traduction sur contactInfo.php';

echo 'Modification de traduction sur contactInfo.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/contactInfo.php';

$string1 = "gettext('Address')";
$replace1 = "Helper_Trans::translate('Page', 'Address')";

$string2 = "gettext('Contact')";
$replace2 = "Helper_Trans::translate('Page', 'Contact')";

$string3 = '_("Téléphone")';
$replace3 = "Helper_Trans::translate('Page', 'Phone')";

$string4 = '_("Email")';
$replace4 = "Helper_Trans::translate('Page', 'Email')";


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