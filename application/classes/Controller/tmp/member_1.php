<?php defined('SYSPATH') or die('No direct access allowed.');
// Описание класса
class Controller_Member extends Controller {

    public function action_index()
    {
        // Тут можно сделать ссылки на вход и регистрацию
        echo 'Hello, noname!';
    }

    // Регистрация пользователей
    public function action_register()
    {
        // Если есть данные, присланные методом POST
        if ($_POST)
        {
            // Создаем переменную, отвечающую за связь с моделью данных User
            $model = ORM::factory('user');

            // Вносим в эту переменную значения, переданные из POST
            $model->values(array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'password_confirm' => $_POST['password_confirm'],
            ));
            try
            {
                // Пытаемся сохранить пользователя (то есть, добавить в базу)
                $model->save();
                // Назначаем ему роли
                $model->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
                // И отправляем его на страницу пользователя
                //$this->request->redirect('member/view/');
                HTTP::redirect('login');
            }
            catch (ORM_Validation_Exception $e)
            {
                // Это если возникли какие-то ошибки
                echo $e;
            }
        }
        // Загрузка формы логина
        $this->response->body(View::factory('auth/register'));
    }

    // Просмотр пользовательских данных
    public function action_view()
    {
        // Проверям, залогинен ли пользователь
        if(Auth::instance()->logged_in())
        {
            // Если да, то здороваемся и предлагаем выйти. Это можно было и в виде view реализовать
            echo 'Добро пожаловать, '.Auth::instance()->get_user()->username.'!';
            echo '<br /><a href=\'logout\'>logout</a>';
        }
        else
        {
            // А если он не залогинен, отправляем логиниться
            //return $this->request->redirect('member/login');
            return HTTP::redirect('member/login');
        }

    }

    // Метод разлогивания
    public function action_logout()
    {
        // Пытаемся разлогиниться
        if (Auth::instance()->logout())
        {
            // Если получается, то предлагаем снова залогиниться
            //return $this->request->redirect('member/login');
            return HTTP::redirect('');
        }
        else
        {
            // А иначе - пишем что не удалось
            echo 'fail logout';
        }
    }

    // Метод логина
    public function action_login()
    {

        // Проверям, вдруг пользователь уже зашел
        if(Auth::instance()->logged_in())
        {
            // И если это так, то отправляем его сразу на страницу пользователей
            //return $this->request->redirect('member/view');
            HTTP::redirect('');
        }

        // Если же пользователь не зашел, но данные на страницу пришли, то:
        if ($_POST)
        {
            // Создаем переменную, отвечающую за связь с моделью данных User
            $user = ORM::factory('user');
            // в $status помещаем результат функции login
            $status = Auth::instance()->login($_POST['username'], $_POST['password']);
            // Если логин успешен, то
            if ($status)
            {
                // Отправляем пользователя на его страницу
                //$this->request->redirect('member/view');
                HTTP::redirect('');
            }
            else
            {
                // Иначе ничего не получилось, пишем failed
                echo 'failed';
            }
        }
        // Грузим view логина
        $this->response->body(View::factory('user/login'));
    }

}
