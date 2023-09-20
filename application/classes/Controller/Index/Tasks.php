<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Tasks extends Controller
{

    public function before()
    {
        if ($this->request->is_initial()) {
            //HTTP_Exception_404('File not found');
            //Ajax problem
        }
    }

    public function action_test()
    {
        $id = $this->request->param('id');
        $test = ORM::factory('Test', $id);
        if ($test->loaded()) {
            $ntasks = $test->tasks->count_all();
            echo $ntasks;
        }
    }

    public function action_task()
    {
        $id = $this->request->param('id');

        $task = ORM::factory('Task', $id);
        if ($task->loaded()) {
            $options = $task->options->find_all();

            $count = 0;

            foreach ($options as $key => $option) {

                print_r($option->id . "----" . $option->text);
                $count += 1;

            }

            $body = View::factory('index/tasks/v_task')
                ->bind('options', $options)
                ->bind('task', $task);
            $this->response->body($body);
        }
    }

    public function action_options()
    {
        $id = $this->request->param('id');

        $task = ORM::factory('Task', $id);
        if ($task->loaded()) {
            $options = $task->options->find_all();
            $this->response->body(View::factory('index/tasks/v_task_options')->bind('options', $options));
        }
    }

    public function action_text()
    {
        $id = $this->request->param('id');

        $task = ORM::factory('Task', $id);
        if ($task->loaded()) {
            $this->response->body(View::factory('index/tasks/v_task_text')->bind('task', $task));
        }
    }

    public function action_check()
    {
        $id = $this->request->param('id');

        $task = ORM::factory('Task', $id);
        if ($task->loaded()) {
            $options = $task->options->find_all();
            $body = View::factory('index/tasks/v_task_check')
                ->bind('options', $options)
                ->bind('task', $task);
            $this->response->body($body);
        }
    }
}