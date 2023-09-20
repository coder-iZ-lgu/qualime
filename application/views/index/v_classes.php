<h2>Мои классы</h2>
<div>
    <p>
        Добавить класс
    </p>

    <div class="ui action input">
        <form id="add_class_form">
            <input id="input_class_name" name="class_name" type="text" placeholder="Название">
            <button id="add_class_button" type="button" role="button" class="ui button green">Добавить</button>
        </form>
    </div>

</div>
<table class="ui celled table table-text personal-table">
    <thead>
    <tr><th>Класс

        </th>
        <th>Действие</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($classes as $class) {
        ?>
        <tr>
            <td data-label="Класс">

                <div class="ui input">
                    <input data-classid="<?=$class->id?>" class="input-edit-class" id="input_edit_class_<?=$class->id?>" style="width: 80px;" type="text" value="<?= $class->name?>" readonly>
                </div>
            </td>
            <td>
                <a href="/personal/class/<?=$class->id?>" class="ui animated button teal action-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="eye icon"></i>
                    </div>
                    <div class="hidden content">Обучающиеся
                    </div>
                </a>
                <a href="/personal/class_tests/<?=$class->id?>" class="ui animated button blue action-button results-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="tasks icon"></i>
                    </div>
                    <div class="hidden content">Результаты</div>
                </a>
                <div data-classid="<?=$class->id?>" class="ui animated button grey action-button edit-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="pencil alternate icon"></i>
                    </div>
                    <div class="hidden content">Редактировать</div>
                </div>
                <div data-classid="<?=$class->id?>" class="ui animated button red action-button remove-button" tabindex="0">
                    <div class="visible content button-text">
                        <i class="trash alternate icon"></i>
                    </div>
                    <div class="hidden content">Удалить</div>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('#input_class_name').on('input', function(){
            $('.ui.action.input').removeClass('error');
        });

        $('#add_class_button').click(function(){
            if ($('#input_class_name').val() !== '') {
                $.ajax({
                    method: 'POST',
                    url: '/ajax/addclass/',
                    data: {
                        class_name: $('#input_class_name').val()
                    },
                    success: function (response) {
                        $('#content').html(response);
                    }
                })
            } else {
                $('.ui.action.input').addClass('error');
            }
        });

        $('.remove-button').click(function () {
            let remove_class = $(this).data('classid');
            $.ajax({
                method: 'POST',
                url: '/ajax/removeclass/',
                data: {
                    class_id: remove_class
                },
                success: function (response) {
                    $('#content').html(response);
                }
            })
        });

        $('.edit-button').click(function () {
            let edit_class = $(this).data('classid');
            let input = $('#input_edit_class_' + edit_class);
            input.prop('readonly', false);
        });

        $('.input-edit-class').on('change', function () {
            let input = $(this);
            let value =input.val();
            let edit_class = input.data('classid');
            if (value !== '') {
                $.ajax({
                    method: 'POST',
                    url: '/ajax/editclass/',
                    data: {
                        class_id: edit_class,
                        edit_classname: value
                    },
                    success: function (response) {
                        input.prop('readonly', true);
                    }
                })
            }
        })

    })
</script>