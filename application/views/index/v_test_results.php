<h2>Класс <?=$class->name?></h2>
<h3>Тест <?=$test->title?></h3>
<p><?=$test->description?></p>

<table class="ui celled table">
    <thead>
    <tr><th>ФИО</th>
        <th>Дата прохождения теста</th>
        <th>Отметка</th>
        <th>Действие</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($results as $result) {
        ?>
        <tr>
            <td data-label="ФИО"><?= $result['user_name']
                ?></td>
            <td data-label="Дата"><?= !empty($result['result_date']) ? date_create($result['result_date'])->format('d.m.Y') : ''
                ?></td>
            <td data-label="Отметка"><?= $result['result_mark']
                ?></td>
            <td>
                <div data-resultid="<?=$result['result_id']?>" class="ui animated button teal action-button see-button <?=empty($result['result_id'])? 'disabled' : ''?>" tabindex="0">
                    <div class="visible content button-text">
                        <i class="eye icon"></i>
                    </div>
                    <div class="hidden content">Подробнее
                    </div>
                </div>
                <div data-resultid="<?=$result['result_id']?>" class="ui animated button red action-button remove-button <?=empty($result['result_id'])? 'disabled' : ''?>" tabindex="0">
                    <div class="visible content button-text">
                        <i class="trash alternate icon"></i>
                    </div>
                    <div class="hidden content">Удалить попытку
                    </div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.see-button').click(function () {
            let modal = QLTY.ui.modal.create_modal({
                id: "check-test-modal",
                title: "Результаты теста",
                html: "1",
                className: "ui modal",
                buttons: [
                    {
                        value: "OK",
                        id: "test-ok",
                        class: "ui button green",
                        action: function (slf) {
                            slf.close();
                        }
                    }
                ]
            });
            $.ajax({
                method: 'GET',
                url: '/ajax/getresult/?result_id=' + $(this).data('resultid'),
                success: function (response) {
                    modal.body(response);
                    modal.open();
                    MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
                }
            })
        });

        $('.remove-button').click(function () {
            $.ajax({
                method: 'POST',
                url: '/ajax/removeresult/',
                data: {
                    result_id: $(this).data('resultid')
                },
                success: function (response) {
                   window.location.reload()
                }
            })
        });
    });

</script>