<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-01-18 04:33:03 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Ajax.php [ 228 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:228
2022-01-18 04:33:03 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(228): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/qualime/t...', 228, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_addclass()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:228
2022-01-18 04:33:09 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Ajax.php [ 228 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:228
2022-01-18 04:33:09 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(228): Kohana_Core::error_handler(8, 'Trying to get p...', '/home/qualime/t...', 228, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_addclass()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:228