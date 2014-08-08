<?php
$patch_name = 'Ajouter l\'image du bouton de produit sur l\'accueil à chaque template';

$file = './scripts/bca-open.jpg';
$file1 = './scripts/bca.jpg';
$file2 = './scripts/chef-livre1-open.jpg';
$file3 = './scripts/chef-livre1.jpg';
$file4 = './scripts/chef-livre2-open.jpg';
$file5 = './scripts/chef-livre2.jpg';
$file6 = './scripts/chef-moijto-open.jpg';
$file7 = './scripts/chef-moijto.jpg';
$file8 = './scripts/my-home-1.jpg';
$file9 = './scripts/my-home.jpg';
$file10 = './scripts/my-orders-1.jpg';
$file11 = './scripts/my-orders.jpg';
$file12 = './scripts/my-playlist-1.jpg';
$file13 = './scripts/my-playlist.jpg';

$newfile = './repo/FreeWebsiteTemplate/public_html/img/bca-open.jpg';
$newfile1 = './repo/FreeWebsiteTemplate/public_html/img/bca.jpg';
$newfile2 = './repo/FreeWebsiteTemplate/public_html/img/chef-livre1-open.jpg';
$newfile3 = './repo/FreeWebsiteTemplate/public_html/img/chef-livre1.jpg';
$newfile4 = './repo/FreeWebsiteTemplate/public_html/img/chef-livre2-open.jpg';
$newfile5 = './repo/FreeWebsiteTemplate/public_html/img/chef-livre2.jpg';
$newfile6 = './repo/FreeWebsiteTemplate/public_html/img/chef-moijto-open.jpg';
$newfile7 = './repo/FreeWebsiteTemplate/public_html/img/chef-moijto.jpg';
$newfile8 = './repo/FreeWebsiteTemplate/public_html/img/my-home-1.jpg';
$newfile9 = './repo/FreeWebsiteTemplate/public_html/img/my-home.jpg';
$newfile10 = './repo/FreeWebsiteTemplate/public_html/img/my-orders-1.jpg';
$newfile11 = './repo/FreeWebsiteTemplate/public_html/img/my-orders.jpg';
$newfile12 = './repo/FreeWebsiteTemplate/public_html/img/my-playlist-1.jpg';
$newfile13 = './repo/FreeWebsiteTemplate/public_html/img/my-playlist.jpg';



    echo '<br />';
    echo 'Copying file - ';


    if (!copy($file, $newfile)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file1, $newfile1)) {
        http_response_code(500);
        die('Err : Copy1 impossible!');
    }
    if (!copy($file2, $newfile2)) {
        http_response_code(500);
        die('Err : Copy2 impossible!');
    }
    if (!copy($file3, $newfile3)) {
        http_response_code(500);
        die('Err : Copy3 impossible!');
    }
    if (!copy($file4, $newfile4)) {
        http_response_code(500);
        die('Err : Copy4 impossible!');
    }
    if (!copy($file5, $newfile5)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file6, $newfile6)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file7, $newfile7)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file8, $newfile8)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file, $newfile)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file9, $newfile9)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file10, $newfile10)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file11, $newfile11)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file12, $newfile12)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    if (!copy($file13, $newfile13)) {
        http_response_code(500);
        die('Err : Copy impossible!');
    }
    echo "Ok";



?>