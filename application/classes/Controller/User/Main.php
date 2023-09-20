<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_User_Main extends Controller_User {

    public function action_index()
    {
        $this->template->content = "User Page";
    }

}