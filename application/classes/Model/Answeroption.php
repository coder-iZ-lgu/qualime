<?php defined('SYSPATH') or die('No direct script access.');

class Model_Answeroption extends ORM
{
    protected $_table_name = 'answers_options';
    
    protected $_belongs_to = array(
        'answer' => array(
            'model' => 'Answer',
            'foreign_key' => 'answer_id',
        ),
    );
    
}
