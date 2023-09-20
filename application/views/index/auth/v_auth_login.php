<h2 class="ui header inverted aligned center" style="margin-top: 8rem; margin-bottom: 4rem; font-weight: 300;">Личный кабинет</h2>

<div class="register-errors">
    <?php
    if (!empty($errors)){
        foreach ($errors as $error){
            echo $error;}
    };
    ?>
</div>

<div class="pusher">
    <div class="ui two column stackable centered grid">
    <div class="column">
        <?=Form::open('login', array('class' => 'ui large form'))?>
        <div class="ui stacked segment" style="background: rgba(0,0,0,0.3) !important;">
            <div class="field">
                <?=Form::label('username', 'Логин')?>
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <?=Form::input('username', $data['username'], array('size' => 20))?>
                </div>
            </div>
            <div class="field">
                <?=Form::label('password', 'Пароль')?>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <?=Form::password('password', $data['password'], array('size' => 20))?>
                </div>
            </div>
            <?=Form::submit('submit', 'Войти', array('class'=>'ui fluid large basic teal submit button'))?>
        </div>
        <?=Form::close()?>
    </div>
    </div>
</div>