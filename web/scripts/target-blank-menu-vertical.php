<?php
$patch_name = 'Corriger les liens externes des menus verticales';

echo 'Modification de menu_ProductVertical.php - ';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/View/Menu/menu_ProductVertical.php';
$str_start = "case 'system':";
$str_end = "case 'custommenu':";

$replace = 'case \'system\':
            $target = isset($elem[\'attr\'][\'target\']) ? $elem[\'attr\'][\'target\'] : \'_self\';
            $class = empty($elem[\'attr\'][\'page_custom_field3\']) ? \'\' : \' class="\' . $elem[\'attr\'][\'page_custom_field3\'] . \'"\';
            $url = $elem[\'attr\'][\'url_page_url\'];
            if(isset($elem["sub_menu"])){
                echo "\n".$indent2.\'<a class="sAccordion-open" href="#">\'.$title.\'</a>\';
            }
            else{
                echo "\n".$indent2."<a href=\"{$url}\"{$class} target=\'{$target}\'>{$title}</a>";
            }
            break;
        ';

if (file_exists($fileToPatch)) {

    $content = file_get_contents($fileToPatch);

    if(strpos($content, $str_start) === false){
        http_response_code(500);
        die('Err : str_start not found!');
    }

    if(strpos($content, $str_end) === false){
        http_response_code(500);
        die('Err : str_end not found!');
    }

    $pos_start = strpos($content, $str_start);
    $pos_end = strpos($content, $str_end);
    $str_to_replace = substr($content, $pos_start, $pos_end-$pos_start);

    $content = str_replace($str_to_replace, $replace, $content);

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
