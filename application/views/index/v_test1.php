<table class="ui celled table">
    <thead>
    <tr><th>Name</th>
        <th>Email</th>
    </tr></thead>
    <tbody>
    <?php
    foreach ($noactive as $user) {
        ?>
        <tr>
            <td data-label="Name"><?= $user->username
                ?></td>
            <td data-label="Email"><?= $user->email ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<button id="send_req">Запрос</button>
<script>
    $('#send_req').on('click', function () {
        $.ajax(
            {
                method: 'GET',
                url: '/ajax/test_ajax/',
                success: function() {

                }
            }
        )
    })
</script>
