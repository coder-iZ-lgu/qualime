<?php defined('SYSPATH') or die('No direct script access.');

class Model_Country extends ORM 
{
    protected $_table_name = 'countries';
    protected $_primary_key = 'country_id';
    protected $_has_many = array(
        'cities' => array(
            'model' => 'City',
            'foreign_key' => 'country_id',
        ),
    );
}