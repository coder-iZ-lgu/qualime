<div>
    <h3>Сортировка</h3>
    <?=Form::open('admin/tests/')?>
	<?=Form::label('audience_id', 'Аудитория')?>: <?=Form::select('audience_id', $audience, $data['audience_id'], null)?>
	<?=Form::label('section_id', 'Раздел')?>: <?=Form::select('section_id', $sections, $data['section_id'], null) ?>
	<?=Form::submit('submit', 'Сортировать', array('class' => 'ui green button'))?>
    <?=Form::close()?>
</div>
<div class="all-tests-header" style="text-align: center;">
    <h3 class="all-tests-heading">Список всех тестов</h3>
    <?=HTML::anchor('/admin/tests/create', '', array('class'=>'ui blue button add'))?>
</div>
<div class="sections-list section-list-item clearfix">
    <div class="section-tests clearfix">
        <ul class="clearfix">
            <? foreach ($tests as $test): ?>
            <li class="clearfix">
                <div class="test-item-header">
                    <h4><?=HTML::anchor('/test/'.$test->audience->alias.'/'.$test->id, $test->title)?></h4>
                    <?=HTML::anchor('admin/tests/edit/'.$test->id, 'редактировать', array('class'=>'ui blue button test-item-edit'))?>
                    <?=HTML::anchor('admin/tests/delete/'.$test->id, 'удалить', array('class'=>'ui blue button test-item-delete'))?>
                </div>
                <div class="test-item-info">
                    <div class="author">
                        <h5><?=$test->author?></h5>
                    </div>
                    <div class="description">
                        <p><?=$test->description?></p>
			<p>Аудитория: <?=$test->audience->title?></p>
			<p>Раздел: <?=$test->section->title?></p>
                        <h6>Опубликовано: <?=$test->creation_date?></h6>
                    </div>
                </div>
            </li>
            <? endforeach ?>
        </ul>
    </div>
</div>