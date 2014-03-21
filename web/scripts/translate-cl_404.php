<?php
$patch_name = 'Modification de traduction sur cl_404.php';

echo 'Modification de traduction sur cl_404.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_404.php';

$string1 = "_('Page introuvable')";
$replace1 = "Helper_Trans::translate('Page', 'Page Not Found')";

$string2 = "_('Page introuvable La page que vous essayez d\'atteindre a été soit supprimé ou n\'existe pas.')";
$replace2 = "Helper_Trans::translate('Page', 'Page Not Found The Page you are trying to reach has either been deleted or does not exist.')";

$string3 = "_('Cliquez ici')";
$replace3 = "Helper_Trans::translate('Page', 'Click Here')";

$string4 = "_('pour retourner à la page d\'accueil.')";
$replace4 = "Helper_Trans::translate('Page', 'to go back to the home page.')";

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
        die('Err : String2 not found!');
    }

    if(strpos($content, $string4) !== false){
        $content = str_replace($string4, $replace4, $content);
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