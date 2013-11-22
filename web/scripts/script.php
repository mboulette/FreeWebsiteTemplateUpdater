<?php
$patch_name = 'Ajouter un formulaire de contact';


echo '<br />';
echo 'Modification de idealtechnology.scss - ';

$fileToPatch = './repo/FreeWebsiteTemplate/public_html/scss/idealtechnology.scss';
$fileCss = './scripts/idealtechnology.upd.scss';
$result = false;
if (file_exists($fileToPatch)) {


    $lines = file($fileToPatch);

    foreach ($lines as $line_num => $line) {
        if($line == ".contactus{\n" || $line == ".contactus {\n"){
            try {
                $replacement = file_get_contents($fileCss);
                $lines[$line_num] .= $replacement;
                $content = implode('', $lines);

                file_put_contents($fileToPatch, $content);

            } catch (Exception $e) {
                http_response_code(500);
                die('Err : '.$e->getMessage());
            }

            $result = true;
            break;
        }
    }
    if ($result) {
        echo 'Ok';
    } else {
        http_response_code(500);
        die('Err : String not found!');
    }
} else {
    http_response_code(500);
    die('Err : File not found!');
}



echo 'Correction de ml_default.php - ';
$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Structure/ml_default.php';
$fileHead = './scripts/ml_default.upd.php';
if (file_exists($fileToPatch)) {

    try {
        $replacement = file_get_contents($fileHead);
    } catch (Exception $e) {

        http_response_code(500);
        die('Err replacement: '.$e->getMessage());
    }

    if ($replacement != ''){
        try {

            $string = file_get_contents($fileToPatch);
            $pattern = '~<head>(.|\n)+</head>~i';

            $result = preg_replace($pattern, $replacement, $string);
            file_put_contents($fileToPatch, $result);

        } catch (Exception $e) {
            http_response_code(500);
            die('Err : '.$e->getMessage());
        }
    } else {

        http_response_code(500);
        die('Err : Replacement empty!');

    }

    echo 'Ok';

} else {

        http_response_code(500);
        die('Err : File not found!');

}



echo '<br />';
echo 'Modification de cl_nous-joindre.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';
$fileForm = './scripts/cl_nous-joindre.upd.php';
$result = false;
if (file_exists($fileToPatch)) {


    $lines = file($fileToPatch);

    foreach ($lines as $line_num => $line) {
        if(strpos($line, '</section>') !== false){

            if ( strpos($lines[$line_num-1], '    ?>') != false){

                try {
                    $replacement = file_get_contents($fileForm);
                    $lines[$line_num-1] .= $replacement;
                    $content = implode('', $lines);

                    file_put_contents($fileToPatch, $content);

                } catch (Exception $e) {
                    http_response_code(500);
                    die('Err : '.$e->getMessage());
                }

                $result = true;
                break;


            } else {
                http_response_code(500);
                die('Err : Wrong line to replace!');
            }
        }
    }

    if ($result) {
        echo 'Ok';
    } else {
        http_response_code(500);
        die('Err : String not found!');
    }

} else {
    http_response_code(500);
    die('Err : File not found!');
}
?>