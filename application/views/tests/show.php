<?php foreach($tasks as $task): ?>
    <strong>ID:</strong><br />
    <?php echo $task['task_id']; ?><br />
    <strong>Text:</strong><br />
    <?php echo $task['task_text']; ?>
    <strong>Helper:</strong><br />
    <?php echo $task['task_helper_text']; ?>
    <strong>Attention:</strong><br />
    <?php echo $task['task_attention_text']; ?>
    <br /><hr /><br />
<?php endforeach; ?>