<div class="test-result-info">
    <div class="mark">
        <span class="result"><?=$result['mark']?></span>
        <span class="flaged">Ваша Отметка</span>
    </div>
    <div class="mark-info">
	<span class="flaged"><img src="http://quali.me/assets/img/QualiMeQual.png" style="width:200px; height:200px;"/></span>
	<? if ($result['mark'] < 9)
		if ($result['mark'] > 5) :?>
			<span class="flaged"><a href="http://helpy.quali.me/">Повторите материал</a></span>
	<? endif; ?>
	<? if ($result['mark'] < 6) :?>
	<span class="flaged"><a href="<?=$link?>">Изучите материал</a></span>
	<? endif;?>
        <span class="flaged">Общее количество заданий: <span class="result"><?=$result['total_tasks']?></span></span>
        <span class="flaged">Правильных ответов: <span class="result"><?=$result['total_correct_task_answers']?></span></span>
        <? if ($result['mode'] == 'true') :?>
            <span class="flaged">Штраф: <span class="result"><?=$result['penalties']?></span></span>
        <? endif;?>
    </div>
</div>
<div id="particular-test" data-qlty-test="<?=$test_id?>">
    <? foreach ($tmp as $item_count => $item):?>
	    <?=$item?>
    <? endforeach; ?>
</div>
<style>
    .MJXc-display {
        display: inline !important;
    }
</style>