<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2023-09-24 12:26:13 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 161 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:161
2023-09-24 12:26:13 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(161): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 161, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:161