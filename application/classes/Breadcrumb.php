<?php defined('SYSPATH') or die('No direct script access.');

class Breadcrumb {
    protected $_breadcrumbs = array();
    protected $_view;
    //protected $_count = 0;

    public static function factory($view)
    {
        return new Breadcrumb($view);
    }

    public function __construct($view)
    {
	$this->_view = $view;
    }
    
    public function add($title, $uri = null, $is_active = false)
    {
	$this->_breadcrumbs[] = array(
	    'title' => $title,
	    'uri' => $uri,
	    'is_active' => $is_active
	);
	return $this;
    }

    public function render()
    {
       return View::factory($this->_view)->bind('breadcrumbs', $this->_breadcrumbs)->render();
    }
}
