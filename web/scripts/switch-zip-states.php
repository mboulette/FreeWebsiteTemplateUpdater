<?php
$patch_name = 'Remplacer l\'ordre d\'affichage de l\'adresse';

echo 'Modification dans cl_nous-joindre.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';

$string1 = '<span><?php echo $POSTALCODE; ?></span>
                        <span><?php echo $STATE; ?></span>';
$replace1 = '<span><?php echo $STATE; ?></span>
                        <span><?php echo $POSTALCODE; ?></span>';


if (file_exists($fileToPatch)) {

    $content = file_get_contents($fileToPatch);

    if(strpos($content, $string1) !== false){
            $content = str_replace($string1, $replace1, $content);
    } else {
        //http_response_code(500);
        //die('Err : String1 not found!');
        die('Ok');
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