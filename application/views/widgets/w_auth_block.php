<?
    if (!Auth::instance()->logged_in()){
        echo html::anchor('/register','Регистрация', array('class' => 'item'));
        echo html::anchor('/login','Вход', array('class' => 'item'));

        //echo "&nbsp;/&nbsp";

    } else if (Auth::instance()->logged_in('admin')){
	/*
	if (Request::initial()->directory() == 'User') {
	    echo html::anchor('/user/profile','Админка', array('class' => 'active'));
	} else {
	    echo html::anchor('/user/profile','Личный кабинет');
	}
	echo "&nbsp;/&nbsp";
	echo html::anchor('/logout','Выйти');
	 * 
	 */
	if (Request::initial()->directory() == 'Admin') {
        $username=Auth::instance()->get_user()->name;
        echo '<div class="left floated item">'.$username.'</div>';
	    echo html::anchor('/admin','Админка', array('class' => 'item active'));
	} else {
	    echo html::anchor('/admin','Админка', array('class' => 'item'));
	}
        echo html::anchor('/admin/main/verification','Управление пользователями', array('class' => 'item'));
	echo html::anchor('/logout','Выйти', array('class' => 'item'));
    }


    else if (Auth::instance()->logged_in('teacher')) {
        $verification=Auth::instance()->get_user()->verification;
        if (!$verification == 1) {
            throw new HTTP_Exception_403("У Вас нет права доступа.");
        }
        else {
            $username = Auth::instance()->get_user()->name;
            echo '<div class="left floated item">' . $username . '</div>';
            if (Request::initial()->directory() == 'User') {
                echo html::anchor('/personal/classes', 'Мои классы', array('class' => 'item active'));
            } else {
                echo html::anchor('/personal/classes', 'Мои классы', array('class' => 'item'));
            }
            echo html::anchor('/logout', 'Выйти', array('class' => 'item'));
        }
    }
    else if (Auth::instance()->logged_in('student')){
        $username=Auth::instance()->get_user()->name;
        echo '<div class="left floated item">'.$username.'</div>';
        if (Request::initial()->directory() == 'User') {
            echo html::anchor('/personal/my_results','Мои результаты', array('class' => 'item active'));
        } else {
            echo html::anchor('/personal/my_results','Мои результаты', array('class' => 'item'));
        }
        echo html::anchor('/logout','Выйти', array('class' => 'item'));
    }
?>