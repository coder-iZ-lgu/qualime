<h3><font color="red">СКОПИРУЙТЕ</font> логины и пароли новых участников, после закрытия данного окна их просмотр станет недоступным.</h3>
    <table class="ui celled table">
    <thead>
    <tr> <th>Имя</th>
        <th>Логин</th>
        <th>Пароль</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($students as $student) {
        ?>
        <tr>
            <td data-label="Участник"><?= $student['name']
                ?></td>
            <td data-label="Логин"><?= $student['username']
                ?></td>
            <td data-label="Пароль"><?= $student['password']
            ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

