<?php defined('SYSPATH') or die('No direct script access.');


class Controller_Comments extends Controller {

    public function action_index()
    {
        if(Request::initial() === Request::current())
            Request::initial()->redirect(URL::site());

        $id = $this->request->param('id');

        $content = View::factory('/comments/show')
            ->bind('comments', $comments);

        // Вместо switch-case будет вызов Модели
        switch($id)
        {
            case '1':
                $comments = array(
                    array('name' => 'Вася', 'comment' => 'Привет, Петя'),
                    array('name' => 'Петя', 'comment' => 'Привет, Вася'),
                );
                break;

            case '2':
                $comments = array(
                    array('name' => 'Гена', 'comment' => 'Привет, Мир'),
                );
                break;

            default:
                $comments = array();
        }

        $this->response->body($content);
    }

} // Comments