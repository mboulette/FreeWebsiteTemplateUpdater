<?php
$patch_name = 'Modification de traduction sur testimonial.php';

echo 'Modification de traduction sur testimonial.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/testimonial.php';

$string1 = '<?php echo dgettext(\'Testimonials\', \'Testimonials\'); ?>';
$replace1 = "<?php echo Helper_Trans::translate('Page', 'Testimonials'); ?>";

$string2 = '<?php if (substr($_SESSION[\'internal\'][\'locale\']->getAbbr(), 0, 2)) { echo \'<p class="disclaimers" style="font-size: 90%; margin-top: 7px; font-style: italic;">*Individual results may vary</p>\'; } else { echo \'<p class="disclaimers" style="font-size: 90%; margin-top: 7px; font-style: italic;">* Les résultats individuels peuvent varier</p>\'; } ?>';
$replace2 = "<p class=\"disclaimers\" style=\"font-size: 90%; margin-top: 7px; font-style: italic;\"><?php echo Helper_Trans::translate('Page', '*Individual results may vary'); ?></p>";

$string3 = 'dgettext(\'Testimonial\', "View all testimonials")';
$replace3 = "Helper_Trans::translate('Page', 'View all testimonials')";


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

    if(strpos($content, $string3) !== false){
        $content = str_replace($string3, $replace3, $content);
    } else {
        http_response_code(500);
        die('Err : String3 not found!');
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