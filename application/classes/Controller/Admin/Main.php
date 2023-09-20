<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Main extends Controller_Admin {


    // Do not allow to run in production
    const ALLOW_PRODUCTION = FALSE;


    public function action_index()
    {
        // try{
        //     // if (!Auth::instance()->logged_in('admin'))
        //     // {
        //     //     throw new Kohana_HTTP_Exception_403("You have no permission to be here");
        //     // }
        //     // Display the install page
        // }
        // catch(Kohana_HTTP_Exception_403 $e)
        // {
        //     $this->request->status = 403;
        //     echo "ERROR!";
        //     echo $e->getMessage();
        // }
        $this->template->content = View::factory('admin/main');
        $this->template->title = "Админка";
    }

    public function action_verification()
    {
        // try{
        //     // if (!Auth::instance()->logged_in('admin'))
        //     // {
        //     //     throw new Kohana_HTTP_Exception_403("You have no permission to be here");
        //     // }
        //     // Display the install page
        // }
        // catch(Kohana_HTTP_Exception_403 $e)
        // {
        //     $this->request->status = 403;
        //     echo "ERROR!";
        //     echo $e->getMessage();
        // }

        $users = ORM::factory('User')
            ->join('roles_users')
            ->on('roles_users.user_id','=','user.id')
            ->where('roles_users.role_id','=','3')
            ->order_by('verification')
            ->find_all()
            ->as_array();
        $table = View::factory('admin/v_verification')
            ->bind('users', $users);
        $this->template->content = $table;
    }
/*
    public function create()
    {
        $this->template->title = 'Create User';

        $form = array(
            'email'		=>		'',
            'username'	=>		'',
        );
        $errors = array();

        if ($_POST)
        {
            // Create new user
            $user = ORM::factory('user');

            $user->validate ($_POST);
            $errors = $_POST->errors();

            if (count($errors) == 0)
            {
                $user->add(ORM::factory('role', 'login'));
                $user->add(ORM::factory('role', 'admin'));

                if ($user->save()) {
                    Auth::instance()->login($user, $_POST->password);

                    // Redirect to the login page
                    url::redirect('auth_demo/login');
                }
            } else {
                $form = $_POST->as_array();
                $errors = $_POST->errors();
            }
        }

        $this->template->content = View::factory('auth/create');
        $this->template->content->form = $form;
        $this->template->content->errors = $errors;
    }

    public function login()
    {
        if (Auth::instance()->logged_in())
        {
            $this->template->title = 'User Logout';
            $this->template->content = View::factory('auth/logout');
        }
        else
        {
            $form = array(
                'username'		=> ''
            );
            $errors = array();

            $this->template->title = 'User Login';

            $user = ORM::factory('user');

            if ($_POST)
            {
                $user->login($_POST, 'auth_demo/login');

                $errors = $_POST->errors();
                $form = $_POST->as_array();
            }

            $this->template->content = View::factory('auth/login');
            $this->template->content->form = $form;
            $this->template->content->errors = $errors;
        }
    }

    public function logout()
    {
        // Force a complete logout
        Auth::instance()->logout(TRUE);

        // Redirect back to the login page
        url::redirect('auth_demo/login');
    }*/
    /*
    // Главная страница
    public function action_index()
    {
        $content = View::factory('/admin/show');
        $this->template->content = $content;
    }
    */


} // End Main