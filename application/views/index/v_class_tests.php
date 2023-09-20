<h2>Результаты класса <?=$class->name?></h2>

<table class="ui celled table table-text personal-table">
    <thead>
    <tr><th>Тест
        </th>
        <th>Результаты</th>
        <th>Средний балл</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($tests as $test) {
        ?>
        <tr>
            <td data-label="Тест">
               <?=$test['test_title']?>
            </td>
            <td>
                <a href="/personal/class_results/?class_id=<?=$class->id?>&test_id=<?=$test['test_id']?>" class="ui button teal action-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="eye icon"></i>
                    </div>
                </a>
            </td>
        <td><?=$test['avg_mark']?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
