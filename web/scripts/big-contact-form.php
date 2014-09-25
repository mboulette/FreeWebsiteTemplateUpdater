<?php
$patch_name = 'Agrandir la Contact form pour y ajouter le champ telephone dans cl_nous-joindre.php';

echo 'Agrandir la Contact form pour y ajouter le champ telephone dans cl_nous-joindre.php';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';

$string1 = 'colorbox({inline:true, width:"550px", height:"675px", opacity:"0.6"});';
$replace1 = 'colorbox({inline:true, width:"550px", height:"740px", opacity:"0.6"});';


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