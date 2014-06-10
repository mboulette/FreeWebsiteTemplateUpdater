<?php
$patch_name = 'Changer le titre du widget pour qu\'il soit en lien avec le nom de la page';

echo 'Modification de conference.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/conference_home.php';
$string1 = "<?php echo Helper_Trans::translate('Page', 'Conferences'); ?>";
$replace1 = '<?php echo $CONFERENCE->getPageName(); ?>';

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