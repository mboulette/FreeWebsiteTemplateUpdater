<?php
$patch_name = 'Ajouter l\'image du bouton refresh pour le capcha du form';

$source = './scripts/refresh.png';
$dest = './repo/FreeWebsiteTemplate/public_html/img/refresh.png';

if (file_exists($source)) {

    echo '<br />';
    echo 'Copying file refresh - ';

    if (copy($source, $dest)) {
        echo "Ok";
    } else {
        http_response_code(500);
        die('Err : Copy impossible!');
    }

} else {
    http_response_code(500);
    die('Err : File not found!');
}

?>