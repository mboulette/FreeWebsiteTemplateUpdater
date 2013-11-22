                    <div style='display:none'>
                        <div id='inline_content' style='padding:10px; background:#fff;'>
                            <?php
                            echo '<h2>'.gettext('Contact Form').'</h2>';
                            if ($SUCCESS != false) echo '<div class="success">'.gettext('Your message has been sent, thank you for your interest').'</div>';
                            echo $FORM;
                            ?>
                        </div>
                    </div>
                    <div>
                        <a class="inline gallery cboxElement lien-sidebar" href="#inline_content" ><?php echo gettext('Contact Form'); ?></a>
                    </div>
                    <script>
                        jQuery('a.gallery').colorbox({inline:true, width:"550px", height:"550px", opacity:"0.6"});
                    </script>
