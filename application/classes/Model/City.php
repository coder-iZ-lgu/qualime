<?php defined('SYSPATH') or die('No direct script access.');

class Model_City extends ORM 
{
    protected $_table_name = 'cities';
    protected $_belongs_to = array(
        'country' => array(
            'model' => 'Country',
            'foreign_key' => 'country_id',
        ),
	
    );
}