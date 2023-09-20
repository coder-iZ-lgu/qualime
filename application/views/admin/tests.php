admin area
<div>
    <input type="button" id="add-test-btn" value="Add new Test"/>
</div>
<?php foreach($tests as $test): ?>

    <div style="padding:10px; margin-bottom:10px; border-bottom:#333 2px solid;">
        <strong><a href="<?php echo URL::site('/tests/test-'.$test['id']);?>"><?php echo $test['name']; ?></a></strong><br />
        <i>Автор: <?php echo $test['author']; ?></i><br />
        <i>Дата создания: <?php echo $test['creation_date']; ?></i>
    </div>
    <div>
        <input type="button" value="Edit"/>
        <input type="button red" value="Delete"/>
    </div>

<?php endforeach; ?>
<script type="text/javascript">
    document.getElementById('add-test-btn').onclick = function(){
        document.location.href = "<?php echo URL::site('admin/tests/addtest');?>";
    }
</script>