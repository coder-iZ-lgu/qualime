<h3>
    <font color="red">СКОПИРУЙТЕ</font> логин и новый пароль участника, после закрытия данного окна их просмотр станет
    недоступным.
</h3>

<table class="ui celled table">

    <thead>

        <tr>
            <th>Имя</th>

            <th>Логин</th>

            <th>Пароль</th>

        </tr>
    </thead>

    <tbody>

        <tr>

            <td data-label="Участник">
                <?= $student->user->name

                    ?>
            </td>

            <td data-label="Логин">
                <?= $student->user->username

                    ?>
            </td>

            <td data-label="Пароль">
                <?= $password

                    ?>

            </td>

        </tr>

    </tbody>

</table>