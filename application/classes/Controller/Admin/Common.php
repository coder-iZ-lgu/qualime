<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Admin_Common extends Controller_Template {

    public $template = 'admin/common';

    public function before()
    {
        parent::before();
        $this->template->content = '';
        $this->template->styles = array('main');
        $this->template->scripts = array('jquery');
    }

} // End Common