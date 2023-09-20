<div class="ui card qtest">
    <div class="content c">
        <div id="task-<?= $task->id ?>" class="ui four item stackable tabs menu tab-set def-list-styles"
            data-qlty-task="<?= $task->id ?>">
            <a href="javascript:;" class="item active" data-qlty-text="main">Задание</a>
            <a href="javascript:;" class="item" data-qlty-text="actualization" data-qlty-viewed="0">Актуализация
                знаний</a>
            <a href="javascript:;" class="item" data-qlty-text="solution">Решение</a>
            <a href="javascript:;" class="item" data-qlty-text="attention">Обратите внимание</a>
        </div>
        <div class="tab-content-wrapper">
            <div id="tab-main-<?= $task->id ?>" class="tab-content active"><?= $task->main_text ?></div>
            <div id="tab-actualization-<?= $task->id ?>" class="tab-content"><?= $task->actualization_text ?></div>
            <div id="tab-solution-<?= $task->id ?>" class="tab-content"><?= $task->solution_text ?></div>
            <div id="tab-attention-<?= $task->id ?>" class="tab-content"><?= $task->attention_text ?></div>
        </div>
    </div>
    <div class="content answer-wrapper" data-qlty-task="<?= $task->id ?>">
        <span class="there-is-no-spoon-my">
            <?= $task->type->description ?>
        </span>
        <ol class="ui list">
            <? foreach ($options as $key => $option): ?>
                <div class="ui divider"></div>
                <div class="morpheus clearfix">
                    <!-- <div class="key-plus-one"><?= $key + 1 ?></div> -->
                    <li>
                        <?
                        switch ($task->type_id):
                            case 1: ?>
                                <div class="options-task-wrapper"><input type="radio" name="options-<?= $task->id ?>"
                                        id="option-<?= $option->id ?>" data-qlty-option="<?= $option->id ?>"
                                        class="ui radio checkbox" /></div>
                                <label for="option-<?= $option->id ?>"><?= $option->text ?></label>
                                <? break; ?>
                            <? case 2: ?>
                                <div class="options-task-wrapper"><input type="checkbox" name="options-<?= $task->id ?>"
                                        id="option-<?= $option->id ?>" data-qlty-option="<?= $option->id ?>" class="ui checkbox" />
                                </div>
                                <label for="option-<?= $option->id ?>"><?= $option->text ?></label>
                                <? break; ?>
                            <? case 3: ?>
                                <div class="options-task-wrapper ui input"><input type="text" name="options-<?= $task->id ?>"
                                        id="option-<?= $option->id ?>" data-qlty-option="<?= $option->id ?>" /></div>
                                <? break; ?>
                        <? endswitch; ?>
                    </li>
                </div>
            <? endforeach; ?>
        </ol>
    </div>
</div>