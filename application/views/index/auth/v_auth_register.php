<h2 class="ui header inverted aligned center" style="margin-top: 8rem; margin-bottom: 4rem; font-weight: 300;">Регистрация</h2>

<div class="register-errors">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error){
        echo $error . '<br>';}
        } elseif ($result){
        ?>
        Вы успешно зарегистрировались. Ожидайте подтверждения
        <?php
    }
    ?>
</div>


<div class="pusher">
    <div class="ui two column stackable centered grid">
        <div class="column">
            <?=Form::open('register')?>
            <div class="ui stacked segment" style="background: rgba(0,0,0,0.3) !important;">
                <div class="field">
                    <table class="register-table" width="336" cellspacing="5">
                        <tr>
                            <td><?=Form::label('username', 'Логин:')?></td>
                            <td><div class="ui input"><?=Form::input('username', $data['username'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td ><?=Form::label('email', 'Email:')?></td>
                            <td><div class="ui input"><?=Form::input('email', $data['email'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td ><?=Form::label('password', 'Пароль:')?></td>
                            <td><div class="ui input"><?=Form::password('password', $data['password'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td ><?=Form::label('password_confirm', 'Повторите пароль:')?></td>
                            <td><div class="ui input"><?=Form::password('password_confirm', $data['password_confirm'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td ><?=Form::label('name', 'Ваше имя:')?></td>
                            <td><div class="ui input"><?=Form::input('name', $data['name'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td ><?=Form::label('school', 'Учебное заведение:')?></td>
                            <td><div class="ui input"><?=Form::input('school', $data['school'], array('size' => 20))?></div></td>
                        </tr>
                        <tr>
                            <td><?=Form::label('captcha', 'Captcha:')?></td>
                            <td><?=$captcha?> <br/> <?=Form::input('captcha', $data['captcha'], array('size' => 20))?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><?=Form::submit('submit', 'Зарегистрироваться', array('class'=>'ui secondary button'))?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?=Form::close()?>
        </div>
    </div>
</div>

