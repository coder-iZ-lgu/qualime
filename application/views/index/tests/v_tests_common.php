<!-- Yandex.RTB R-A-409625-5 -->
<div id="yandex_rtb_R-A-409625-5" style="margin-bottom: 50px"></div>
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

<?=$crumbs;?>
<?$current_url = URL::site(NULL, 'http');?>
<div class="ui styled fluid accordion">

    <? foreach ($resp as $item): ?>

	<div class="title"><i class="dropdown icon"></i><?=Arr::get($item, 'title')?></div>
	<div class="content">

		<div class="ui one column stackable grid link cards kili">
			<div class="row">

                <? $total = count($item); ?>

		        <? foreach (Arr::get($item, 'tests') as $test):?>

                <div class="column">
                    <div class="ui link card" href="<?=$current_url.'test/'.$audience.'/'.$test->id?>">
                        <div class="content">
                            <div class="header"><?=HTML::anchor( '/test/'.$audience.'/'.$test->id, $test->title)?></div>
                            <h4><i class="file text icon"></i> Структура теста</h4>

                            <div class="ui inverted divider"></div>
                            <p><?=$test->description;?></p>
                            <div class="ui inverted divider"></div>
                        </div>
                        <div class="extra content">
                            <?php
                            if(!Auth::instance()->logged_in('teacher')) {
                                echo HTML::anchor( '/test/'.$audience.'/'.$test->id, 'Выполнить'.'<i class="right chevron icon"></i>', array('class'=>'ui tiny inverted button right floated'));
                                    } else {
                                echo HTML::anchor( '/personal/results/'.$test->id, 'Посмотреть результаты'.'<i class="right chevron icon"></i>', array('class'=>'ui tiny inverted button right floated'));}
                            ?>
                        </div>
				    </div>
                </div>
            </div>
            <div class="row">
		<? endforeach;?>
                    </div>
        </div>
    </div>

    <? endforeach; ?>
</div>