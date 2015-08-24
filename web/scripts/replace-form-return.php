<?php
$patch_name = 'Ajouter un message Feedback dans le fomrulaire de contact us';

echo '<br />';
echo 'Modification du fichier Basic.php';

$fileToPatch = './repo/FreeWebsiteTemplate/framework/lib/module/Page/src/Layout/Basic.php';
$string1 = '        $tpl->set(\'CONTACT_FORM\', $this->getForm()->show());';
$replace1 = '
        $form = $this->getForm();
        if (isset($_POST["flag"])) {
            if(!$this->sendMessage($form)){
                $msg = \'
                <div class="form-msg" style="position: fixed; top:100px; width:60%; left: 50%;">
                    <div style="position: relative; left: -50%; padding:10px; border: 2px solid red; background-color:#FE8D96; color:#000;">
                        \'.Helper_Trans::translate("Page", "Sorry, your message has not been sent, the form has some errors.").\'
                        <a href="javascript:$('."\'".'.form-msg'."\'".').hide();" style="position:absolute; top:0px; right:5px; font-weight:bold; color:#000; text-decoration:none;">x</a>
                    </div>
                </div>
                \';

            } else {
                $msg = \'
                <div class="form-msg" style="position: fixed; top:100px; width:60%; left: 50%;">
                    <div style="position: relative; left: -50%; padding:10px; border: 2px solid #2EB82E; background-color:#99FF66; color:#000;">
                        \'.Helper_Trans::translate("Page", "Thank you for your participation, your message was sent to one of our coach.").\'
                        <a href="javascript:$('."\'".'.form-msg'."\'".').hide();" style="position:absolute; top:0px; right:5px; font-weight:bold; color:#000; text-decoration:none;">x</a>
                    </div>
                </div>
                \';
            }
            $this->_siteMain .= $msg;
        }
        $tpl->set(\'CONTACT_FORM\', $form->show());
';

if (file_exists($fileToPatch)) {

    $content = file_get_contents($fileToPatch);

    if(strpos($content, $string1) !== false){
        $content = str_replace($string1, $replace1, $content);
    } else {
        http_response_code(500);
        die('Err : String1 not found!');
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