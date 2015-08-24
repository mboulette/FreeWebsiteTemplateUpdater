<?php
$patch_name = 'Ajouter un BR dans la liste des telephone';

echo '<br />';
echo 'Modification de cl_nous-joindre.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';
$string1 = 'echo $phone[\'phone\'];';
$replace1 = 'echo $phone[\'phone\'] . \'</br>\';';

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