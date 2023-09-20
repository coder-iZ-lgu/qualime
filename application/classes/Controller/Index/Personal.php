<?php


class Controller_Index_Personal extends Controller_Index
{
    public function action_classes()
    {
        if (Auth::instance()->logged_in('teacher')) {
            if (Auth::instance()->get_user()->verification == 1) {

                $user = Auth::instance()->get_user();
                $teacher = $user->teacher;

                $classes = ORM::factory('Class')->where('teacher_id', '=', $teacher->id)->find_all()->as_array();
                $table = View::factory('index/v_classes')->bind('classes', $classes);
                $this->template->content = $table;
            } else {
                Auth::instance()->logout();
                $this->redirect('/');
            }
        } else {
            $this->redirect('/');
        }
    }

    public function action_class()
    {
        if (Auth::instance()->logged_in('teacher')) {
            $teacherId = Auth::instance()->get_user()->teacher->id;
            $verification = Auth::instance()->get_user()->verification;
            if ($verification==1) {
                $classId = (int)$this->request->param('id');
                $class = ORM::factory('Class')
                    ->where('teacher_id', '=', $teacherId)
                    ->where('id', '=', $classId)
                    ->find();
                if (!$class->loaded()) {
                    throw new HTTP_Exception_404("Страница не найдена.");
                } else {
                    $this->template->scripts[] = 'media/js/qlty.core.js';
                    $this->template->scripts[] = 'media/js/qlty.config.js';
                    $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
                    $students = ORM::factory('Student')
                        ->where('class_id', '=', $classId)
                        ->find_all()
                        ->as_array();
                    $table = View::factory('index/v_students')->bind('students', $students)->bind('class', $class);
                    $this->template->content = $table;
                }
            } else {
                $this->template->content = '';
            }
        }else {
            $this->redirect('/');
        }
    }

    public function action_results()
{ if (Auth::instance()->logged_in('teacher')) {
    $teacherId = Auth::instance()->get_user()->teacher->id;
    $verification = Auth::instance()->get_user()->verification;
    if ($verification==1) {
        $testId = (int)$this->request->param('id');
        $test = ORM::factory('Test', $testId);
        $classes = DB::select(
            array('classes.id', 'class_id'),
            array('classes.name', 'class_name'),
            array(DB::expr('AVG(tests_results.mark)'),
                'avg_mark')
        )
            ->from('classes')
            ->join('students')
            ->on('classes.id','=','students.class_id')
            ->join('tests_results')
            ->on('students.id','=','tests_results.student_id')
            ->where('tests_results.test_id','=',$testId)
            ->where('classes.teacher_id','=',$teacherId)
            ->group_by('classes.id')
            ->order_by('classes.name')
            ->execute();

        $table = View::factory('index/v_classes_results')
            ->bind('classes', $classes)
            ->bind('test',$test);
        $this->template->content = $table;
    } else {
        $this->template->content = '';}
} else {
    $this->redirect('/');
}
}

    public function action_class_results()
    {
        if (Auth::instance()->logged_in('teacher')) {
            $teacherId = Auth::instance()->get_user()->teacher->id;
            $verification = Auth::instance()->get_user()->verification;
            if ($verification == 1) {
                $classId = (int)$_GET['class_id'];
                $testId = (int)$_GET['test_id'];
                $class = ORM::factory('Class')
                    ->where('teacher_id', '=', $teacherId)
                    ->where('id', '=', $classId)
                    ->find();
                if (!$class->loaded()) {
                    throw new HTTP_Exception_404("Страница не найдена.");
                } else {
                    $this->template->scripts[] = 'media/js/qlty.core.js';
                    $this->template->scripts[] = 'media/js/qlty.config.js';
                    $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
                    $test = ORM::factory('Test',$testId);
                    $students = ORM::factory('Student')
                        ->where('class_id', '=', $classId)
                        ->find_all();
                    $testResults = ORM::factory('Testresult')
                        ->join('students')
                        ->on('students.id', '=', 'testresult.student_id')
                        ->where('students.class_id', '=', $classId)
                        ->where('test_id', '=', $testId)
                        ->find_all()
                        ->as_array();
                    $results = array();
                    foreach($students as $student) {
                        $testResult = array_values(array_filter($testResults, function($el) use ($student){return $el->student_id == $student->id;}));
                        $results[] = array(
                            'user_name' => $student->user->name,
                            'result_date' => !empty($testResult) ? $testResult[0]->date : '',
                            'result_mark' => !empty($testResult) ? $testResult[0]->mark : '',
                            'result_id' => !empty($testResult) ? $testResult[0]->id : '',
                        );
                    }
                    usort($results, function($a, $b){return $a['user_name'] >= $b['user_name'];});

                    $table = View::factory('index/v_test_results')
                        ->bind('results', $results)
                        ->bind('test',$test)
                        ->bind('class',$class);

                    $this->template->content = $table;
                }

            } else {
                $this->template->content = '';
            }
        } else {
            $this->redirect('/');
        }
    }

    public function action_class_tests()
    { if (Auth::instance()->logged_in('teacher')) {
        $teacherId = Auth::instance()->get_user()->teacher->id;
        $verification = Auth::instance()->get_user()->verification;
        if ($verification==1) {
            $classId = (int)$this->request->param('id');
            $class = ORM::factory('Class', $classId);
            $tests = DB::select(
                array('tests.id', 'test_id'),
                array('tests.title', 'test_title'),
                array(DB::expr('AVG(tests_results.mark)'),
                    'avg_mark')
            )
                ->from('tests')
                ->join('tests_results')
                ->on('tests_results.test_id', '=', 'tests.id')
                ->join('students')
                ->on('tests_results.student_id', '=', 'students.id')
                ->where('students.class_id', '=', $classId)
                ->group_by('tests.id')
                ->execute();

            $table = View::factory('index/v_class_tests')
                ->bind('tests', $tests)
                ->bind('class',$class);
            $this->template->content = $table;
        } else {
            $this->template->content = '';}
    } else {
        $this->redirect('/');
    }
    }

    public function action_my_results()
    {
        if (Auth::instance()->logged_in('student')) {
            $studentId = Auth::instance()->get_user()->student->id;
            $studentName = Auth::instance()->get_user()->name;
            $this->template->scripts[] = 'media/js/qlty.core.js';
            $this->template->scripts[] = 'media/js/qlty.config.js';
            $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
                $myresults = ORM::factory('Testresult')->where('student_id', '=', $studentId)->find_all()->as_array();

                $table = View::factory('index/v_my_results')->bind('myresults', $myresults)->bind('student_name',$studentName);

                $this->template->content = $table;
            }else {
            $this->redirect('/');
        }
    }
}