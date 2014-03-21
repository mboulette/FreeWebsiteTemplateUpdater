<?php
$patch_name = 'Modification de traduction sur cl_nous-joindre.php';

echo 'Modification de traduction sur cl_nous-joindre.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';

$string1 = "gettext('Address')";
$replace1 = "Helper_Trans::translate('Page', 'Address')";

$string2 = "gettext('Other location')";
$replace2 = "Helper_Trans::translate('Page', 'Other location')";

$string3 = "gettext('Contact')";
$replace3 = "Helper_Trans::translate('Page', 'Contact')";

$string4 = '_("Téléphone")';
$replace4 = "Helper_Trans::translate('Page', 'Phone')";

$string5 = '_("Email")';
$replace5 = "Helper_Trans::translate('Page', 'Email')";

$string6 = "gettext('Contact Form')";
$replace6 = "Helper_Trans::translate('Page', 'Contact Form')";

$string7 = 'Google Map';
$replace7 = "<?php echo Helper_Trans::translate('Page', 'Google Map'); ?>";



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

    if(strpos($content, $string7) !== false){
        $content = str_replace($string7, $replace7, $content);
    } else {
        http_response_code(500);
        die('Err : String7 not found!');
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