<?php
$patch_name = 'Ajouter l\'image du bouton de produit sur l\'accueil à chaque template';

$source = './scripts/products_home_button.png';
$dest = './repo/FreeWebsiteTemplate/public_html/img/products_home_button.png';

if (file_exists($source)) {

    echo '<br />';
    echo 'Copying file - ';

    if (copy($file, $newfile)) {
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