<?php

$patch_name = 'Modification du '.date('Y-m-d H:i:s');

$file_path = './repo/TestfreeWebsiteBatch/index.php';


$new_test = 'Mauris ornare lectus eu lacinia pharetra. Duis egestas, nunc sed sollicitudin pretium, metus urna posuere odio, quis vehicula augue enim fermentum diam. Suspendisse condimentum viverra varius. In lectus elit, lobortis sit amet venenatis ut, malesuada sodales massa. Maecenas ut interdum lectus. Praesent nec dolor vitae metus cursus ultrices eget bibendum tellus. Fusce viverra leo eget arcu elementum faucibus. Pellentesque et mauris at metus egestas semper. Curabitur luctus risus ac libero imperdiet facilisis. Nullam et felis eget risus volutpat aliquet. Mauris ac condimentum lacus.';

$file_content = file_get_contents($file_path);
//$file_content = str_replace('$$$$', $new_test, $file_content);

$file_content .= $new_test;

file_put_contents($file_path, $file_content);
?>