<?php
$patch_name = 'Ajouter l\'image du bouton de produit sur l\'accueil à chaque template';

$source = './scripts/boutonIP.png';
$dest = './repo/FreeWebsiteTemplate/public_html/img/boutonIP.png';

if (file_exists($source)) {

    echo '<br />';
    echo 'Copying file ANG - ';

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

$source = './scripts/boutonIP-fr.png';
$dest = './repo/FreeWebsiteTemplate/public_html/img/boutonIP-fr.png';

if (file_exists($source)) {

    echo '<br />';
    echo 'Copying file FR - ';

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