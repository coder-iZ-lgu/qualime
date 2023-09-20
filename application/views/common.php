<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php foreach($styles as $style): ?>
        <link href="<?php echo URL::base(); ?>public/css/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" />
    <?php endforeach; ?>

</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div class="wrapper">
    <div class="container">
        <div class="header">
            <div class="horiz-menu">
                <ul>
                    <li><a href="<?php echo URL::site(); ?>">Главная</a></li>
                    <li><a href="<?php echo URL::site('/tests'); ?>">Тесты</a></li>
                    <li><a href="<?php echo URL::site('/help'); ?>">Справка</a></li>
                    <li><a href="<?php echo URL::site('http://quali.me'); ?>">QualiMe</a></li>
                </ul>
            </div>
            <div><?php echo $authBlock; ?></div>
            <!--
            <a href="<?php echo URL::site('/login'); ?>">LOGIN</a> / <a href="<?php echo URL::site('/register'); ?>">REGISTER</a>
            -->
        </div>


        <div class="content"><?php echo $content; ?></div>




        <div class="footer"><span class="left">© Сиротина И.К., <?php echo Date::copy(2013);?><?php echo '—';?><?php echo Date::copy();?></span></div>

   </div>
</div>
</body>
</html>
