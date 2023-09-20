<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model_Auth_User {

    protected $_has_one = array(
        'teacher' => array(
            'model' => 'Teacher',
            'foreign_key' => 'user_id'
        ),
        'student' => array(
            'model' => 'Student',
            'foreign_key' => 'user_id'
        ),
    );

    public function labels()
{
    return array(
        'username' => 'Логин',
        'email' => 'E-mail',
        'password' => 'Пароль',
        'password_confirm' => 'Повторить пароль',
        'name' => 'Имя',
    );
}


    public function rules()
    {
            return array(
                    'username' => array(
                            array('not_empty'),
                            array('min_length', array(':value', 4)),
                            array('max_length', array(':value', 32)),
                            array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
                            array(array($this, 'unique'), array('username', ':value')),
                            //array(array($this, 'username_available'), array(':validation', ':field')),
                    ),
                    'email' => array(
                            array('not_empty'),
                            array('min_length', array(':value', 4)),
                            array('max_length', array(':value', 127)),
                            array('email'),
                            array(array($this, 'unique'), array('email', ':value')),
                            //array(array($this, 'email_available'), array(':validation', ':field')),
                    ),
                    'password' => array(
                            array('not_empty'),
                         
                    ),
                'name' => array(
                    array('not_empty'),

                ),
                /*
                    'password_confirm' => array(
                                array('not_empty'),
                                array('min_length', array(':value', 8)),
                                array('max_length', array(':value', 32)),
                        ),
*/
            );
    }
}