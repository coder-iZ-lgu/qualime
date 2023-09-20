ADMIN
<?php foreach($tasks as $task): ?>
    <b>Task ID:</b>&nbsp;
    <?php echo $task['task_id']; ?><br />
    <br />
    <b>Task Number:</b>&nbsp;
    <?php echo $task['task_number']; ?><br />
    <br />
    <b>Task Main Text:</b><br />
    <?php echo $task['task_text']; ?>
    <br />
    <b>Task Helper Text:</b><br />
    <?php echo $task['task_helper_text']; ?>
    <br />
    <b>Task Attention Text:</b><br />
    <?php echo $task['task_attention_text']; ?>
    <br /><hr /><br />
<?php endforeach; ?>