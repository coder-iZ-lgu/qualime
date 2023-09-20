<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
    /*
        public function  before() {
            if($this->request->is_initial())
            {
                HTTP_Exception_404('File not found');
            }
        }
      */
    public function action_task()
    {
        $id = (int) $this->request->param('id');
        $task = ORM::factory('Task', $id);

        if ($this->request->method() === 'POST' and isset($_POST)) {

            $data = Arr::extract($_POST, array('test_id', 'type_id', 'main_text', 'actualization_text', 'solution_text', 'attention_text', 'options'));
            $options = ORM::factory('Option')->where('task_id', '=', $id)->find_all();

            foreach ($options as $option) {
                $option->delete();
            }

            if (!$id) {
                $task = ORM::factory('Task');
            }

            $task->values($data);
            $task->save();

            try {

                $response = array('state' => 1);
            } catch (ORM_Validation_Exception $e) {

                $response = array('state' => 0, 'error' => $e->errors());
            }

            $this->response->body(json_encode($response));

        } else {
            $task_types = ORM::factory('Tasktype')->find_all();
            $options = $task->options->find_all();

            $response = array();
            foreach ($task_types as $key => $task_type) {
                $response['task_types'][$key]['id'] = $task_type->id;
                $response['task_types'][$key]['type'] = $task_type->type;
                $response['task_types'][$key]['description'] = $task_type->description;
                $response['task_types'][$key]['short_name'] = $task_type->short_name;
            }
            $response['task']['id'] = $id;
            $response['task']['type'] = $task->type_id;
            $response['task']['main_text'] = $task->main_text;
            $response['task']['actualization_text'] = $task->actualization_text;
            $response['task']['solution_text'] = $task->solution_text;
            $response['task']['attention_text'] = $task->attention_text;
            foreach ($options as $key => $option) {
                $response['options'][$key]['value'] = $option->text;
                $response['options'][$key]['id'] = $option->id;
                $response['options'][$key]['is_right'] = $option->is_right;
            }
            $this->response->body(json_encode($response));
        }
    }

    public function action_tasktypes()
    {
        $task_types = ORM::factory('Tasktype')->find_all();

        $response = array();
        foreach ($task_types as $key => $task_type) {
            $response[$key]['id'] = $task_type->id;
            $response[$key]['type'] = $task_type->type;
            $response[$key]['description'] = $task_type->description;
            $response[$key]['short_name'] = $task_type->short_name;
        }
        $this->response->body(json_encode($response));
    }

    public function action_deletetask()
    {
        $id = (int) $this->request->param('id');
        $task = ORM::factory('Task', $id);
        $options = $task->options->find_all();

        try {
            foreach ($options as $option) {
                $option->delete();
            }
            $task->delete();
            $response = array('state' => 1);
        } catch (ORM_Validation_Exception $e) {
            $response = array('state' => 0);
        }

        $this->response->body(json_encode($response));
    }

    public function action_section()
    {
        $id = (int) $this->request->param('id');
        $section = ORM::factory('Section', $id);
        $response = View::factory('admin/tests/v_tests_section')
            ->bind('section', $section);
        $this->response->body($response);
    }

    public function action_addsection()
    {
        //$audience = ($this->request->param('id') == 'school') ? 1 : 2;
        $response = array('state' => 0);

        if (isset($_POST['title'])) {
            $data = Arr::extract($_POST, array('title', 'audience_id'));

            $section = ORM::factory('Section');
            $section->values($data);

            try {
                $section->save();
                $response = Request::factory('ajax/section/' . $section->id)->execute();
                //$response = array('state' => 1);
            } catch (ORM_Validation_Exception $e) {
            }
        }
        $this->response->body($response);
    }

    public function action_deletesection()
    {
        $id = (int) $this->request->param('id');
        $response = array('state' => 0);
        $section = ORM::factory('Section', $id);

        try {
            $section->delete();
            $response = array('state' => 1);
        } catch (ORM_Validation_Exception $e) {
            $response = array('state' => 0);
        }

        $this->response->body(json_encode($response));
    }

    public function action_editsection()
    {
        $id = (int) $this->request->param('id');
        $response = array('state' => 0);

        if (isset($_POST['title'])) {
            $section = ORM::factory('Section', $id);
            $section->title = $_POST['title'];

            try {
                $section->save();
                $response = Request::factory('ajax/section/' . $section->id)->execute();
            } catch (ORM_Validation_Exception $e) {
                $response = array('state' => 0);
            }
        }
        $this->response->body($response);
    }

    public function action_check_test()
    {

    }

    public function action_cities()
    {

        $id = (int) $this->request->param('id');
        $city = $_POST['city'];

        $country = ORM::factory('Сountry', $id);
        $data = $country->cities->where('city', 'like', $city . "%")->order_by('city', 'asc')->find_all()->as_array('id', 'city');
        /*
        foreach ($cities as $key => $city) {
            $data[$key]['id'] = $city['id'];
            $data[$key]['city'] = $city['city'];
        }
         *
         */
        //$data['cities'] = $cities->as_array('id');
        //$data['id'] = $cities->as_array('city');
        /*
        $content = View::factory('ajax/v_ajax_cities')
                    ->bind('cities', $cities)
                    ->bind('city', $id)
                    ->render();
         *
         */
        //$this->response->body($content)	;
        $this->response->body(json_encode($data));
    }

    public function action_addclass()
    {
        if (Auth::instance()->get_user('teacher')) {
            $teacherId = Auth::instance()->get_user()->teacher->id;
            $class = ORM::factory('Class');
            $class->name = htmlspecialchars($_POST['class_name']);
            $class->teacher = Auth::instance()->get_user()->teacher;
            $class->save();
            $classes = ORM::factory('Class')->where('teacher_id', '=', $teacherId)->find_all()->as_array();
            $table = View::factory('index/v_classes')->bind('classes', $classes);
            $this->response->body($table);
        } else {
            $this->response->body('');
        }
    }

    public function action_editclass()
    {
        if (Auth::instance()->get_user('teacher')) {
            $teacherId = Auth::instance()->get_user()->teacher->id;
            $classId = intval(htmlspecialchars($_POST['class_id']));
            $class = ORM::factory('Class', $classId);
            if ($class->loaded()) {
                $class->name = htmlspecialchars($_POST['edit_classname']);
                $class->save();
            }
            $this->response->body('');
        } else {
            $this->response->body('');
        }
    }

    public function action_removeclass()
    {
        if (Auth::instance()->get_user('teacher')) {
            $teacherId = Auth::instance()->get_user()->teacher->id;
            $classId = intval(htmlspecialchars($_POST['class_id']));
            $this->deleteClass($classId);
            //            $class = ORM::factory('Class',$classId);
//            $class->delete();
            $classes = ORM::factory('Class')->where('teacher_id', '=', $teacherId)->find_all()->as_array();
            $table = View::factory('index/v_classes')->bind('classes', $classes);
            $this->response->body($table);
        } else {
            $this->response->body('');
        }
    }

    public function action_addstudents()
    {
        $students = explode(',', htmlspecialchars($_POST['student_name']));
        if (intval($_POST['class_id']) > 0 && Auth::instance()->logged_in('teacher')) {
            $class = ORM::factory('Class', intval($_POST['class_id']));
            if ($class->loaded()) {
                if (isset($_POST['list_only'])) {
                    $students = ORM::factory('Student')
                        ->where('class_id', '=', intval($_POST['class_id']))
                        ->find_all()
                        ->as_array();
                    $table = View::factory('index/v_students')->bind('students', $students)->bind('class', $class);
                } else {
                    $students = $this->createStudentsBulk($students, $class->id);
                    $table = View::factory('index/v_students_pass')->bind('students', $students);
                }

                $this->response->body($table);
            } else {
                $this->response->body('');
            }
        } else {
            $this->response->body('');
        }

    }

    public function action_getresult()
    {
        $resultId = intval($_GET['result_id']);
        $result = ORM::factory('Testresult', $resultId);
        if ($result->loaded()) {
            $hasRights = (
                Auth::instance()->logged_in('student') &&
                Auth::instance()->get_user()->student->id == $result->student->id
            ) ||
                (
                    Auth::instance()->logged_in('teacher')
                    &&
                    Auth::instance()->get_user()->teacher->id == $result->student->class->teacher->id
                );
            if ($hasRights) {
                $this->response->body($result->html_result);
            }
        }
    }

    public function action_removeresult()
    {
        $resultId = intval($_POST['result_id']);
        if ($resultId > 0 && Auth::instance()->logged_in('teacher')) {
            $removeresult = ORM::factory('Testresult', $resultId);
            if ($removeresult->loaded()) {
                $removeresult->delete();
            }
        }
    }

    public function action_remove_student()
    {
        $studentId = intval($_POST['student_id']);
        if ($studentId > 0 && Auth::instance()->logged_in('teacher')) {
            $removestudent = ORM::factory('Student', $studentId);
            if ($removestudent->loaded()) {
                $removeuser = $removestudent->user;
                $class = $removestudent->class;
                $results = $removestudent->results->find_all();
                DB::delete('tests_results')
                    ->where('student_id', '=', $removestudent->id)
                    ->execute();
                foreach ($results as $result) {
                    $result->delete();
                }
                $removestudent->delete();
                $removeuser->delete();
                $students = ORM::factory('Student')
                    ->where('class_id', '=', $class->id)
                    ->find_all()
                    ->as_array();
                $table = View::factory('index/v_students')->bind('students', $students)->bind('class', $class);
                $this->response->body($table);
            } else {
                $this->response->body('');
            }
        } else {
            $this->response->body('');
        }
    }

    public function action_verify()
    {
        $userId = intval($_POST['user_id']);
        if ($userId > 0 && Auth::instance()->logged_in('admin')) {
            $user = ORM::factory('User', $userId);
            if ($user->loaded()) {
                if ($_POST['verify'] == 'true') {
                    $user->verification = 1;
                } else {
                    $user->verification = 0;
                }
                $user->save();
            }
        }
    }

    public function action_resetpassword()
    {
        $studentId = intval($_POST['student_id']);
        $student = ORM::factory('Student', $studentId);
        if (intval($_POST['class_id']) > 0 && Auth::instance()->logged_in('teacher')) {
            //$class = ORM::factory('Class', intval($_POST['class_id']));
            $new_pass = Helper::generatePassword();
            $student->user->password = $new_pass;
            $student->user->save();
            $table = View::factory('index/v_students_reset_pass')->bind('student', $student)->bind('password', $new_pass);
        }

        $this->response->body($table);
    }


    /**
     * Пакетное создание учеников. $names - массив имен на русском языке, class_id - класс, в который добавляем
     *
     * @param $names
     * @param $classId
     * @return array
     * @throws Kohana_Exception
     */
    private function createStudentsBulk($names, $classId)
    {
        $result = array();
        foreach ($names as $name) {
            $username = Helper::translit(trim($name));
            $count = 1;
            while (ORM::factory('User')->where('username', '=', $username)->find()->loaded()) {
                $username .= $count;
                $count++;
            }
            $password = Helper::generatePassword();
            $studentData = array(
                'name' => trim($name),
                'username' => $username,
                'password' => $password,
                'password_confirm' => $password,
                'email' => strtolower(Helper::generatePassword(8)) . '@' . strtolower(Helper::generatePassword(5)) . '.ru',
                'class_id' => $classId
            );
            $result[] = $studentData;
            $this->createStudent($studentData);
        }
        return $result;
    }

    /**
     * Программное создание нового пользователя.
     * В массив $options передаем username, name, password, email, role (роль пока только одна)
     *
     * @param $options
     * @return mixed
     * @throws Kohana_Exception
     */
    private function createUser($options)
    {
        $users = ORM::factory('User');
        $user = $users->create_user(
            array(
                'name' => $options['name'],
                'username' => $options['username'],
                'password' => $options['password'],
                'password_confirm' => $options['password'],
                'email' => isset($options['email']) ? $options['email'] : '',
                'verification' => 1
            ),
            array(
                'name',
                'username',
                'password',
                'email',
                'verification'
            )
        );

        // Привязываем роль
        if (isset($options['role'])) {
            $role = ORM::factory('Role')->where('name', '=', $options['role'])->find();
            $users->add('roles', $role);
        }
        // Добавляем пользователю роль "login", чтобы он мог залогиниться.
        $role = ORM::factory('Role')->where('name', '=', 'login')->find();
        $users->add('roles', $role);
        return $user;
    }

    /**
     * Создание нового ученика.
     * В массив передаем параметры username, name, password, email, class_id
     * @param $options
     * @throws Kohana_Exception
     */
    private function createStudent($options)
    {

        // Создаем ученика, создаем связи с классом и пользователем. Если класс не существует, ученик не создается.
        $class = ORM::factory('Class', $options['class_id']);
        if ($class->loaded()) {
            $options['role'] = 'student';
            $user = $this->createUser($options);
            $student = ORM::factory('Student');
            $student->user = $user;
            $student->class = $class;
            $student->save();
        }
    }

    /**
     * Удаление класса со всеми учениками и пользователями, связанными с учениками
     *
     * @param $classId
     * @throws Kohana_Exception
     */
    private function deleteClass($classId)
    {
        $class = ORM::factory('Class', $classId);
        if ($class->loaded()) {
            $students = $class->student->find_all();
            foreach ($students as $student) {
                $this->deleteStudent($student->id);
            }
            $class->delete();
        }
    }

    /**
     * Удаление ученика вместе с пользователем
     * @param $studentId
     * @throws Kohana_Exception
     */
    private function deleteStudent($studentId)
    {
        $student = ORM::factory('Student', $studentId);
        $results = ORM::factory('Testresult')->where('student_id', '=', $student->id)->find_all();

        foreach ($results as $result) {
            $result->delete();
        }

        $user = $student->user;
        $student->delete();
        $user->delete();
    }
}