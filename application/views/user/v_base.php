<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$title?></title>
    <link rel="shortcut icon" href="/media/images/favicon.ico" type="image/x-icon"/>
    <meta name="description" content="<?=$description?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css"/>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/dimmer.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/modal.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/checkbox.js"></script>

    <?foreach ($styles as $file_style):?>
        <?=HTML::style($file_style)?>
    <?endforeach?>
    <?foreach ($scripts as $file_script):?>
        <?=HTML::script($file_script)?>
    <?endforeach?>
</head>
        
<body>
<!--[if lte IE 8]><script src="http://phpbbex.com/oldies/oldies.js" charset="utf-8"></script><![endif]-->
<div class="wrapper">
    <div class="container">
        <div class="header-wrapper">
            <div class="header">
                <div class="logo">
                    <a href="/"><img src="/media/images/qtylogo.png" width="154" height="36" alt="qualitesty" title="qualitesty.com"/></a>
                </div>
                <div class="horiz-menu">
                    <?=$horizMenu?>
                </div>
                <div class="auth-block"><?=$authBlock?></div>
                <!--
                <a href="<?php echo URL::site('/login'); ?>">LOGIN</a> / <a href="<?php echo URL::site('/register'); ?>">REGISTER</a>
                -->
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content" id="content"><?=$content?></div>
        </div>
        <div class="hfooter"></div>
    </div>
    <div class="footer-wrap">



        <div class="footer"><span class="left">© Сиротина И.К., <?php echo Date::copy(2013);?><?php echo '—';?><?php echo Date::copy();?></span></div>

    </div>
    <!--templates-->
    <script type="text/html" id="item_tmpl">
	<div id="<%=id%>" class="qlty-modal-holder">
	    <div class="qlty-modal-dim">
		<div class="qlty-modal">
		    <h3 class="qlty-modal-header">
			<a href="javascript:;" class="qlty-close" title="Закрыть"><i class="remove icon"></i></a>
			<%=title%>
		    </h3>
		    <div class="content"><%=body%></div>
		    <div class="qlty-modal-buttons">
			<% for (var i = 0; i< buttons.length; i++){ %>
			    <input type="button" id="<%=buttons[i].id%>" class="ui button" value="<%=buttons[i].value%>" />
			<% } %>
		    </div>
		</div>
	    </div>
	</div>
    </script>
</div>
</body>
</html>
