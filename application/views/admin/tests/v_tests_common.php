<?=$crumbs;?>
<div class="manage-and-sort-wrapper" xmlns="http://www.w3.org/1999/html">

    <h4 class="ui horizontal divider header"><i class="settings icon"></i>УПРАВЛЕНИЕ</h4>

    <?=Form::open('admin/tests/'.$audience)?>
    <div class="ui form manage-and-sort-form">
        <div class="ui column stackable grid">
            <div class="row">
                <div class="eight wide column">
                    <div class="field">
                        <?=Form::select('section_id', $sections, $data['section_id'], array('class'=>'ui dropdown')) ?>
                    </div>
                </div>
                <div class="four wide column">
                    <?=Form::submit('submit', 'Сортировать', array('class' => 'fluid ui green button'))?>
                </div>
                <div class="four wide column">
                    <?=HTML::anchor('/admin/sections/'.$audience, 'Разделы', array('class'=>'fluid ui grey button', 'data-qlty-audience' => $audience_type))?>
                </div>
            </div>
        </div>
    </div>
    <?=Form::close()?>
</div>

<div class="all-tests-header" style="padding: 4rem 0; text-align: center;">
    <h4 class="ui horizontal divider header"><i class="cubes icon"></i>ТЕСТЫ</h4>

    <?=HTML::anchor('/admin/tests/create/'.$audience, '<i class="icon plus"></i>', array('class'=>'circular ui blue icon button add'))?>
</div>

<div class="ui two column stackable grid link cards kili">
    <div class="row">
        <? $counter = 0; ?>
        <? foreach ($tests as $item): ?>
        <? $counter++; ?>

        <div class="column">
            <div class="ui link card">
                <div class="content">
                    <div class="header">
                        <?=HTML::anchor('/test/'.$item->audience->alias.'/'.$item->id, $item->title)?>
                    </div>
                </div>

                <div class="extra content" style="padding: .5em 1em 1.5em !important;">
                    <?=HTML::anchor('admin/tests/delete/'.$item->id, 'Удалить', array('class'=>'left floated ui tiny inverted red button test-item-delete'))?>
                    <?=HTML::anchor('admin/tests/edit/'.$item->id, 'Редактировать', array('class'=>'right floated ui tiny inverted blue button test-item-edit'))?>
                </div>
                <!--
                <div class="test-item-info">
                    <div class="two-null-px-pad-wrapper">
                        <span class="author"><?=$item->author?></span>
                        <span class="dated">Опубликовано: <?=$item->creation_date?></span>

                        <span class="audience">Аудитория: <?=$item->audience->title?></span>
			            <span class="section">Раздел: <?=$item->section->title?></span>
                    </div>
                    <div class="two-null-px-pad-wrapper">
                        <p class="description"><?=$item->description?></p>
                    </div>
                </div>
                -->
            </div>
        </div>

        <? if ($counter%2==0) :?>
            </div>
            <div class="row">
        <? endif; ?>
        <? endforeach ?>
    </div>
</div>