<head>
    <title><?php echo $WINDOW_TITLE; ?></title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo ($HEADER_META_DESCRIPTION != '') ? $HEADER_META_DESCRIPTION : 'Ideal Protein is a line of protein diet products. Ideal Protein est une gamme de produits pour r&eacute;gime d\'&eacute;pargne prot&eacute;in&eacute;.'?>">
    <meta name="robots" content= "index, follow" />
    <meta name="author" content="idealprotein.com" />
    <meta name="generator" content="Ideal CMS" />
    <?php
    //Ajouter les meta dynamiques
    if (isset($ARR_META)) foreach($ARR_META as $meta) echo '<meta name="'.$meta['name'].'" content="'.$meta['value'].'" />'."\n";
    ?>

    <base href="<?php echo SITE_ROOT;?>" />

    <?php /*##   CSS       #######################################################################*/?>
    <?php
    //Ajouter les dépendances CSS dynamiques
    if(isset($ARR_CSS)) foreach($ARR_CSS as $src) echo '<link rel="stylesheet" href="'.((substr($src, 0, 4) == 'http') ? : ('css/')).$src.'" />'."\n";
    ?>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" media="all" href="css/idealtechnology.css" />
    <link rel="stylesheet" type="text/css" media="all" href="colorbox/colorbox.css" />
    <link rel="alternate" href="<?php echo Helper_Url::buildUrl('Conference_rss'); ?>" title="Conferences" type="application/rss+xml" />
    <link rel="alternate" href="<?php echo Helper_Url::buildUrl('Testimonial_rss'); ?>" title="Testimonial" type="application/rss+xml" />
    <link rel="alternate" href="<?php echo Helper_Url::buildUrl('ItMedia_rss'); ?>" title="Media" type="application/rss+xml" />

    <?php if (defined('GOOGLE_ANALYTICS_KEY') && GOOGLE_ANALYTICS_KEY != '' && GOOGLE_ANALYTICS_KEY != NULL) { ?>
     <script type="text/javascript">

       var _gaq = _gaq || [];
       _gaq.push(['_setAccount', '<?php echo GOOGLE_ANALYTICS_KEY; ?>']);
       _gaq.push(['_setDomainName', 'none']);
       _gaq.push(['_setAllowLinker', true]);
       _gaq.push(['_trackPageview']);

       (function() {
         var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
         var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
       })();

     </script>
    <?php } ?>

    <?php /*##   JS       #######################################################################*/?>
    <script src="http://www.google.com/jsapi?key=ABQIAAAAiFeqNGC3wATjiTET9EcvoBT9nhQPNEkYwQzxaRKy5CxRIo-G2RTMr8O4469CoWUJiPmXt0J0RO0Nbw" type="text/javascript"></script>
    <script type="text/javascript">
            google.load("jquery", "1.6.1");
            google.load("jqueryui", "1.8.13");
    </script>
    <script src="colorbox/jquery.colorbox-min.js"></script>
    <script src="js/wt_scripts.js"></script>
    <script src="js/st_accordeon.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <?php
    //Ajouter les dépendances JS dynamiques
    if(isset($ARR_JS)) foreach($ARR_JS as $src) echo '<script src="'.((substr($src, 0, 4) == 'http') ? : ('js/')).$src.'"></script>'."\n";
    ?>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
    <script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
    <![endif]-->

</head>