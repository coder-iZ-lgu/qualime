<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Авторизация
 */
class Controller_Index_Auth extends Controller_Index
{

    public function action_index()
    {
        $this->action_login();
    }

    public function action_login()
    {

        if (Auth::instance()->logged_in()) {
            HTTP::redirect('/');
        }

        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('username', 'password', 'remember'));



            // HTTP::redirect('admin');

            // Проверка активности пользователя по полю verification
            $user = ORM::factory('User')
                ->where('username', '=', $data['username'])
                ->find();

            if ($user->loaded() && $user->verification == 1) {
                $status = Auth::instance()->login($data['username'], $data['password'], $data['remember']);
                if ($status) {
                    print_r("status");
                    if (Auth::instance()->logged_in('admin')) {
                        print_r("admin");
                        HTTP::redirect('admin');
                    } else if (Auth::instance()->logged_in('login')) {
                        //HTTP::redirect('/user/profile');
                        HTTP::redirect('/');
                    } else {
                        HTTP::redirect('/');
                    }
                } else {

                    print_r("unstatus");
                    $errors = array(Kohana::message('auth/user', 'no_user'));
                }
            } else {

                //$errors = array(Kohana::message('auth/user', 'no_user'));
                $errors = array('Пользователь не найден');
            }
        }

        $content = View::factory('index/auth/v_auth_login')
            ->bind('errors', $errors)
            ->bind('data', $data);

        // Выводим в шаблон
        $this->template->title = 'Вход';
        $this->template->page_title = 'Вход';
        $this->template->content = $content;
    }

    public function action_register()
    {

        if (isset($_POST['submit'])) {
            $data = Arr::extract($_POST, array('username', 'email', 'password', 'password_confirm', 'name', 'school', 'captcha'));
            $users = ORM::factory('User');

            if (Captcha::valid($_POST['captcha'])) {
                //TODO : validate fields before create_user
                $errors = array();
                try {
                    if (empty($_POST['school'])) {
                        $errors['school'] = 'Поле Учебное заведение не заполнено';
                    } else {
                        $users->create_user(
                            $this->request->post(),
                            array(
                                'username',
                                'password',
                                'email',
                                'name',
                            )
                        );
                        $role = ORM::factory('Role')->where('name', '=', 'login')->find();
                        $users->add('roles', $role);
                        $role = ORM::factory('Role')->where('name', '=', 'teacher')->find();
                        $users->add('roles', $role);

                        $teacher = ORM::factory('Teacher');
                        $teacher->user = $users;
                        $teacher->school = htmlspecialchars($data['school']);
                        $teacher->save();

                        // $this->action_login();

                        HTTP::redirect('/register/?res=ok');
                    }
                } catch (ORM_Validation_Exception $e) {
                    $errors += $e->errors('auth');
                    if (isset($errors['_external'])) {
                        $errors = Arr::merge($errors, $errors['_external']);
                        unset($errors['_external']);
                    }
                }
            } else {
                $errors['captcha'] = "Неправильно введён текст с картинки.";
            }
        }
        /*
            $countries = ORM::factory('Country')->order_by('name', 'asc')->find_all()->as_array('country_id', 'name');
            $countries =  Arr::unshift($countries,'-1', '');
            $country = -1;

            $country1 = ORM::factory('Country', 3);
            $cities = $country1->cities->order_by('city', 'asc')->find_all()->as_array(null, 'city');
            $city = 1;
        */
        $captcha = Captcha::instance();
        $result = '';
        if (isset($_GET['res'])) {
            $result = 'ok';
        }

        $content = View::factory('index/auth/v_auth_register')
            ->bind('result', $result)
            ->bind('errors', $errors)
            ->bind('data', $data)
            ->bind('captcha', $captcha);
        /* ->bind('countries', $countries)
         ->bind('country', $country)
         ->bind('cities', $cities)
         ->bind('city', $city);
*/
        // Выводим в шаблон
        $this->template->scripts[] = 'media/js/tmpl.js';
        //$this->template->scripts[] = 'media/js/qlty-register.js';
        $this->template->title = 'Регистрация';
        $this->template->page_title = 'Регистрация';
        $this->template->content = $content;
    }

    public function action_logout()
    {
        if (Auth::instance()->logout()) {
            HTTP::redirect();
        }
    }

}