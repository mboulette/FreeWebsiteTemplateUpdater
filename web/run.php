<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(600);

require_once(dirname(__FILE__).'/lib/PHPGit/Repository.php');
require_once(dirname(__FILE__).'/config.php');

try {
    $repo = new PHPGit_Repository(REPO_PATH);
    $branch_name = $_POST['branch'];

    echo 'CHECKOUT - Changer sur la branche «'.$branch_name.'» - ';
    echo $repo->git('checkout '.$branch_name).'<br />';

    echo 'PULL - Récupérer le code à jour de la branche «'.$branch_name.'» - ';
    echo $repo->git('pull').'<br />';

} catch (Exception $e) {
        http_response_code(500);
        die('Err : '.$e->getMessage());
}

echo 'PATCH - Appliquer les modifications - ';
include(SCRIPT_PATH);
echo '<br />';

sleep(1); // Use at 5 only to patch scss

try {
    echo 'ADD - Préparer les fichiers modifiés - ';
    echo $repo->git('add .').'<br />';

    echo 'COMMIT - Création du commit - ';
    echo $repo->git('commit -m "'.$patch_name.'"').'<br />';

    echo 'PUSH - Pousser les modification sur la branche «'.$branch_name.'» - ';
    echo $repo->git('push').'<br />';

    echo '<br />Modification terminé!';

} catch (Exception $e) {
        http_response_code(500);
        die('Err : '.$e->getMessage());
}


?>