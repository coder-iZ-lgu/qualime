<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-07-26 23:26:04 --- EMERGENCY: Database_Exception [ 1451 ]: Cannot delete or update a parent row: a foreign key constraint fails (`qualime_tst`.`tests_results`, CONSTRAINT `tests_results_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`)) [ DELETE FROM `tests` WHERE `id` = '366' ] ~ MODPATH/kohana-3.3-mysqli/classes/Database/MySQLi.php [ 174 ] in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251
2022-07-26 23:26:04 --- DEBUG: #0 /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php(251): Database_MySQLi->query(4, 'DELETE FROM `te...', false, Array)
#1 /home/qualime/testy.quali.me/public_html/modules/orm/classes/Kohana/ORM.php(1439): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 /home/qualime/testy.quali.me/public_html/application/classes/Controller/Admin/Tests.php(382): Kohana_ORM->delete()
#3 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Controller.php(84): Controller_Admin_Tests->action_delete()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Tests))
#6 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/qualime/testy.quali.me/public_html/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /home/qualime/testy.quali.me/public_html/index.php(118): Kohana_Request->execute()
#9 {main} in /home/qualime/testy.quali.me/public_html/modules/database/classes/Kohana/Database/Query.php:251