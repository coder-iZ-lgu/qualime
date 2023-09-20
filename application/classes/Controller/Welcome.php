<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Базовый класс главной страницы
 */
class Controller_Welcome extends Controller {
    
    public function action_index()
    {
        $this->response->body('Welcome');
    }
}