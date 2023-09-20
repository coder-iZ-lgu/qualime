<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Верхнее меню"
 */
class Controller_Widgets_Menuadmin extends Controller_Widgets {
    
    public $template = 'widgets/w_menu_admin';

    public function action_index()
    {
        /*
        $select = Request::initial()->param('page_alias');

        if ($select == NULL)
        {
            $select = Request::initial()->action();
        }
         * 
         */
        //$select = Request::initial()->uri();
        $select = Request::initial()->controller();
	
	$menu = array(
	    array(
		'title' => 'Главная',
		'url' => '/',
		'selected' => array()
	    ),
            array(
		'title' => 'Тесты',
		'url' => 'admin/tests',
		'selected' => array('tests', 'sections')
	    ),
        );
	/*
        $menu = array(
            'Главная' => array('main'),
            'Тесты' => array('tests'),
            'Статистика' => array('stat'),
        );
*/
        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = strtolower($select);
    }

}