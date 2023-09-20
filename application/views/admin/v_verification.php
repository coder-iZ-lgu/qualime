<h2>Пользователи</h2>

<table class="ui celled table">
    <thead>
    <tr><th>Пользователь</th>
        <th>Имя</th>
        <th>Учебное заведение</th>
        <th>Доступ</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($users as $user) {
        ?>
        <tr>
            <td data-label="Пользователь"><?=$user->username?></td>
            <td data-label="Имя"><?=$user->name?></td>
            <td data-label="Имя"><?=$user->teacher->school?></td>
            <td>
                <div class="ui toggle checkbox">
                    <input data-userid="<?=$user->id?>" class="toggle-verify" type="checkbox" <?=$user->verification == 1 ? 'checked' : ''?>>
                    <label></label>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<script>
    $('.toggle-verify').on('change', function(){
        let userId = $(this).data('userid');
        console.log($(this).is(':checked'));
        $.ajax({
            method: 'POST',
            url: '/ajax/verify/',
            data: {
                user_id: userId,
                verify: $(this).is(':checked')
            }
        })
    })
</script>