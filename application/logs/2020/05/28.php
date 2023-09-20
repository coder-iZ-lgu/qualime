<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2020-05-28 05:06:14 --- EMERGENCY: Kohana_Exception [ 0 ]: Cannot delete task model because it is not loaded. ~ MODPATH/orm/classes/Kohana/ORM.php [ 1431 ] in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:114
2020-05-28 05:06:14 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(114): Kohana_ORM->delete()
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_deletetask()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#7 {main} in /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php:114