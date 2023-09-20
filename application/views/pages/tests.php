<?php foreach($tests as $test): ?>

    <div style="padding:10px; margin-bottom:10px; border-bottom:#333 2px solid;">
        <strong><a href="<?php echo URL::site('/tests/test-'.$test['id']);?>"><?php echo $test['name']; ?></a></strong><br />
        <i>Автор: <?php echo $test['author']; ?></i><br />
        <i>Категория: <?php echo $test['category_name']; ?></i><br />
        <i>Дата создания: <?php echo $test['creation_date']; ?></i>
    </div>

<?php endforeach; ?>