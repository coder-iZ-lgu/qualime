
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