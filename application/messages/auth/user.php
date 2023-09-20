<?php

return array(
    'username' => array(
        'not_empty' => 'Поле Логин не заполнено.',
        'min_length' => 'Логин долен содержать по крайней мере :param2 символа.',
        'max_length' => 'Логин не может содержать более :param2 символов.',
        'unique' => 'Такой логин уже занят.',
    ),
    'email' => array(
        'not_empty' => 'Поле Email не заполено.',
        'min_length' => 'Email долен содержать по крайней мере :param2 символа.',
        'max_length' => 'Email не может содержать более :param2 символов.',
        'email' =>	'Введенный Email некорректен.',
        'unique' => 'Пользователь с таким Email уже зарегистрирован.',
    ),
);
?>