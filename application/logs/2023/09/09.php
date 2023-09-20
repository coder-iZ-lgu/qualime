<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2023-09-09 17:52:11 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:52:11 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '72be0565856faeb...', false)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(24): Kohana_Auth->login('redactor-tst', 'QyqjHPbZ', false)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:53:00 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:53:00 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '3dd30b8413cd68a...', false)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(24): Kohana_Auth->login('redactor-tst', 'dsfsdf', false)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:55:46 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 [ INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES  ] ~ MODPATH\kohana-3.3-mysqli\classes\Database\MySQLi.php [ 174 ] in D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php:251
2023-09-09 17:55:46 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `ro...', false, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1574): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(73): Kohana_ORM->add('roles', NULL)
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_register()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#9 {main} in D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php:251
2023-09-09 17:56:46 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:56:46 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '900d8039f68e3dc...', false)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(24): Kohana_Auth->login('redactor-tst', 'ewffwef', false)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:56:56 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 17:56:56 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), 'bac2dbc8e25c959...', false)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(24): Kohana_Auth->login('redactor-tst', 'dfgdgf', false)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:48:22 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\classes\Controller\Index\Auth.php [ 20 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php:20
2023-09-09 19:48:22 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(20): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\soft\\OSPanel...', 20, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php:20
2023-09-09 19:49:07 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in D:\soft\OSPanel\domains\tn\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2023-09-09 19:49:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2023-09-09 19:52:15 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:52:15 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), 'ab820949913fece...', true)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(32): Kohana_Auth->login('redactor-tst', 'dssf', true)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:52:38 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:52:38 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '5147209da39b7ef...', true)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(32): Kohana_Auth->login('redactor-tst', 'd', true)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:53:34 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:53:34 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '5147209da39b7ef...', true)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(32): Kohana_Auth->login('redactor-tst', 'd', true)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:53:42 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 19:53:42 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '4fce371f31e29f8...', true)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(32): Kohana_Auth->login('redactor-tst', 'sad', true)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 20:09:09 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ MODPATH\orm\classes\Kohana\ORM.php [ 1472 ] in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 20:09:09 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1472): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 1472, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\Auth\ORM.php(86): Kohana_ORM->has('roles', Object(Model_Role))
#2 D:\soft\OSPanel\domains\tn\modules\auth\classes\Kohana\Auth.php(92): Kohana_Auth_ORM->_login(Object(Model_User), '72be0565856faeb...', NULL)
#3 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(33): Kohana_Auth->login('redactor-tst', 'QyqjHPbZ', NULL)
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_login()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php:1472
2023-09-09 20:12:35 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 [ INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES  ] ~ MODPATH\kohana-3.3-mysqli\classes\Database\MySQLi.php [ 174 ] in D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php:251
2023-09-09 20:12:35 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `ro...', false, Array)
#1 D:\soft\OSPanel\domains\tn\modules\orm\classes\Kohana\ORM.php(1469): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Auth.php(91): Kohana_ORM->add('roles', NULL)
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Auth->action_register()
#4 [internal function]: Kohana_Controller->execute()
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Auth))
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#9 {main} in D:\soft\OSPanel\domains\tn\modules\database\classes\Kohana\Database\Query.php:251