<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Common {


    // Главная страница
    public function action_index()
    {
        if(Auth::instance()->logged_in('admin')){
            HTTP::redirect('admin/');
        } else {
            $content = View::factory('/pages/main')
                ->bind('authBlock', $authBlock);
        }

        $authBlock = View::factory('auth/auth-block');

        $this->template->content = $content;
        /*
        $articles = array();

        $content = View::factory('/pages/show')
            ->bind('articles', $articles);

        $article = new Model_Article();
        $articles = $article->get_all();

        $this->template->content = $content;*/

    }
/*
    // Страница о сайте
    public function action_about()
    {
        $content = View::factory('/pages/about');
        $this->template->content = $content;
    }

    // Страница контактов
    public function action_contacts()
    {
        $content = View::factory('/pages/contacts');
        $this->template->content = $content;
    }
    */
    /*
    public function action_about()
    {
        $content = View::factory('/pages/about');
        $this->template->title = 'О сайте';
        $this->template->description = 'Страница о сайте';
        $this->template->content = $content;
    }

    public function action_contacts()
    {
        $content = View::factory('/pages/contacts');
        $this->template->title = 'Мои контакты';
        $this->template->description = 'Страница для связи со мной';
        $this->template->content = $content;
    }*/

} // End Page