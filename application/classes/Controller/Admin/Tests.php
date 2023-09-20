<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Tests extends Controller_Admin {

    public function action_tests()
    {
        $audience = $this->request->param('audience');
        // Добавил 3 секцию
        $audience_type = ($audience == 'university') ? 2 : (($audience == 'school') ? 1 : (($audience == 'iq') ? 3 : 0));
        $audiencetype = ORM::factory('Audiencetype', $audience_type);
	
        if ($this->request->method() == Request::POST)
        {
            $data = Arr::extract($_POST, array( 'section_id'));
            $tests = ORM::factory('Test');

            if ($data['section_id'] != '0')
            {
            $tests = $tests->where('section_id', '=', $data['section_id']);
            }
            $tests = $tests->where('audience_id', '=', $audience_type)->find_all();
        }
        else
        {
            $tests = ORM::factory('Test')->where('audience_id', '=', $audience_type)->find_all();
        }

        if ($audience_type === 0)
        {
            $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Админка', 'admin/',false)
                ->add('Тесты', 'admin/tests', true);

            $crumbs = $breadcrumbs->render();

            $content = View::factory('admin/tests/v_tests_index')
                ->bind('crumbs', $crumbs);
        }
        else
        {
            $sections_items = ORM::factory('Section')->where('audience_id', '=', $audience_type)->find_all();
            $sections = array();

            $sections[0] = 'Все';
            foreach ($sections_items as $section_item){
            $sections[$section_item->id] = $section_item->title;
            }
            //$tests = ORM::factory('Test')->where('audience_id', '=', $audience_type)->find_all();
            //$sections = ORM::factory('Section')->where('audience_id', 'in', array(0,$audience_type))->find_all();
            /*
            $resp = array();
            foreach ($sections as $section)
            {
            $resp[$section->id] = array(
                'title' => $section->title,
                'tests' => $section->tests->find_all(),
            );
            }
        */
            $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Админка', 'admin/',false)
                ->add('Тесты', 'admin/tests', false)
                ->add(UTF8::ucfirst($audiencetype->title), '/tests/'.$audience, true);

            $crumbs = $breadcrumbs->render();

            $content = View::factory('admin/tests/v_tests_common')
                ->bind('tests', $tests)
                ->bind('sections', $sections)
                ->bind('data',$data)
                ->bind('crumbs', $crumbs)
                ->bind('audience', $audience)
                ->bind('audience_type', $audience_type);
        }

        $this->template->content = $content;

        if ($audience_type === 1) {
            $this->template->title = "Школьнику / QualiTesty";
        }
        else {
            if ($audience_type === 2) {
                $this->template->title = "Студенту / QualiTesty";
            }
            else {
                $this->template->title = "Тесты / QualiTesty";
            }
        }

        //$this->template->scripts[] = 'media/js/qualitester.js';


        /*
        $audience_types = ORM::factory('Audiencetype')->find_all();
        $audience = array();

        $audience[0] = 'Все';
            foreach ($audience_types as $audience_type){
                $audience[$audience_type->id] = $audience_type->title;
            }

        $sections_items = ORM::factory('Section')->find_all();
        $sections = array();

        $sections[0] = 'Все';
        foreach ($sections_items as $section_item){
                $sections[$section_item->id] = $section_item->title;
            }

        if ($this->request->method() == Request::POST)
        {
            $data = Arr::extract($_POST, array('audience_id', 'section_id'));
            $tests = ORM::factory('Test');

            if ($data['audience_id'] != '0')
            {
            $tests = $tests->where('audience_id', '=', $data['audience_id']);
            }
            if ($data['section_id'] != '0')
            {
            $tests = $tests->where('section_id', '=', $data['section_id']);
            }
            $tests = $tests->find_all();
        }
        else
        {
            $tests = ORM::factory('Test')->find_all();
        }

            $content = View::factory('admin/tests/v_tests_index')
                    ->bind('tests', $tests)
            ->bind('audience', $audience)
            ->bind('sections', $sections)
            ->bind('data', $data);

            $this->template->content = $content;*/
            /*
            $tests = array();
            $content = View::factory('/admin/tests')
                ->bind('tests', $tests);
            $tests = Model::factory('Test')->get_all();
            $this->template->content = $content;
            $this->template->title = "Тесты";
            $this->template->description = "Описание";
    */
        }
        /*
        public function action_sections()
        {
        $audience = $this->request->param('id');
        $sections = ORM::factory('Section')->where('audience_id', 'in', array(0,$audience))->find_all();
        $content = View::factory('admin/tests/v_tests_sections')
            ->bind('sections', $sections)
            ->bind('audience_type', $audience);
            $this->template->content = $content;
        }
        */
        /*
        public function action_create()
        {
        $audience_id = (int) $this->request->param('id') == 'school' ? 1 : 2;
        $audience_types = ORM::factory('Audiencetype')->find_all();
        $audience = array();

            foreach ($audience_types as $audience_type){
                $audience[$audience_type->id] = $audience_type->title;
            }

        $sections_items = ORM::factory('Section')->find_all();
        $sections = array();

        foreach ($sections_items as $section_item){
                $sections[$section_item->id] = $section_item->title;
            }

            if (isset($_POST['submit'])) {
                $data = Arr::extract($_POST, array('title', 'audience_id', 'section_id', 'author', 'description'));
            $test = ORM::factory('Test');
            $test->values($data);

             try {
                    $test->save();
            //$products->add('categories', $data['cat']);

            HTTP::redirect('admin/tests/');
                }
                catch (ORM_Validation_Exception $e) {
                    $errors = $e->errors('validation');
                }
            }

        $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Админка', 'admin/',false)
                ->add('Тесты', 'admin/tests', false)
                ->add(UTF8::ucfirst($audiencetype->title), '/tests/'.$audience, false)
                ->add('Создание теста', '/tests/'.$audience, true);

        $crumbs = $breadcrumbs->render();

            $content = View::factory('admin/tests/v_tests_create')
            ->bind('data', $data)
            ->bind('audience', $audience)
            ->bind('sections', $sections)
            ->bind('crumbs', $crumbs);
            $this->template->content = $content;
        }
        */

    public function action_create()
    {
        // Добавил 3 секцию
        $audience_id = (($this->request->param('id') == 'school') ? 1 : ($this->request->param('id') == 'university')? 2 : 3);
        $audience = ORM::factory('Audiencetype', $audience_id);

        $sections_items = ORM::factory('Section')->where('audience_id', '=', $audience_id)->find_all();
        $sections = array();

        foreach ($sections_items as $section_item){
                $sections[$section_item->id] = $section_item->title;
            }

            if (isset($_POST['submit'])) {
                $data = Arr::extract($_POST, array('title', 'audience_id', 'section_id', 'author', 'description'));
                $audience = ORM::factory('Audiencetype', $data['audience_id']);

                $test = ORM::factory('Test');
                $test->values($data);

                 try {
                        $test->save();
                    //HTTP::redirect('admin/tests/');
                    HTTP::redirect('/admin/tests/'.$audience->alias);
                 }

                 catch (ORM_Validation_Exception $e) {
                    $errors = $e->errors('validation');
                 }
             }

        $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Админка', 'admin/',false)
                ->add('Тесты', 'admin/tests', false)
                ->add(UTF8::ucfirst($audience->title), '/tests/'.$audience->alias, false)
                ->add('Создание теста', '/tests/'.$audience, true);

        $crumbs = $breadcrumbs->render();

        $content = View::factory('admin/tests/v_tests_create')
            ->bind('data', $data)
            ->bind('audience', $audience)
            ->bind('sections', $sections)
            ->bind('crumbs', $crumbs);

        $this->template->content = $content;
        $this->template->title = "Создание теста / QualiTesty";
    }
    
    public function action_edit()
    {
        $id = (int) $this->request->param('id');
        $test = ORM::factory('Test', $id);

        if(!$test->loaded()){
	    HTTP::redirect('admin/tests');
        }

        $tasks = $test->tasks->find_all();

        //TODO: move to external heler class
        $audience_types = ORM::factory('Audiencetype')->find_all();
        $audience = array();

            foreach ($audience_types as $audience_type){
                $audience[$audience_type->id] = $audience_type->title;
            }

        $sections_items = ORM::factory('Section');
        $sections = array();

        foreach ($sections_items->where('audience_id', '=', $test->audience->id)->find_all() as $section_item){
                $sections[$section_item->id] = $section_item->title;
            }

        foreach ($sections_items->where('audience_id', '=', '1')->find_all() as $section)
        {
            $sections_school[$section->id] = $section->title;
        }

        foreach ($sections_items->where('audience_id', '=', '2')->find_all() as $section)
        {
            $sections_university[$section->id] = $section->title;
        }
        $data = $test->as_array();
        
        // Редактирование
        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('title', 'audience_id', 'section_id', 'author', 'description'));
            $test->values($data);

            try {
                $test->save();
                HTTP::redirect('/admin/tests/edit/'.$id);
            }
            catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('validation');
            }
        }
	
        $content = View::factory('admin/tests/v_tests_edit')
                ->bind('id', $id)
                ->bind('errors', $errors)
                ->bind('data', $data)
		->bind('audience', $audience)
		->bind('sections', $sections)
		->bind('sections_school', $sections_school)
		->bind('sections_university', $sections_university)
		->bind('tasks', $tasks);

        $this->template->content = $content;
        $this->template->title = $test->title . ' / QualiTesty';
	
        $this->template->scripts[] = 'media/js/qlty.core.js';
        $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
        $this->template->scripts[] = 'media/js/qlty.ui.messager.js';
        $this->template->scripts[] = 'media/js/qlty.ui.notifier.js';
        $this->template->scripts[] = 'media/js/qlty.config.js';
        $this->template->scripts[] = 'media/js/qlty.core.utils.js';
        //$this->template->scripts[] = 'media/js/qlty.core.test.js';
        $this->template->scripts[] = 'media/js/qlty.core.test.edit.js';
        $this->template->scripts[] = 'media/js/qlty.ui.formularenderer.js';
        $this->template->scripts[] = 'media/js/qlty.ui.taskeditor.js';
        $this->template->scripts[] = 'media/js/qlty.ui.imageuploader.js';
        $this->template->scripts[] = 'media/js/qlty.ui.slider.js';
        $this->template->scripts[] = 'media/js/qlty.ui.tabs.js';
        $this->template->scripts[] = 'media/js/test-edit.js';

        //$this->template->scripts[] = 'media/js/qualitester.js';
        $this->template->scripts[] = 'media/js/jquery.form.min.js';
        //$this->template->scripts[] = 'media/js/nicedit/nicEdit.js';

        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/bkLib.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicConfig.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicCore.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicInstance.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicIFrameInstance.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicPanel.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicButton.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicCore/nicPlugin.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicPane/nicPane.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicSelect/nicSelect.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicButtonTips/nicButtonTips.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicAdvancedButton/nicAdvancedButton.js';

        $this->template->scripts[] = 'media/js/nicedit_src/nicCode/nicCode.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicLink/nicLink.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicImage/nicImage.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicColors/nicColors.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicInsertImage/nicInsertImage.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicInsertFormula/nicInsertFormula.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicXHTML/nicXHTML.js';
        $this->template->scripts[] = 'media/js/nicedit_src/nicBBCode/nicBBCode.js';
    }
    
    public function action_delete()
    {
        $id = (int ) $this->request->param('id');
        $test = ORM::factory('Test', $id);

        if ($test->loaded())
        {
            try
            {
            $tasks = $test->tasks->find_all();
            foreach ($tasks as $task)
            {
                foreach ($task->options->find_all() as $option)
                {
                $option->delete();
                }
                $task->delete();
            }
            $test->delete();
            }
            catch (ORM_Validation_Exception $e)
            {}
        }

        HTTP::redirect(Request::current()->referrer());
        $this->template->content = 'delete test ' . $this->request->param('id');
    }
    
    /*
    public function action_tests()
    {
        
    }*/
    /*
    public function action_test()
    {
        $id = $this->request->param('id');

        $content = View::factory('/admin/test')
            ->bind('tasks', $tasks);

        $tasks = Model::factory('Test')->get_test($id);

        $this->template->content = $content;
    }*/

    public function action_addtest()
    {
        array_push($this->template->scripts, 'tests');
        $content = View::factory('/admin/addtest');
        if($_POST){
            $str = print_r($_POST);
            $content .= $str;
        }
        $this->template->content = $content;
    }
} // Articles