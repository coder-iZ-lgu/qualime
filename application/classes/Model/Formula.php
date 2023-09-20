<?php defined('SYSPATH') or die('No direct script access.');

class Model_Formula extends ORM 
{
    protected $_table_name = 'formulas';
    protected $_has_many = array(
	'colors' => array(
	    'model' => 'Formulacolor',
	    'through' => 'formulas_colors',
	    'far_key' => 'color_id',
	    'foreign_key' => 'formula_id'
	),
	'sizes' => array(
	    'model' => 'Formulasize',
	    'through' => 'formulas_sizes',
	    'far_key' => 'size_id',
	    'foreign_key' => 'formula_id'
	),
    );
}