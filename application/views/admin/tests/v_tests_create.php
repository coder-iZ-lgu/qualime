<?=$crumbs;?>
<h3>Создание теста</h3>
<div class="ui form test-create-info">
<?=Form::open('admin/tests/create')?>
    <div class="ui two column stackable grid">
        <div class="row">
            <div class="column">
                <div class="field">
                    <?=Form::label('title', 'Название теста')?>
                    <?=Form::input('title', $data['title'], array('size' => 20))?>
                </div>
                <div class="field">
                    <?=Form::label('author', 'Автор')?>
                    <?=Form::input('author', $data['author'], array('size' => 20))?>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <?=Form::label('audience', 'Аудитория')?>
                    <?=Form::input('audience', $audience->title, array('size' => 20, 'disabled' => 'true', 'class'=>'ui dropdown'))?>
                </div>
                <div class="field">
                    <?=Form::label('section_id', 'Раздел')?>
                    <?=Form::select('section_id', $sections, $data['section_id'], array('class'=>'ui dropdown'))?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="field">
                    <?=Form::label('description', 'Описание')?>
                    <?=Form::textarea('description', $data['description'], array('cols' => 60, 'rows' => 10))?>
                </div>
                <?=Form::submit('submit', 'Создать', array('class' => 'fluid ui large green button'))?>
            </div>
        </div>
        <?=Form::hidden('audience_id', $audience->id)?>
        <?=Form::close()?>
    </div>
</div>