<?php
$patch_name = 'Créer les fichiers de metadata';

echo 'Copier les fichiers de metadata - ';

echo $_POST['branch'];

$new_folder = realpath(dirname(__file__).'/../repo/FreeWebsiteTemplate').'/metadata';
if (!file_exists($new_folder)) mkdir($new_folder);

$src = dirname(__file__).'/metadata/'.$_POST['branch'];

file_put_contents($src.'/config.json', jsonpp(file_get_contents($src.'/config.json')));




$dir = opendir($src); 
while(false !== ($file = readdir($dir))) { 
    if (( $file != '.' ) && ( $file != '..' )) { 
        copy($src.'/'.$file, $new_folder.'/'.$file);
    }
}
closedir($dir);


/**
 * jsonpp - Pretty print JSON data
 *
 * In versions of PHP < 5.4.x, the json_encode() function does not yet provide a
 * pretty-print option. In lieu of forgoing the feature, an additional call can
 * be made to this function, passing in JSON text, and (optionally) a string to
 * be used for indentation.
 *
 * @param string $json  The JSON data, pre-encoded
 * @param string $istr  The indentation string
 *
 * @link https://github.com/ryanuber/projects/blob/master/PHP/JSON/jsonpp.php
 *
 * @return string
 */
function jsonpp($json, $istr="   ")
{
    $result = '';
    for($p=$q=$i=0; isset($json[$p]); $p++)
    {
        $json[$p] == '"' && ($p>0?$json[$p-1]:'') != '\\' && $q=!$q;
        if(!$q && strchr(" \t\n", $json[$p])){continue;}
        if(strchr('}]', $json[$p]) && !$q && $i--)
        {
            strchr('{[', $json[$p-1]) || $result .= "\n".str_repeat($istr, $i);
        }
        $result .= $json[$p];
        if(strchr(',{[', $json[$p]) && !$q)
        {
            $i += strchr('{[', $json[$p])===FALSE?0:1;
            strchr('}]', $json[$p+1]) || $result .= "\n".str_repeat($istr, $i);
        }
    }
    return $result;
}