<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Common extends Controller_Template {

    public $template = 'common';

    public function before()
    {
        parent::before();
        View::set_global('title', 'Мой сайт');
        View::set_global('description', 'Самый лучший сайт');
        $this->template->content = '';
        $this->template->styles = array('main');
        $this->template->scripts = '';
        $this->template->authBlock = View::factory('auth/auth-block');
    }

} // End Common