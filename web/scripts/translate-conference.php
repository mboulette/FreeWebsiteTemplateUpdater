<?php
$patch_name = 'Modification de traduction sur conference.php';

echo 'Modification de traduction sur conference.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Widget/conference.php';

$string1 = "dgettext('Conference', 'Conferences')";
$replace1 = "Helper_Trans::translate('Page', 'Conferences')";

$string2 = "_('Date :')";
$replace2 = "Helper_Trans::translate('Page', 'Date:')";

$string3 = "_('Hour :')";
$replace3 = "Helper_Trans::translate('Page', 'Hour :')";

$string4 = "_('Address :')";
$replace4 = "Helper_Trans::translate('Page', 'Address:')";

$string5 = "_('Phone :')";
$replace5 = "Helper_Trans::translate('Page', 'Phone:')";

$string6 = "</ul>";
$replace6 = '   <?php if ($CONFERENCE->getFormatedFreeEntrace().$CONFERENCE->getFormatedTasting().$CONFERENCE->getFormatedReservation() != \'\') { ?>
      <li><strong><?php echo Helper_Trans::translate(\'Page\', \'Additionnal informations:\'); ?></strong>
      <?php echo $CONFERENCE->getFormatedFreeEntrace(); ?>
      <?php echo $CONFERENCE->getFormatedTasting(); ?>
      <?php echo $CONFERENCE->getFormatedReservation(); ?>
      </li>
   <?php }?>
</ul>';

$string7 = "_('Location :')";
$replace7 = "Helper_Trans::translate('Page', 'Location:')";

$string8 = "dgettext('Conference', \"View all conference\")";
$replace8 = "Helper_Trans::translate('Page', 'View all conference')";

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

    if(strpos($content, $string4) !== false){
        $content = str_replace($string4, $replace4, $content);
    } else {
        http_response_code(500);
        die('Err : String4 not found!');
    }

    if(strpos($content, $string5) !== false){
        $content = str_replace($string5, $replace5, $content);
    } else {
        http_response_code(500);
        die('Err : String5 not found!');
    }

    if(strpos($content, $string6) !== false){
        $content = str_replace($string6, $replace6, $content);
    } else {
        http_response_code(500);
        die('Err : String6 not found!');
    }

    if(strpos($content, $string7) !== false){
        $content = str_replace($string7, $replace7, $content);
    } else {
        http_response_code(500);
        die('Err : String7 not found!');
    }

    if(strpos($content, $string8) !== false){
        $content = str_replace($string8, $replace8, $content);
    } else {
        http_response_code(500);
        die('Err : String8 not found!');
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