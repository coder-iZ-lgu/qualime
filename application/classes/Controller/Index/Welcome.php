<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Tests extends Controller_Index {

    public function action_options()
    {
        
    }
    
    public function action_test()
    {
        $content = '';
        $testId = $this->request->param('id');

        if ($testId == NULL)
        {
            $mesage = 'This test does not exist. Sorry.';
            $content = View::factory('common/messages/v_error')
                    ->bind('message', $mesage);
        }
        else
        {
            $test = ORM::factory('Test', $testId);
            if ($test->loaded())
            {
                $tasks = $test->tasks->find_all();
                $options = $tasks->options->find_all();
                
                $content = View::factory('index/tests/v_test')
                        ->bind('tasks', $tasks);
            }
        }
        
        
        $this->template->content = $content;
    }
    
    public function action_tests()
    {
        $tests = ORM::factory('Test')->find_all();
        $content = View::factory('index/tests/v_tests_index')
                ->bind('tests', $tests);
        /*
        $t = ORM::factory('task', 8);
        if ($t->loaded())
        {
            $t->task_helper_text = 'helper 9999999';
            $t->save();
        }
         
         */
        $this->template->content = $content;
    }

}