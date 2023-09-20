<?php
    class Model_Student extends ORM
{
        protected $_table_name = 'students';
        protected $_belongs_to = array(
            'user' => array(
                'model'       => 'User',
                'foreign_key' => 'user_id',
            ),
            'class'=> array(
                'model'=>'Class',
                'foreign_key'=>'class_id'
            ),
        );
        protected $_has_many = array(
            'results'=>array(
                'model'=>'Testresult',
                'foreign_key'=>'student_id'
            ),
        );
}