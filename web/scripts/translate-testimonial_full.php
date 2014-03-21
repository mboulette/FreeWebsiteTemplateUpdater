<?php
$patch_name = 'Modification de traduction sur testimonial_full.php';

echo 'Modification de traduction sur Main.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/testimonial_full.php';

$string1 = '<?php
if (substr($_SESSION[\'internal\'][\'locale\']->getAbbr(), 0, 2)==\'en\') {
    echo \'<p class="disclaimers" style="font-size: 90%; font-style: italic;">*Results while following the Ideal Protein Weight Loss Method may vary</p>\';
} else {
    echo \'<p class="disclaimers" style="font-size: 90%; font-style: italic;">* Les résultats en suivant la méthode de perte de poids Ideal Protein peuvent varier.</p>\';
}
?>';
$replace1 = '   <p class="disclaimers" style="font-size: 90%; font-style: italic;"><?php echo Helper_Trans::translate(\'Page\', \'*Results while following the Ideal Protein Weight Loss Method may vary\'); ?></p>';



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