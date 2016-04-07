<?php
$patch_name = 'AW-342 :: Courriel des Approved Website';

echo 'Modification de Basic.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/Layout/Basic.php';

$string1 = 'Helper_Mail::sendPlainTextMail($_POST[\'email\'], $clinicEmail, $_POST[\'subject\'], $_POST[\'message\']."\n".$siganture);';
$replace1 = 'Helper_Mail::sendHtmlMail(\'noreply@my-idealprotein.com\', $clinicEmail, $_POST[\'subject\'], $msg);';

$string2 = 'if (count($arrContact) > 0){';
$replace2 = '
            if ($_SESSION[INTERNAL][\'locale\']->getAbbr() == \'fr_CA\') {
                $msg = \'
                <p>Bonjour,</p>
                <p>Vous recevez ce courriel d'."\'".'une personne qui a utilisé le formulaire de contact de votre site approuvé Ideal Protein</p>
                <ul>
                    <li><strong>Nom :</strong> \'.$_POST[\'name\'].\'</li>
                    <li><strong>Téléphone :</strong> \'.$_POST[\'phone\'].\'</li>
                    <li><strong>Courriel :</strong> \'.$_POST[\'email\'].\'</li>
                    <li><strong>Message :</strong> \'.$_POST[\'message\'].\'</li>
                </ul>
                \';
            } else {
                $msg = \'
                <p>Hi,</p>
                <p>You are receiving this email as someone used the contact form on your Ideal Protein approved website :</p>
                <ul>
                    <li><strong>Name :</strong> \'.$_POST[\'name\'].\'</li>
                    <li><strong>Phone :</strong> \'.$_POST[\'phone\'].\'</li>
                    <li><strong>Email :</strong> \'.$_POST[\'email\'].\'</li>
                    <li><strong>Message :</strong> \'.$_POST[\'message\'].\'</li>
                </ul>
                \';
            }

            if (count($arrContact) > 0){
';



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