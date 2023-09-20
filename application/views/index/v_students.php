<h2>Класс <?=$class->name?></h2>
<div>
    <p>
        Добавить участника*
    </p>
    <div class="ui form">
        <form id="add_student_form">
            <textarea id="input_student_name" name="student_name" rows="3"></textarea>
            <p>*для добавления нескольких участников необходимо вводить список имён в строку и через запятую</p>
            <button id="add_student_button" type="button" role="button" class="ui button green right floated">Добавить</button>
        </form>
    </div>
    <br><br>
    <table class="ui celled table">
        <thead>
        <tr>
            <th>Имя
            </th>
            <th>Логин</th>
            <th>Действие</th>
        </tr></thead>
        <tbody>
        <?php
        foreach ($students as $student) {
            ?>
            <tr>
                <td data-label="Участник"><?= $student->user->name
                    ?></td>
                <td data-label="Email"><?= $student->user->username
                    ?></td>
                <td>
                    <div data-studentid="<?=$student->id?>" class="ui animated button brown action-button reset-button" tabindex="0">
                        <div class="visible content button-text">
                            <i class="cogs icon"></i>
                        </div>
                        <div class="hidden content">Сбросить пароль
                        </div>
                    </div>
                    <div data-studentid="<?=$student->id?>" class="ui animated button red action-button remove-button" tabindex="0">
                        <div class="visible content button-text">
                            <i class="trash alternate icon"></i>
                        </div>
                        <div class="hidden content">Удалить
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#add_student_button').click(function(){
            if ($('#input_student_name').val() !== '') {
                let modal = QLTY.ui.modal.create_modal({
                    id: "check-test-modal",
                    title: "Участники успешно добавлены",
                    html: "1",
                    className: "ui modal",
                    buttons: [
                        {
                            value: "OK",
                            id: "test-ok",
                            class: "ui button green",
                            action: function(slf){
                                slf.close();
                            }
                        }
                    ]
                });
                $.ajax({
                    method: 'POST',
                    url: '/ajax/addstudents/',
                    data: {
                        student_name: $('#input_student_name').val(),
                        class_id: <?=$class->id?>
                    },
                    success: function (response) {
                        modal.body(response);
                        modal.open();
                        $.ajax({
                            method: 'POST',
                            url: '/ajax/addstudents/',
                            data: {
                                list_only: '1',
                                student_name: '',
                                class_id: <?=$class->id?>
                            },
                            success: function (response) {
                                $('#content').html(response);
                            }
                        })
                    }
                })
            } else {
                $('.ui.action.input').addClass('error');
            }
        });

        $('.reset-button').click(function(){
            let student = $(this).data('studentid');

            let resetModal = QLTY.ui.modal.create_modal({
                id: "check-test-modal",
                title: "Пароль успешно сброшен",
                html: "1",
                className: "ui modal",
                buttons: [
                    {
                        value: "OK",
                        id: "test-ok",
                        class: "ui button green",
                        action: function(slf){
                            slf.close();
                        }
                    }
                ]
            });
            $.ajax({
                method: 'POST',
                url: '/ajax/resetpassword/',
                data: {
                    student_id: student,
                    class_id: <?=$class->id?>
                },
                success: function (response) {
                    resetModal.body(response);
                    resetModal.open();
                    //$('#content').html(response);
                }
            })
        });


        $('.remove-button').click(function () {
            let remove_student = $(this).data('studentid');
            $.ajax({
                method: 'POST',
                url: '/ajax/remove_student/',
                data: {
                    student_id: remove_student
                },
                success: function (response) {
                    $('#content').html(response);
                }
            })
        });
    });

</script>