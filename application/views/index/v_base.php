<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1">
    
    <title><?=$title?></title>
    <link rel="shortcut icon" href="/media/images/favicon.ico" type="image/x-icon"/>
    <meta name="theme-color" content="#0d0d1b">
    <meta property="og:image" content="http://lib.quali.me/img/qmemml.png">
    <script type="text/javascript" src="https://vk.com/js/api/share.js?93" charset="windows-1251"></script>
    <meta name="description" content="<?=$description?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css"/>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/dimmer.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/modal.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/checkbox.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-MML-AM_CHTML">
    </script>

    <script>
        jQuery(function ($) {
            $('.hui.modal').modal('attach events', '#check-button', 'show');
            $('.test.modal').modal('attach events', '.test.button', 'show');

            $('.ui.accordion').accordion();
            $('.ui.sidebar').sidebar('attach events', '.toc.item');
            $('.ui.sidebar').sidebar('attach events', '.sidebar.menu .item');
            $('.dropdown').dropdown();

            $('.ui.dimmer').dimmer('show');
            MathJax.Hub.Queue(function () {
                $('.ui.dimmer').dimmer('hide');
                $('.mjx-chtml').removeClass('MJXc-display');
            });
			
			$('.message .close').on('click', function() {$(this).closest('.message').transition('fade');});
        });
    </script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(91484192, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/91484192" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus+Slab" type="text/css">

    <?foreach ($styles as $file_style):?>
        <?=HTML::style($file_style)?>
    <?endforeach?>
    <?foreach ($scripts as $file_script):?>
        <?=HTML::script($file_script)?>
    <?endforeach?>
</head>
<?$string1 = URL::site(Request::detect_uri());?>
<?if (preg_match('/school/', $string1) ):?>
    <body class="qtst sch">
<?elseif (preg_match('/university/', $string1)):?>
    <body class="qtst uni">
        <!-- ИЗМЕНЕНИЯ IQ -->
<?elseif (preg_match('/iq/', $string1)):?>
    <body class="qtst uni">
        <!-- ИЗМЕНЕНИЯ IQ -->
<?elseif (($string1 == "/")):?>
    <body class="qtst home">
<?elseif (($string1 == "/login") || ($string1 == "/register")):?>
    <body class="qtst login">
<?else:?>
    <body class="qtst std">
<?endif;?>

<!--[if lte IE 8]><script src="http://phpbbex.com/oldies/oldies.js" charset="utf-8"></script><![endif]-->
<div class="ui dimmer">
    <div class="ui medium text loader">Загрузка</div>
</div>
<div class="ui vertical inverted sidebar menu right">
    <?=$horizMenu?>
    <?=$authBlock?>
</div>
<div class="pusher">
	
	

    <div class="ui inverted vertical center aligned segment qtst-mn">
        <div class="ui container" style="margin: 0 auto !important; ,">
            <div class="ui inverted menu m" style="margin-bottom: 0;">
                <a href="/" class="item active" style="float: left;">
                    <img src="/media/images/logo.png">
                </a>
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
            </div>
            <div class="ui inverted menu d" style="margin-top: 0;">
                <?=$horizMenu?>
                <div class="right item">
                    <?=$authBlock?>
                </div>
                <!--
                <a href="<?php echo URL::site('/login'); ?>">LOGIN</a> / <a href="<?php echo URL::site('/register'); ?>">REGISTER</a>
                -->
            </div>
        </div>
    </div>
    <!--------------------------------------------------->
    <? if (($string1 == "/tests") ): ?>
        <?=$content?>
    <? else: ?>
    <div class="lui ui masthead segment">
        <? if (($string1 == "/") ): ?>
            <?=$content?>
        <? else: ?>
            <div class="ui main container">
                <div class="content" id="content"><?=$content?></div>
            </div>
        <? endif; ?>
    </div>
    <? endif; ?>
    <!------------------------------------------------------------------------------>

    <div class="ui inverted segment footer">
        <div class="ui container">
            <span class="left">© Сиротина И.К., <?php echo Date::copy(2013);?><?php echo '—';?><?php echo Date::copy();?></span>
        </div>
    </div>

    <script type="text/html" id="item_tmpl">
        <div id="<%=id%>" class="qlty-modal-holder">
            <div class="qlty-modal-dim">
                <div class="qlty-modal">
                    <div class="qlty-modal-wrapper ui modal" style="display: block !important;">
                        <div class="qlty-modal-header header"><a href="javascript:;" class="qlty-close" title="Закрыть"><i class="remove link icon"></i></a><%=title%></div>
                        <div class="qlty-modal-body content"><%=body%></div>
                        <div class="qlty-modal-buttons actions">
                            <% for (var i = 0; i< buttons.length; i++){ %>
                            <input type="button" id="<%=buttons[i].id%>" class="ui button yellow" value="<%=buttons[i].value%>" />
                            <% } %>
                        </div>
                    </div>
                    <div class="qlty-modal-nothing"></div>
                </div>
            </div>
        </div>
    </script>

</div>

<?php //include_once("analyticstracking.php") ?>

<?php $base_url = URL::site(NULL, TRUE); ?>

</body>
</html>
