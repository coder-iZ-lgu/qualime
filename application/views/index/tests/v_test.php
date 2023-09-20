<!-- Yandex.RTB R-A-409625-5 -->
<div id="yandex_rtb_R-A-409625-5" style="margin-bottom: 50px;"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-409625-5",
                renderTo: "yandex_rtb_R-A-409625-5",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>

<?=$breadcrumbs;?>
<div class="ui divider"></div>
<div id="particular-test" data-qlty-test="<?=$test_id?>">
    <div class="particular-test-header">
        <h3><i class="file text outline icon"></i> <?=$test_title?></h3>
        <div class="particular-test-buttons">
            <div class="btn-md">
                <button id="switcher-item-1" name="switcher" class="ui circular icon button">И</button>
                <button id="switcher-item-2" name="switcher" class="ui circular icon button">K</button>
            </div>
        </div>
    </div>
    <div id="timer-holder" class="ui inverted segment timer-holder">
        <i class="wait icon green"></i><span id="timer-time"></span>
    </div>
</div>

    <? foreach ($tmp as $item):?>
	    <?=$item?>
    <? endforeach; ?>
    
    

<input id="check-button" class="fluid ui large button blue" tabindex="0" type="button" value="Проверить" />