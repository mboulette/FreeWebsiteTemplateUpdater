<?php
$patch_name = 'Modification de traduction sur conference_full.php';

echo 'Modification de traduction sur conference_full.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/conference_full.php';

$string1 = "_('Date :')";
$replace1 = "Helper_Trans::translate('Page', 'Date:')";

$string2 = "_('Hour :')";
$replace2 = "Helper_Trans::translate('Page', 'Hour:')";

$string3 = "_('Location :')";
$replace3 = "Helper_Trans::translate('Page', 'Location:')";

$string4 = "_('Address :')";
$replace4 = "Helper_Trans::translate('Page', 'Address:')";

$string5 = "_('Phone :')";
$replace5 = "Helper_Trans::translate('Page', 'Phone:')";

$string6 = "_('Additionnal informations :')";
$replace6 = "Helper_Trans::translate('Page', 'Additionnal informations:')";


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

    if(strpos($content, $string6) !== false){
        $content = str_replace($string6, $replace6, $content);
    } else {
        http_response_code(500);
        die('Err : String6 not found!');
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