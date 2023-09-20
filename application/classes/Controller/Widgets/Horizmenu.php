<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Виджет "Верхнее меню"
 */
class Controller_Widgets_Horizmenu extends Controller_Widgets {
    
    public $template = 'widgets/w_horiz_menu';

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
        $select = Request::initial()->action();

        $menu = array(
            '<img src="http://lib.quali.me/img/qsm.png">' => array('/', 'index'),
            'Тесты' => array('tests', 'test'),
            'Справка' => array('help'),
			'QualiMe' => array('http://quali.me', 'QualiMe'),
            //'ADMIN' => array('admin'),
        );

        // Вывод в шаблон
        $this->template->menu = $menu;
        $this->template->select = $select;
    }

}