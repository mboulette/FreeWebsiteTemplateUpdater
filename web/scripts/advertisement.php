<?php
$patch_name = 'Fix si nous ajoutons un script de pub ';

echo 'Modification de ml_default.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Structure/ml_default.php';
$string1 = '<script src="js/jquery.colorbox-min.js"></script>';
$replace1 = '<script src="js/jquery.colorbox-min.js"></script>
        <script src="http://www.idealprotein.com/aw-pub/advertisement.php?locale=<'.'?'.'php echo $_SESSION[INTERNAL][\'locale\']->getAbbr(); '.'?'.'>"></script>';

$string2 = '(substr($src, 0, 4) == \'http\') ? : (\'js/\')';
$replace2 = '(substr($src, 0, 4) == \'http\') ? \'\': (\'js/\')';

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