<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Верхнее меню"
 */
class Controller_Widgets_Menuuser extends Controller_Widgets {
    
    public $template = 'widgets/w_menu_user';

    public function action_index()
    {
        $select = $select = Request::initial()->controller();
	
	$menu = array(
	    array(
		'title' => 'Главная',
		'url' => '/',
		'selected' => array('main')
	    ),
            array(
		'title' => 'Профиль пользователя',
		'url' => 'user/profile',
		'selected' => array('profile')
	    ),
	    array(
		'title' => 'Результаты',
		'url' => 'user/results',
		'selected' => array('results')
	    ),
        );
	
        $this->template->menu = $menu;
        $this->template->select = strtolower($select);
    }

}