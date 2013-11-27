<?php
header('Content-Type: text/html; charset=utf-8');
set_time_limit(600);

require_once(dirname(__FILE__).'/lib/PHPGit/Repository.php');
require_once(dirname(__FILE__).'/config.php');

$repo = new PHPGit_Repository(REPO_PATH);
$repo->git('git fetch -p');
$branches = $repo->git('branch -a');

$branches = explode("\n", $branches);

?>
<!doctype html>
<html>

<head>
<title>Système pour appliquer une patch à plusieurs templates (branches)</title>
<link rel="stylesheet" type="text/css" href="css/run.css" />

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.min.js"></script>
<script src="js/run.js"></script>

</head>

<body>
<h2>Approuved Website</h2>
<h3>Système pour appliquer une patch à plusieurs templates (branches)</h3>

<?php
echo '
<strong>Repo :</strong> '.REPO_PATH.'<br />
<strong>Patch :</strong> '.SCRIPT_PATH.'<br /><br>
Cocher les branches sur lesquels il faut appliquer la patch.<br /><br />
';

echo '<form>';
echo '
<table cellpadding="2" cellspacing="0" border="1" style="border-collapse:collapse; margin-left:110px;">
    <tr>
        <th width="30">&nbsp;</th>
        <th width="250">Nom des branches</th>
        <th width="50">Aperçu</th>
        <th width="600">Résultats</th>
    </tr>

';
$key = 0;
foreach ($branches as $branche) {

    $branche = pathinfo($branche);

    if ($branche['dirname'] != '.') {

        $branche_name = explode('-', $branche['basename']);

        $checked = '';
        if (isset($_POST['branche'])) {
            if (in_array($branche['basename'], $_POST['branche'])) $checked = 'checked="checked"';
        }
        echo '
        <tr>
            <td align="center"><input type="checkbox" id="branche_'.$key.'" name="branche" value="'.$branche['basename'].'" '.$checked.' data-id="'.$key.'" /></td>
            <td><label for="branche_'.$key.'">'.$branche['basename'].'</label></td>
        ';
        if (count($branche_name) > 1) {
            echo '
            <td style="position:relative;">
                <img class="branche_thumb" width="16" border="1" src="http://www.idealtechnology.net/templates/'.$branche_name[0].'/'.$branche_name[1].'/thumb.jpg" />
            </td>
            ';
        } else {
            echo '<td>None</td>';
        }
        echo '
            <td class="result" id="result_'.$key.'">
                <i>+</i>
                <span>&nbsp;</span>
                <div class="msg">&nbsp;</div>
            </td>
        </tr>
        ';

        $key++;
    }
}
echo '</table>';
echo '</form>';
?>
<div style="position:fixed; top:200px; left:10px; width:100px; border:1px solid #666666; border-radius: 10px; background-color:#999999; padding:20px 0 20px 0;" align="center">
    <button id='btn_reset'        class='btn'>Reset</button>
    <button id='btn_cancel'       class='btn'>Cancel</button>
    <button id='btn_select_all'   class='btn'>Select All</button>
    <button id='btn_unselect_all' class='btn'>Unselect All</button>
    <button id='btn_next'         class='btn'>Next 10</button>
    <button id='btn_run'          class='btn'>Patch !</button>
</div>

</body>
</html>