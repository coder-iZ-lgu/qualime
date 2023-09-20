<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Static extends Controller_Index {

    public function action_about()
    {
        $content = View::factory('index/static/v_about');
        $this->template->content = $content;
        $this->template->title = "Testy | О нас";

    }

    public function action_help()
    {
        $content = View::factory('index/static/v_help');
        $this->template->content = $content;
        $this->template->title = "Testy | Справка";

    }

}