<?php
class Model_Testresult extends ORM
{
    protected $_table_name = 'tests_results';
    protected $_belongs_to = array(
        'student' => array(
            'model'       => 'Student',
            'foreign_key' => 'student_id',
        ),
        'test' => array(
            'model'       => 'Test',
            'foreign_key' => 'test_id',
        ),
        'class'=>array(
            'model'       => 'Class',
            'foreign_key' => 'class_id',
        )
    );

}