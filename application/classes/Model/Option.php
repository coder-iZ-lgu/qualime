<?php defined('SYSPATH') or die('No direct script access.');

class Model_Option extends ORM
{
    protected $_belongs_to = array(
        'task' => array(
            'model' => 'Task',
            'foreign_key' => 'task_id',
        ),
    );
}
