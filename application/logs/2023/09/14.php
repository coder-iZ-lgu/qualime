<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2023-09-14 12:17:15 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\index\tests\v_check.php [ 1 ] in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php:1
2023-09-14 12:17:15 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\soft\\OSPanel...', 1, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(61): include('D:\\soft\\OSPanel...')
#2 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\\soft\\OSPanel...', Array)
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#10 {main} in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php:1