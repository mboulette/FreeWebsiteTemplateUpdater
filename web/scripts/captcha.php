<?php
$patch_name = 'Ajouter un captcha au formulaire de contact';


echo '<br />';
echo 'Modification de cl_nous-joindre.php<br />';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';
$result = 0;
if (file_exists($fileToPatch)) {

    $lines = file($fileToPatch);

    foreach ($lines as $line_num => $line) {
        if(strpos($line, 'if ($SUCCESS != false)') !== false){
            echo 'Retire la ligne SUCCESS<br />';
            $lines[$line_num] = '';
            $result++;
        }

        if(strpos($line, '$PAGE->getH1Title();') !== false){
            echo 'Remplace le getH1Title<br />';
            $lines[$line_num] = str_replace('$PAGE->getH1Title();', '$H1TITLE;', $lines[$line_num]);
            $result++;
        }

        if(strpos($line, 'height:"550px"') !== false){
            echo 'Remplace le height<br />';
            $lines[$line_num] = str_replace('height:"550px"', 'height:"675px"', $lines[$line_num]);
            $result++;
        }

    }

    if ($result == 3) {

        try {
            $content = implode('', $lines);
            file_put_contents($fileToPatch, $content);

        } catch (Exception $e) {
            http_response_code(500);
            die('Err : '.$e->getMessage());
        }

        echo 'Ok';
    } else {
        http_response_code(500);
        die('Err : Some String not found!');
    }

} else {
    http_response_code(500);
    die('Err : File not found!');
}
?>