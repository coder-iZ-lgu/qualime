<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-09-20 02:14:52 --- EMERGENCY: View_Exception [ 0 ]: The requested view common/messages/v_error could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 02:14:52 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(137): Kohana_View->set_filename('common/messages...')
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(30): Kohana_View->__construct('common/messages...', NULL)
#2 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(41): Kohana_View::factory('common/messages...')
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_test()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#9 {main} in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 02:56:40 --- EMERGENCY: View_Exception [ 0 ]: The requested view common/messages/v_error could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 02:56:40 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(137): Kohana_View->set_filename('common/messages...')
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(30): Kohana_View->__construct('common/messages...', NULL)
#2 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(41): Kohana_View::factory('common/messages...')
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_test()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#9 {main} in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 04:17:08 --- EMERGENCY: View_Exception [ 0 ]: The requested view common/messages/v_error could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 04:17:08 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(137): Kohana_View->set_filename('common/messages...')
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(30): Kohana_View->__construct('common/messages...', NULL)
#2 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(41): Kohana_View::factory('common/messages...')
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_test()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#9 {main} in /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php:137
2022-09-20 09:54:39 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/classes/Controller/Index/Tests.php [ 163 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:163
2022-09-20 09:54:39 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(163): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/qualime/t...', 163, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:163