<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tasktype extends ORM
{
    protected $_table_name = 'task_types';
    protected $_has_many = array(
        'tasks' => array(
            'model' => 'Task',
            'foreign_key' => 'type_id',
        ),
    );
}
