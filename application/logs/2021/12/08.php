<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2021-12-08 01:12:14 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1272 ] in /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php:1359
2021-12-08 01:12:14 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1359): Kohana_ORM->check(NULL)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Model/Auth/User.php(94): Kohana_ORM->update()
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/Auth/ORM.php(270): Model_Auth_User->complete_login()
#3 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/Auth/ORM.php(107): Kohana_Auth_ORM->complete_login(Object(Model_User))
#4 /home/qualime/testy.quali.me/public_html/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_ORM->_login('editor2', 'QyqjHPbZ', false)
#5 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Auth.php(24): Kohana_Auth->login('editor2', 'QyqjHPbZ', false)
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Auth->action_login()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#9 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#12 {main} in /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php:1359