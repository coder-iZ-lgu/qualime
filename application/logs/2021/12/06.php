<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2021-12-06 12:47:58 --- EMERGENCY: Database_Exception [ 1265 ]: Data truncated for column 'name' at row 1 [ INSERT INTO `classes` (`name`, `teacher_id`) VALUES ('7ц', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 12:47:58 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `cl...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(232): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_addclass()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 12:48:05 --- EMERGENCY: Database_Exception [ 1265 ]: Data truncated for column 'name' at row 1 [ INSERT INTO `classes` (`name`, `teacher_id`) VALUES ('7ц', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 12:48:05 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `cl...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(232): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_addclass()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 12:48:25 --- EMERGENCY: Database_Exception [ 1265 ]: Data truncated for column 'name' at row 1 [ INSERT INTO `classes` (`name`, `teacher_id`) VALUES ('7ц', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 12:48:25 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `cl...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(232): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_addclass()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2021-12-06 13:04:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/index/v_base.php [ 114 ] in /home/qualime/testy.quali.me/public_html/application/views/index/v_base.php:114
2021-12-06 13:04:47 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/application/views/index/v_base.php(114): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/qualime/t...', 114, Array)
#1 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(61): include('/home/qualime/t...')
#2 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/View.php(348): Kohana_View::capture('/home/qualime/t...', Array)
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Personal))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/application/views/index/v_base.php:114