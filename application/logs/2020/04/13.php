<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2020-04-13 07:10:08 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Controller/Index/Tests.php [ 184 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:184
2020-04-13 07:10:08 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(184): Kohana_Core::error_handler(2, 'Invalid argumen...', '/home/qualime/t...', 184, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:184