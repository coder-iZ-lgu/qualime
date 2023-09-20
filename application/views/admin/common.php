<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Админка</title>
    <?php foreach($styles as $style): ?>
        <link href="<?php echo URL::base(); ?>public/css/<?php echo $style; ?>.css"
              rel="stylesheet" type="text/css" />
    <?php endforeach; ?>
    <?php foreach($scripts as $script): ?>
        <script type="text/javascript" src="<?php echo URL::base(); ?>public/js/<?php echo $script; ?>.js"></script>
    <?php endforeach; ?>
</head>

<body class="admin">
<div class="wrapper">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="/"><img src="../media/images/qtylogo.png" width="154" height="36" alt="qualitesty" title="qualitesty.com"/></a>
            </div>
            <div class="qme"></div>
            <div class="horiz-menu">
                <ul>
                    <li><a href="<?php echo URL::site('admin/'); ?>">Главная</a></li>
                    <li><a href="<?php echo URL::site('admin/tests'); ?>">Тесты</a></li>
                    <li><a href="<?php echo URL::site('admin/stats'); ?>">Статистика</a></li>
                    <li><a href="<?php echo URL::site('logout/'); ?>">Log Out</a></li>
                </ul>
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
</div>
</body>
</html>
