<?php
$patch_name = 'Permettre la 2nd Location';

echo 'Modification de cl_nous-joindre.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Content/cl_nous-joindre.php';
$string1 = '//Display phone list';
$replace1 = '
                    if ($SEC_ADDRESS != \'\') {
                        echo \'<h2>\'.gettext(\'Other location\').\'</h2>\';
                        echo nl2br($SEC_ADDRESS);
                        echo \'<br>\';
                    }

                    //Display phone list
';

$string2 = 'initialiser(<'.'?php echo $LONGITUDE;?'.'>, <'.'?php echo $LATITUDE;?'.'>);';
$replace2 = '<'.'?php if ($SEC_LATITUDE != \'0\' AND $SEC_LATITUDE != \'\') { ?'.'>
                            loadMapMulti([<'.'?php echo $LATITUDE;?'.'>, <'.'?php echo $LONGITUDE;?'.'>], [<'.'?php echo $SEC_LATITUDE;?'.'>, <'.'?php echo $SEC_LONGITUDE;?'.'>]);
                        <'.'?php } else { ?'.'>
                            initialiser(<'.'?php echo $LONGITUDE;?'.'>, <'.'?php echo $LATITUDE;?'.'>);
                        <'.'?php } ?'.'>
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