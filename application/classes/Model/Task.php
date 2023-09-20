<?php defined('SYSPATH') or die('No direct script access.');

class Model_Task extends ORM
{
    protected $_belongs_to = array(
        'test' => array(
            'model' => 'Test',
            'foreign_key' => 'test_id',
        ),
	'type' => array(
            'model' => 'Tasktype',
            'foreign_key' => 'type_id',
        ),
	
    );
    
    
    protected $_has_many = array(
        'options' => array(
            'model' => 'Option',
            'foreign_key' => 'task_id',
        ),
	
    );
}
