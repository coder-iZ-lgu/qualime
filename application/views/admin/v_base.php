<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=$title?></title>
    <link rel="shortcut icon" href="/media/images/favicon.ico" type="image/x-icon"/>
    <meta name="theme-color" content="#0d0d1b">
    <meta property="og:image" content="http://lib.quali.me/img/qsm.png"/>
    <meta name="description" content="<?=$description?>" />

    <script type="text/x-mathjax-config">MathJax.Hub.Config({ TeX: { extensions: ["action.js"] }});</script>
    <script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_HTMLorMML"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css"/>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/dimmer.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/modal.js"></script>
    <script src="https://lib.quali.me/semantic/dist/components/checkbox.js"></script>

    <script>
        jQuery(function ($) {
            $('.test.modal').modal('attach events', '.test.button', 'show');
            $('.ui.accordion').accordion();
            $('.ui.sidebar').sidebar('attach events', '.toc.item');
            $('.ui.sidebar').sidebar('attach events', '.sidebar.menu .item');
            $('.dropdown').dropdown();

            $('.ui.dimmer').dimmer('show');
            MathJax.Hub.Queue(function () {
                $('.ui.dimmer').dimmer('hide');
            });
        });

    </script>

    <style>
        @import 'https://fonts.googleapis.com/css?family=PT+Mono';
    </style>

    <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

    <?foreach ($styles as $file_style):?>
        <?=HTML::style($file_style)?>
    <?endforeach?>
    <?foreach ($scripts as $file_script):?>
        <?=HTML::script($file_script)?>
    <?endforeach?>
</head>

<?$string1 = URL::site(Request::detect_uri());?>
<?if ($string1=="/admin"):?>
<body class="qtst admin nest">
<?else:?>
<body class="qtst admin tests">
<?endif;?>
<div class="ui vertical inverted sidebar menu right">
    <?=$horizMenu?>
    <?=$authBlock?>
</div>
<div class="pusher">
    <div class="ui inverted vertical center aligned segment qtst-mn">
        <div class="ui container" style="margin: 0 auto !important;">
            <div class="ui inverted menu m" style="margin-bottom: 0; ">
                <a href="/" class="item active" style="float: left;">
                    <img src="http://lib.quali.me/img/qsm.png">
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
    <div class="lui ui masthead segment">
        <div class="ui main container">
            <div class="content" id="content"><?=$content?></div>
        </div>
    </div>
</div>
<div class="footer-wrap">
    <div class="footer"><span class="left">© Сиротина И.К., <?php echo Date::copy(2013);?><?php echo '—';?><?php echo Date::copy();?></span></div>
</div>

<!--templates-->
<script type="text/html" id="item_tmpl">
    <div id="<%=id%>" class="qlty-modal-holder">
        <div class="qlty-modal-dim">
            <div class="qlty-modal">
                <div class="qlty-modal-wrapper ui long scrolling modal" style="display: block !important;">
                    <div class="qlty-modal-header header"><a href="javascript:;" class="qlty-close" title="Закрыть"><i class="remove link icon"></i></a><%=title%></div>
                    <div class="qlty-modal-body content"><%=body%></div>
                    <div class="qlty-modal-buttons actions">
                        <% for (var i = 0; i< buttons.length; i++){ %>
                        <input type="button" id="<%=buttons[i].id%>" class="ui button <%=buttons[i].class%>" value="<%=buttons[i].value%>" />
                        <% } %>
                    </div>
                </div>
                <div class="qlty-modal-nothing"></div>
            </div>
        </div>
    </div>
</script>
<script type="text/html" id="tabs_template">
    <div class="c">
    <div id="task-<%=task.id%>" class="ui four item stackable tabs menu tab-set def-list-styles" data-qlty-task="<%=task.id%>">
        <a href="javascript:;" id="tab-main" class="item active" data-qlty-text="main">Задание</a>
        <a href="javascript:;" id="tab-actualization" class="item" data-qlty-text="actualization">Актуализация знаний</a>
        <a href="javascript:;" id="tab-solution" class="item" data-qlty-text="solution">Решение</a>
        <a href="javascript:;" id="tab-attention" class="item" data-qlty-text="attention">Обратите внимание</a>
    </div>
    <div class="tab-content-wrapper" style="margin: 20px !important;">
        <div id="tab-main-<%=task.id%>" class="tab-content active"><textarea id="main-text-editor" class="mth" onkeyup="Preview.Update()" style="width: 100%;" cols="45" rows="8"><%=task.main_text%></textarea></div>
        <div id="tab-actualization-<%=task.id%>" class="tab-content"><textarea id="actualization-text-editor" onkeyup="Preview.Update()" class="mth" style="width: 100%;" cols="45" rows="8"><%=task.actualization_text%></textarea></div>
        <div id="tab-solution-<%=task.id%>" class="tab-content"><textarea id="solution-text-editor" class="mth" onkeyup="Preview.Update()" style="width: 100%;" cols="45" rows="8"><%=task.solution_text%></textarea></div>
        <div id="tab-attention-<%=task.id%>" class="tab-content"><textarea id="attention-text-editor" class="mth" onkeyup="Preview.Update()" style="width: 100%;" cols="45" rows="8"><%=task.attention_text%></textarea></div>
    </div>
    </div>
    <div class="qlty-modal-additional">
        <div class="ui form">
            <div class="field">
                <label for="task-type">Тип задания</label>
                <select id="task-type" class="ui dropdown" name="select-type">
                    <% for (var i = 0; i < task_types.length; i++) {%>
                    <option value="<%=task_types[i].id%>" <% if (task.type == i+1) { %> selected <%}%>><%=task_types[i].short_name%></option>
                    <% } %>
                </select>
            </div>
        </div>
        <div class="task-option-header">
            <h4 class="ui horizontal divider header">
                <i class="empty star icon"></i>Варианты ответов
            </h4>
            <a class="circular ui icon button blue task-option-add" title="Добавить вариант ответа" href="javascript:;"><i class="plus large icon"></i></a>
        </div>
        <ul id="task-options" class="task-options">
            <% for (var i = 0; i< options.length; i++){ %>
            <li>
                <div class="option-toolbar">
                    <div class="option-input">
                        <% if (task.type === "1"){ %>
                        <input type="radio" id="option-<%=options[i].id%>" data-qlty-option="<%=options[i].id%>" name="options" value="Правильный вариант ответа" <% if (options[i].is_right === "1") { %> checked="checked" <%}%>/>
                        <%} else if (task.type === "2") {%>
                        <input type="checkbox" id="option-<%=options[i].id%>" data-qlty-option="<%=options[i].id%>" name="options" value="Правильный вариант ответа" <% if (options[i].is_right === "1") { %> checked="checked" <%}%>/>
                        <%} else if (task.type === "3") {%>
                        <input type="radio" id="option-<%=options[i].id%>" data-qlty-option="<%=options[i].id%>" name="options" value="Правильный вариант ответа" checked="checked" <% if (options[i].is_right === "1") { %> checked="checked" <%}%>/>
                        <%} %>
                        <label for="option-<%=options[i].id%>">Правильный вариант ответа</label>
                    </div>

                    <a class="task-option-remove" href="javascript:;" data-qlty-option="<%=options[i].id%>">удалить ответ</a>
                </div>
                <div class="option-text">
                    <textarea id="option-text-<%=options[i].id%>" style="width: 100%;" data-qlty-option="<%=options[i].id%>" cols="30" rows="2"><%=options[i].value%></textarea>
                </div>
            </li>
            <% } %>
        </ul>
    </div>
</script>
<script type="text/html" id="option_template">
    <li>
        <div class="option-toolbar">
            <div class="option-input">
                <input id="<%=optionId%>" type="<%=type%>" name="options" /><label for="<%=optionId%>"> Правильный вариант ответа</label>
            </div>

            <a class="task-option-remove" href="javascript:;" >удалить ответ</a>
        </div>
        <div class="option-text">
            <textarea id="option-added-<%=id%>" cols="30" rows="2"></textarea>
        </div>
    </li>
</script>

<script type="text/html" id="image_upload_template">
    <form id="qlty-upload-image" enctype="multipart/form-data" method="POST" action="/admin/image/upload">
        <div class="upload-image-left">
            <input class="image-to-upload" id="qlty-image-to-upload" type="file" name="image">
        </div>
        <div class="upload-image-right" id="uploaded-image"></div>
    </form>
</script>

<script type="text/html" id="add_section">
    <div class="ui form">
        <div class="ui field small-modal-wrapper">
            <label for="add-section-input">Название</label>
            <input type="text" id="add-section-input" name="add_section" value="<%=value%>"/>
        </div>
    </div>
</script>

<script type="text/html" id="formula_add_template">
    <div class="formula-renderer">
        <div class="formula-options">
            <div class="formula-size-wrapper">
                <label>Размер:</label>
                <div id="formula-size" class="formula-size-slider">
                    <div class="slider-thumb"></div>
                </div>
            </div>
            <div class="ui form color-picker">
                <label>Цвет</label>
                <ul id="color-list" class="colors-list" class="clearfix">
                    <li class="formula-color formula-color-1 formula-active-color" data-qlty-color="1">#000000</li>
                    <li class="formula-color formula-color-2" data-qlty-color="2">#6BAA3D</li>
                    <li class="formula-color formula-color-3" data-qlty-color="3">#FF1493</li>
                    <li class="formula-color formula-color-4" data-qlty-color="4">#00AAFF</li>
                </ul>
            </div>
        </div>
        <div>
            <div class="formula-main">
                <div class="formula-toolbar">
                    <label>формула:</label>
                    <div class="formula-toolbar-links">
                        <a href="javascript:;" class="formula-render" id="render-formula-button" title="Рендер!">Рендер!</a>
                        <!--
                        <a href="javascript:;" class="formula-add-library" id="add-library-formula-button" title="В библиотеку">В библиотеку</a>
                        <a href="javascript:;" class="formula-new-window" id="new-window-formula-button" title="В новом окне">В новом окне</a>
                        -->
                    </div>
                </div>
                <textarea id="formula-text" cols="20" rows="6"></textarea>
                <div class="formula-holder" id="formula-holder">

                </div>
            </div>
        </div>
    </div>
</script>
</div>
</body>
</html>