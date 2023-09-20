<?php

class Model_Class extends ORM
{
    protected $_table_name = 'classes';
    protected $_has_many = array(
        'student' => array(
            'model'       => 'Student',
            'foreign_key' => 'class_id',
        ),
        'testresult' => array(
            'model'       => 'Testresult',
            'foreign_key' => 'student_id',
        ),
    );
    protected $_belongs_to = array(
        'teacher' => array(
            'model'       => 'Teacher',
            'foreign_key' => 'teacher_id',
        ),
    );
}
