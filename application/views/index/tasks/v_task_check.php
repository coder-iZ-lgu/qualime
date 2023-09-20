<div class="ui card test-wrapper task-check <?if ($is_task_correct === "1"): ?>task-is-correct <? else:?>task-is-not-correct<?  endif;?>">
	<li class="content">
    	<?if ($total_answers !== 0): ?>
			<div id="task-<?=$task->id?>" class="answer-task-text-header" data-qlty-task="<?=$task->id?>">
				<div class="answer-task-text">
					<div class="key-plus-one"><?=$answer_key+1?></div>
					<p><?=$task->main_text?></p>
				</div>
			</div>
			<div class="content answer-wrapper" data-qlty-task="<?=$task->id?>">
				<ol class="ui list">
				<?foreach ($options as $key => $option):?>
					<div class="ui divider"></div>
					<div class="morpheus check clearfix">
						<? switch ($task->type_id):
						case 1: ?>
							<li>
								<label for="option-<?=$option['id']?>"><?=$option['text']?></label>
							</li>
						<? break;?>
						<? case 2: ?>
							<li>
								<label for="option-<?=$option['id']?>"><?=$option['text']?></label>
							</li>
						<? break;?>
						<? case 3: ?>
							<li>
								<label for="option-<?=$option['id']?>">Ваш ответ: <?=$option['answer']?></label>
							</li>
						<? break;?>
						<? endswitch;?>
					</div>
				<? endforeach; ?>
				</ol>
			</div>
		<? else:?>
			<div class="key-plus-one"><?=$answer_key+1?></div>
			<h4>Вы не дали ответа на этот вопрос!</h4>
		<? endif;?>
	</li>
</div>