<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tests extends Controller_Common {

    public function action_index()
    {
        $tests = array();
        $content = View::factory('/pages/tests')
            ->bind('tests', $tests);
        $tests = Model::factory('Test')->get_all();
        $this->template->content = $content;
        $this->template->title = "Тесты";
        $this->template->description = "Описание";
    }


    public function action_test()
    {
        $id = $this->request->param('id');

        $content = View::factory('/pages/test')
            ->bind('tasks', $tasks);

        $tasks = Model::factory('Test')->get_test($id);

        /*
        $tests_url = 'tests/' . $id;
        $tests = Request::factory($tests_url)->execute();
        */

        $this->template->content = $content;
    }

} // Articles