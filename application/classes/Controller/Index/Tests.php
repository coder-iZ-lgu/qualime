<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Главная страница
 */
class Controller_Index_Tests extends Controller_Index
{

    /*
    public function action_index()
    {
    // /tests
    }
    
    public function action_university()
    {
    $id = (int) $this->request->param('id');
    Request::factory('/test/'.)->render()
    //university
    }
    
    public function action_school()
    {
    //school
    }
    */
    public function action_options()
    {

    }

    public function action_test()
    {
        $content = '';
        $test_id = (int) $this->request->param('id');
        $audience = $this->request->param('audience');
        $audience_type = ($audience == 'university') ? 2 : (($audience == 'school') ? 1 : (($audience == 'iq') ? 3 : 0));
        $audiencetype = ORM::factory('Audiencetype', $audience_type);

        if ($test_id == NULL) {
            $mesage = 'Не существует тестик.. Уж простите.';
            $content = View::factory('common/messages/v_error')
                ->bind('message', $mesage);
        } else {
            $test = ORM::factory('Test', $test_id);
            if ($test->loaded()) {
                $tmp = array();

                //$tmp = Request::factory('tasks/task/2')->execute();
                //$tasks = $test->tasks->order_by('text', 'ASC')->find_all();
                $tasks = $test->tasks->find_all();



                $keys = array();

                foreach ($tasks as $key => $task) {
                    array_push($tmp, Request::factory('tasks/task/' . $task->id)->execute());
                    $keys[] = $key;

                }
                shuffle($tmp); //перемешиваются тесты

                foreach ($tmp as $item) {
                    // print_r($item);
                }

                $title = $test->title;

                $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                    ->add('Тесты', '/tests', false)
                    ->add(UTF8::ucfirst($audiencetype->title), '/tests/' . $audience, true)
                    ->add(UTF8::ucfirst($title), '/' . $audience, true);

                $crumbs = $breadcrumbs->render();

                $content = View::factory('index/tests/v_test')
                    ->bind('test_id', $test_id)
                    ->bind('test_title', $title)
                    ->bind('tasks', $tasks)
                    ->bind('tmp', $tmp)
                    ->bind('breadcrumbs', $crumbs);
                $this->template->title = $test->title . " /testy";
            }
        }

        $this->template->content = $content;
        $this->template->scripts[] = 'media/js/qlty.core.js';
        $this->template->scripts[] = 'media/js/qlty.config.js';
        $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
        $this->template->scripts[] = 'media/js/qlty.ui.messager.js';
        $this->template->scripts[] = 'media/js/qlty.ui.notifier.js';
        $this->template->scripts[] = 'media/js/qlty.ui.tabs.js';
        $this->template->scripts[] = 'media/js/qlty.core.test.js';
        $this->template->scripts[] = 'media/js/test.js';
        $this->template->scripts[] = 'media/js/save-answer.js';
    }

    public function action_tests()
    {
        $audience = $this->request->param('audience');
        // Добавил третью аудиторию
        $audience_type = ($audience == 'university') ? 2 : (($audience == 'school') ? 1 : (($audience == 'iq') ? 3 : 0));
        $audiencetype = ORM::factory('Audiencetype', $audience_type);

        if ($audience_type === 0) {
            $content = View::factory('index/tests/v_tests_index');
            $this->template->title = "Testy | Тесты";
        } else {
            $tests = ORM::factory('Test')->where('audience_id', '=', $audience_type)->find_all();
            $sections = ORM::factory('Section')->where('audience_id', 'in', array(0, $audience_type))->find_all();
            $resp = array();
            foreach ($sections as $section) {
                $resp[$section->id] = array(
                    'title' => $section->title,
                    'tests' => $section->tests->find_all(),
                );
            }

            $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Тесты', '/tests', false)
                ->add(UTF8::ucfirst($audiencetype->title), '/tests/' . $audience, true);

            $crumbs = $breadcrumbs->render();

            $content = View::factory('index/tests/v_tests_common')
                ->bind('tests', $tests)
                ->bind('sections', $sections)
                ->bind('resp', $resp)
                ->bind('crumbs', $crumbs)
                ->bind('audience', $audience);
            if ($audience_type === 1) {
                $this->template->title = "Testy | Школьник";
            } else {
                if ($audience_type === 2) {
                    $this->template->title = "Testy | Студент";
                } else {
                    if ($audience_type === 3) {
                        $this->template->title = "Testy | Интеллектуал";
                    }
                }

            }
        }

        $this->template->content = $content;
        //$this->template->scripts[] = 'media/js/qualitester.js';
        $this->template->scripts[] = 'media/js/qlty.core.js';
        $this->template->scripts[] = 'media/js/qlty.ui.sectionstoggler.js';
        $this->template->scripts[] = 'media/js/tests-list.js';
    }

    public function action_check()
    {

        $this->template->set_filename('index/tests/v_check');

        if ($this->request->method() === Request::POST) {
            $data = Arr::extract($_POST, array('testId', 'answers', 'penalties', 'mode'));
        }
        print_r($data);
        $penalties = round(count($data['penalties']) / 2, 1);
        //var_dump($data);
        $right_answers = 0;
        $total_correct_task_answers = 0;
        $test = ORM::factory('Test', $data['testId']);
        $task = ORM::factory('Task');

                $task_option = ORM::factory('Option');
        $tmp = array();
        $result = array();


                // Костыль EQ теста
        $eq1 = 0;
        $eq2 = 0;
        $eq3 = 0;
        $eq4 = 0;
        $eq5 = 0;
        $i = 0;



                foreach ($data['answers'] as $answer_key => $answer) {
            $task->where('id', '=', $answer['taskId'])->find();
            $options = array();
            $total_correct_answers = 0;
            $total_answers = 0;
            $answers_counter = 0;


                    if (isset($answer['options'])) {

                        foreach ($answer['options'] as $key => $option) {

                            $is_task_correct = "0";

                            $task_option->where('id', '=', $option['optionId'])->find();
                    $answers_counter++;
                    $is_answered_correctly = "0";
                    $options[$key]['id'] = $task_option->id;
                    $options[$key]['text'] = $task_option->text;
                    $options[$key]['answer'] = $option['answer'];
                    $options[$key]['is_right'] = $task_option->is_right;
                    // Костыль для EQ теста 
                    if ($data['testId'] == 184) {
                        if (strcmp($options[$key]['answer'], 'false') != 0) {
                            $buf = (int) $options[$key]['answer'];
                            if ($buf == -3 || $buf == -2 || $buf == -1 || $buf == 1 || $buf == 2 || $buf == 3) {
                                if ($i < 6)
                                    $eq1 += $buf;
                                elseif ($i < 6)
                                    $eq1 += $buf;
                                elseif ($i < 12)
                                    $eq2 += $buf;
                                elseif ($i < 18)
                                    $eq3 += $buf;
                                elseif ($i < 24)
                                    $eq4 += $buf;
                                else
                                    $eq5 += $buf;

                                    }
                        }
                        $i++;
                    }


                            if ($task->type_id === '3') {
                        if (strlen($option['answer']) > 0) {
                            $total_answers++;
                        }
                        if (strcmp($task_option->text, $option['answer']) === 0) {
                            $total_correct_answers++;
                            $right_answers++;
                            $is_answered_correctly = "1";
                        }
                    } else {
                        if (filter_var($option['answer'], FILTER_VALIDATE_BOOLEAN)) {
                            $total_answers++;
                        }
                        if (filter_var($task_option->is_right, FILTER_VALIDATE_BOOLEAN) === filter_var($option['answer'], FILTER_VALIDATE_BOOLEAN)) {
                            $total_correct_answers++;
                            $right_answers++;
                            $is_answered_correctly = "1";
                        }
                    }

                            if ($answers_counter === $total_correct_answers) {
                        $is_task_correct = '1';
                    }

                            if ($option['answer'] != 'false' and strlen($option['answer']) > 0) {
                        if ($is_answered_correctly == '1') {
                            $options[$key]['user-answer-class'] = 'is-answered-correctly';
                        } else {
                            $options[$key]['user-answer-class'] = 'is-answered-wrong';
                        }
                    } else {
                        $options[$key]['user-answer-class'] = '';
                    }

                            if ($task_option->is_right === '1') {
                        $options[$key]['actual-answer-class'] = 'option-is-right';
                    } else {
                        $options[$key]['actual-answer-class'] = '';
                    }
                    //echo $task_option->is_right;

                            //var_dump($options);
                    $task_option->clear();
                }

                    }
            if ($is_task_correct === '1' && $data['testId'] != 184) {
                $total_correct_task_answers++;
            } elseif ($data['testId'] == 184) {
                $EQ = substr($option['answer'], 0, 1);
                $total_correct_task_answers += (int) $EQ;
            }


                    $v = View::factory('index/tasks/v_task_check')
                ->bind('options', $options)
                ->bind('task', $task)
                ->bind('is_task_correct', $is_task_correct)
                ->bind('total_answers', $total_answers)
                ->bind('answer_key', $answer_key)
                ->render();

                    array_push($tmp, $v);
            $task->clear();
        }
        $result['total_tasks'] = $test->tasks->find_all()->count();
        $result['total_correct_task_answers'] = $total_correct_task_answers;
        $result['penalties'] = $penalties;
        $result['mode'] = $data['mode'];
        $IQorEQ = $this->request->param('audience');
        if ($result['total_correct_task_answers'] >= $penalties) {

                    // Проверка на IQ
            // IQ Test Словесный
            if ($data['testId'] == 185) {
                $result['mark'] = round(90 + ($result['total_correct_task_answers']) * 2.5);
            }
            // IQ Test Числовой
            elseif ($data['testId'] == 186) {
                $result['mark'] = round(72.5 + ($result['total_correct_task_answers']) * 2.5);
            }
            // ШQ Test - Наглядно-Образный
            elseif ($data['testId'] == 187) {
                $result['mark'] = round(81.43 + ($result['total_correct_task_answers']) * 1.42);
            }
            // EQ Test КОСТЫЛЬ ДЛЯ НАН. Удалить вместе с тестом блять нахуй
            elseif ($data['testId'] == 184) {
                echo '<div style="text-align: center"><span class="flaged">Уровень эмоциональной осведомленности: <span class="result"><b>';
                if ($eq1 >= 14)
                    echo 'высокий';
                elseif ($eq1 >= 8 && $eq1 <= 13)
                    echo 'средний';
                else
                    echo 'низкий';

                        echo '</span></span></b><hr><span class="flaged">Уровень управления своими эмоциями: <span class="result"><b>';
                if ($eq2 >= 14)
                    echo 'высокий';
                elseif ($eq2 >= 8 && $eq2 <= 13)
                    echo 'средний';
                else
                    echo 'низкий';

                        echo '</span></span></b><hr><span class="flaged">Уровень самомотивации: <span class="result"><b>';
                if ($eq3 >= 14)
                    echo 'высокий';
                elseif ($eq3 >= 8 && $eq3 <= 13)
                    echo 'средний';
                else
                    echo 'низкий';

                        echo '</span></span></b><hr><span class="flaged">Уровень эмпатии: <span class="result"><b>';
                if ($eq4 >= 14)
                    echo 'высокий';
                elseif ($eq4 >= 8 && $eq4 <= 13)
                    echo 'средний';
                else
                    echo 'низкий';

                        echo '</span></span></b><hr><span class="flaged">Уровень управления эмоциями других людей: <span class="result"><b>';
                if ($eq5 >= 14)
                    echo 'высокий';
                elseif ($eq5 >= 8 && $eq5 <= 13)
                    echo 'средний';
                else
                    echo 'низкий';

                        $result['mark'] = $eq1 + $eq2 + $eq3 + $eq4 + $eq5;

                        echo '</span></span></b><br><hr><br><span class="flaged" style="font-size: 24px">Общий интегративный уровень: <span class="result"><b>';
                if ($result['mark'] >= 70)
                    echo 'высокий';
                elseif ($result['mark'] <= 69 && $result['mark'] >= 40)
                    echo 'средний';
                else
                    echo 'низкий';
                echo '</span></span></div>';
            } else {
                $result['mark'] = round((($result['total_correct_task_answers'] - $penalties) / $result['total_tasks']) * 10);
            }
        } else {
            $result['mark'] = 0;
        }

                $helpToTest = ORM::factory('HelpToTest')
            ->where('test_id', '=', $data['testId'])
            ->find();
        $domain = 'http://helpy.quali.me/';

                if (null !== $helpToTest->id) {
            $json = $helpToTest->helpy_id;
            $division = json_decode($json, true);
            $divisionKey = key($division);

                    $audienceType = (int) $helpToTest->audience_id;
            if ($audienceType === 1) {
                $audience = 'school';
            } elseif ($audienceType === 2) {
                $audience = 'university';
            }
        }
        if (!empty($audience)) {
            $link = $domain . $divisionKey . '/' . $audience . '/' . $division[$divisionKey];
        } else {
            $link = $domain;
        }

                $content = View::factory('index/tests/v_test_check')
            ->bind('test_id', $data['testId'])
            ->bind('tasks', $tasks)
            ->bind('result', $result)
            ->bind('link', $link)
            ->bind('laptop', $helpToTest)
            ->bind('tmp', $tmp);

                /*saving*/

                //     $date = date_create();
//     date_format(date_create(), 'dd.m.Y????');

                $this->saveResult($data['testId'], $result['mark'], $content);

                /*
           $user_id = 11;
           $answer = ORM::factory('Answer');
           $answer_option = ORM::factory("Answeroption");

                   $answer->values(array(
               'test_id' => $data['testId'],
               'user_id' => $user_id,
               'mark' => '55'
           ));
           $answer->save();
           var_dump($data);
           foreach ($data['answers'] as $answer)
           {

                       foreach ($answer['options'] as $option) {

                       $answer_option->values(array(
                   'option_id' => $option['optionId'],
                   'answer' => $option['answer']
               ));
               $answer_option->save();		
               $answer_option->clear();
               }

                   }
           */
        $this->template->content = $content;
    }

    private function saveResult($testId, $mark, $htmlResult)
    {
        $user = Auth::instance()->get_user();
        if (Auth::instance()->logged_in('student')) {
            $student = $user->student;
            $existingResult = ORM::factory('Testresult')->where('test_id', '=', $testId)->where('student_id', '=', $student->id)->find();
            if (!$existingResult->loaded()) {
                $testResult = ORM::factory('Testresult');
                $testResult->student = $student;
                $testResult->test = ORM::factory('Test', $testId);
                $testResult->mark = $mark;
                $testResult->html_result = $htmlResult;
                $testResult->date = date("Y-m-d H:i:s");
                $testResult->save();
            }
        }
    }

}