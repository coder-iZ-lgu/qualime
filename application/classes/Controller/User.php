<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Базовый класс главной страницы
 */
class Controller_User extends Controller_Base {

    public $template = 'index/v_base';        // Базовый шаблон

    public function  before() {
        parent::before();

        // Виджеты
        $horizMenu = Widget::load('horizmenu');
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