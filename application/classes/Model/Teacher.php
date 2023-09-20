<?php
class Model_Teacher extends ORM
{
    protected $_table_name = 'teachers';
    protected $_belongs_to = array(
        'user' => array(
            'model'       => 'User',
            'foreign_key' => 'user_id',
        ),
    );
    protected $_has_many = array(
        'classes' => array(
            'model'       => 'Class',
            'foreign_key' => 'teacher_id',
        ),
    );

    public function rules()
    {
        return array(
            'school' => array(
                array('not_empty'),

            ),
        );
    }
}