<h2>Результаты теста <?=$test->title?></h2>
<div>
    <p>
        <?=$test->description?>
    </p>

</div>
<table class="ui celled table table-text personal-table">
    <thead>
    <tr><th>Класс

        </th>
        <th>Результаты</th>
        <th>Средний балл</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($classes as $class) {
        ?>
        <tr>
            <td data-label="Класс">
               <?=$class['class_name']?>
            </td>
            <td>
                <a href="/personal/class_results/?class_id=<?=$class['class_id']?>&test_id=<?=$test->id?>" class="ui button blue action-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="tasks icon"></i>
                    </div>
                </a>
            </td>
        <td><?=$class['avg_mark']?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
