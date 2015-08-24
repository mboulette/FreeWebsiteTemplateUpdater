<?php
$patch_name = 'Ajouter un Honeypot dans le formulaire de contact';

echo 'Modification de Basic.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/Layout/Basic.php';
$string1 = 'if ($form->validate()){';
$replace1 = '//Validation du formulaire, et je m\'assure que le Honeypot est vide
        if ($form->validate() && $_POST[\'firstname\'] == \'\'){';

$string2 = '$field = new Core_Form_Field_Captcha(\'captcha\');';
$replace2 = '// Ceci est un honeypot, caché pour les humains, il ne doit pas être rempli sinon c\'est un bot
        $field = new Core_Form_Field_Hidden(\'firstname\');
        $field->label = $trans[\'firstname\'];
        $field->maxlength = 200;
        $form_gr->insert($field);

        $field = new Core_Form_Field_Captcha(\'captcha\');';

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