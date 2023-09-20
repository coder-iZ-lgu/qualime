<?php defined('SYSPATH') or die('No direct script access.');

class Model_Section extends ORM 
{
    protected $_has_many = array(
        'tests' => array(
            'model' => 'Test',
            'foreign_key' => 'section_id',
        ),
    );
    
    protected $_belongs_to = array(
        'audience' => array(
            'model' => 'Audiencetype',
            'foreign_key' => 'audience_id',
        ),
	
    );
}
