<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(600);

require_once(dirname(__FILE__).'/lib/PHPGit/Repository.php');
require_once(dirname(__FILE__).'/config.php');

$repo = new PHPGit_Repository(REPO_PATH);

$branch_name = $_POST['branch'];

echo 'CHECKOUT - Changer sur la branche «'.$branch_name.'» - ';
echo $repo->git('checkout '.$branch_name).'<br />';

echo 'PULL - Récupérer le code à jour de la branche «'.$branch_name.'» - ';
echo $repo->git('pull').'<br />';

echo 'PATCH - Appliquer les modifications - ';
include(SCRIPT_PATH);
echo '<br />';

echo 'ADD - Préparer les fichiers modifiés - ';
echo $repo->git('add .').'<br />';

echo 'COMMIT - Création du commit - ';
echo $repo->git('commit -m "'.$patch_name.'"').'<br />';

echo 'PUSH - Pousser les modification sur la branche «'.$branch_name.'» - ';
echo $repo->git('push').'<br />';

echo '<br />Modification terminé!';

?>