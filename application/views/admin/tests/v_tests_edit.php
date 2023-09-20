<h3>Редактирование теста</h3>
<div class="ui form test-edit-info" data-qlty-test="<?=$id?>">
    <?=Form::open('admin/tests/edit/'.$id)?>
    <div class="ui two column stackable grid">
        <div class="row">
            <div class="column">
                <div class="field">
                    <?=Form::label('title', 'Название теста')?>
                    <?=Form::input('title', $data['title'], array('size' => 20))?>
                </div>
                <div class="field">
                    <?=Form::label('audience_id', 'Аудитория')?>
                    <?=Form::select('audience_id', $audience, $data['audience_id'], array('id'=> 'audience-type-select', 'class'=>'ui dropdown'))?>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <?=Form::label('author', 'Автор')?>
                    <?=Form::input('author', $data['author'], array('size' => 20))?>
                </div>
                <div class="field">
	                <?=Form::label('section_id', 'Раздел')?>
                    <?=Form::select('section_id', $sections, $data['section_id'], array('id'=> 'section-select', 'class'=>'ui dropdown'))?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="field">
	                <?=Form::label('description', 'Описание')?>
                    <?=Form::textarea('description', $data['description'], array('cols' => 60, 'rows' => 10))?>
                </div>
    	        <?=Form::submit('submit', 'Сохранить', array('class' => 'fluid ui large green button'))?>
            </div>
        </div>
        <?=Form::select('section_school_id', $sections_school, null, array('class'=>'sections-hidden', 'data-qlty-audience'=>'1'))?>
        <?=Form::select('section_university_id', $sections_university, null, array('class'=>'sections-hidden', 'data-qlty-audience'=>'2'))?>
        <?=Form::close()?>
    </div>
</div>
<h4 class="ui horizontal divider header"><i class="lab icon"></i>Список заданий теста</h4>
<div class="task-add-wrapper">
    <div class="task-add-header">
        <div class="task-add-buttons">
            <a class="circular ui icon button blue task-add" href="javascript:;" title="Добавить задание к тесту" alt="Добавить задание к тесту"><i class="plus large icon"></i></a>
        </div>
    </div>
    <div class="test-edit-list def-list-styles">
        <? foreach ($tasks as $key => $task):?>
        <div class="ui raised segments">
            <div class="ui segment test-edit-list-item" id="task-edit-item-<?=$task->id?>">
                <div class="task-edit-toolbar">
                    <a href="javascript:;" class="right floated ui button task-delete red" data-qlty-task="<?=$task->id?>"><i class="trash outline icon"></i>Удалить</a>
                    <a href="javascript:;" class="right floated ui button task-edit grey" data-qlty-task="<?=$task->id?>"><i class="edit outline icon"></i>Редактировать</a>

                </div>
                <a href="javascript:;" class="circular ui icon button task-view" title="Посмотреть" alt="Посмотреть" data-qlty-task="<?=$task->id?>"><?=$key+1?></a>
            </div>
            <div class="ui segment task-edit-text">
                <?=$task->main_text;?>
            </div>
        </div>
        <? endforeach;?>
    </div>
</div>