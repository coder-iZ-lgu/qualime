<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2019-12-27 09:49:55 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:49:55 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:49:56 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:49:56 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:49:56 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:49:56 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:09 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:09 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:09 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:09 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:10 --- EMERGENCY: Database_Exception [ 1364 ]: Field 'number' doesn't have a default value [ INSERT INTO `options` (`task_id`, `text`, `is_right`) VALUES (1769, '1', '1') ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2019-12-27 09:51:10 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(2, 'INSERT INTO `op...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1418): Kohana_ORM->create(NULL)
#3 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Ajax.php(46): Kohana_ORM->save()
#4 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Ajax->action_task()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Ajax))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#10 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251