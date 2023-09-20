<h2><?=$student_name?></h2>

<table class="ui celled table">
    <thead>
    <tr><th>Тест</th>
        <th>Дата прохождения теста</th>
        <th>Отметка</th>
        <th>Действие</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($myresults as $result) {
        ?>
        <tr>
            <td data-label="Тест"><?= $result->test->title
                ?></td>
            <td data-label="Дата"><?= date_create($result->date)->format('d.m.Y')
                ?></td>
            <td data-label="Отметка"><?= $result->mark
                ?></td>
            <td>
                <div data-resultid="<?=$result->id?>" class="ui animated button teal action-button see-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="eye icon"></i>
                    </div>
                    <div class="hidden content">Подробнее
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
    });

</script>