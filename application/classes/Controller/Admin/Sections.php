<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Sections extends Controller_Admin {

    // Do not allow to run in production
    const ALLOW_PRODUCTION = FALSE;

    public function action_index()
    {
        // Добавил 3 секцию
        $audience = ($this->request->param('audience') == 'school') ? 1 : ($this->request->param('audience') == 'university') ? 2 : 3;
        $audiencetype = ORm::factory('Audiencetype', $audience);

        $breadcrumbs = Breadcrumb::factory('index/page/v_breadcrumbs')
                ->add('Админка', '/admin', false)
                ->add('Тесты', '/admin/tests/', true)
                ->add(UTF8::ucfirst($audiencetype->title), '/admin/tests/'.$audiencetype->alias, true)
                ->add('Управление разделами', 'admin/sections/'.$audiencetype->alias, true);

        $crumbs = $breadcrumbs->render();

        $sections = ORM::factory('Section')->where('audience_id', 'in', array(0,$audience))->find_all();
        $content = View::factory('admin/tests/v_tests_sections')
            ->bind('sections', $sections)
            ->bind('audience_type', $audience)
            ->bind('crumbs', $crumbs);
	
        $this->template->content = $content;
        $this->template->title = "Управление / QualiTesty";
        $this->template->scripts[] = 'media/js/qlty.core.js';
        $this->template->scripts[] = 'media/js/qlty.config.js';
        $this->template->scripts[] = 'media/js/qlty.ui.modal.js';
        $this->template->scripts[] = 'media/js/qlty.core.sections.js';
        $this->template->scripts[] = 'media/js/sections.js';
    }

}