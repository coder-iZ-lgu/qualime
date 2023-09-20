<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Базовый класс главной страницы
 */
class Controller_Admin extends Controller_Base {

    public $template = 'admin/v_base';        // Базовый шаблон

    public function  before() {
        parent::before();

	// if (!Auth::instance()->logged_in('admin'))
	// {
	//     throw new HTTP_Exception_503('I`m so sorry but you are not allowed to be here.. Rainy today, isn`t it?');
	// }
        // Виджеты
        $horizMenu = Widget::load('menuadmin');
        //$authBlock = Widget::load('auth_block');
        $authBlock = Widget::load('authblock');
        /*
        $cart = Widget::load('cart');
        $topmenu = Widget::load('topmenu');
        $login = Widget::load('login');
*/
        // Вывод в шаблон
        $this->template->styles[] = 'media/css/main.css';
        $this->template->horizMenu = $horizMenu;
        $this->template->authBlock = $authBlock;
        /*
        $this->template->top_menu = $topmenu;
        $this->template->block_left = array($menu, $login);
        $this->template->block_right = array($news);
         * 
         */
    }
}