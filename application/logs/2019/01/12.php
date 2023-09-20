<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2019-01-12 02:27:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: data ~ APPPATH/classes/Controller/Index/Tests.php [ 154 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:154
2019-01-12 02:27:40 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(154): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/qualime/t...', 154, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:154
2019-01-12 02:32:40 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'taskId' ~ APPPATH/classes/Controller/Index/Tests.php [ 166 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:166
2019-01-12 02:32:40 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php(166): Kohana_Core::error_handler(2, 'Illegal string ...', '/home/qualime/t...', 166, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Index/Tests.php:166