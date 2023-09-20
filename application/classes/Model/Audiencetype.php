<?php defined('SYSPATH') or die('No direct script access.');

class Model_Audiencetype extends ORM
{
    protected $_table_name = 'audience_types';
    protected $_has_many = array(
        'tests' => array(
            'model' => 'Test',
            'foreign_key' => 'audience_id',
        ),
    );
}
