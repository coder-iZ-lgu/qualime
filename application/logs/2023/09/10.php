<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2023-09-10 04:49:13 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: tmp ~ APPPATH\views\index\tests\v_test.php [ 39 ] in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_test.php:39
2023-09-10 04:49:13 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\views\index\tests\v_test.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\soft\\OSPanel...', 39, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(61): include('D:\\soft\\OSPanel...')
#2 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\\soft\\OSPanel...', Array)
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 D:\soft\OSPanel\domains\tn\application\views\index\v_base.php(131): Kohana_View->__toString()
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(61): include('D:\\soft\\OSPanel...')
#6 D:\soft\OSPanel\domains\tn\system\classes\Kohana\View.php(348): Kohana_View::capture('D:\\soft\\OSPanel...', Array)
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#11 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#14 {main} in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_test.php:39
2023-09-10 05:14:21 --- CRITICAL: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of ParseError given in D:\soft\OSPanel\domains\tn\system\classes\Kohana\Kohana\Exception.php:84
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(ParseError))
#1 {main}
  thrown ~ SYSPATH\classes\Kohana\Kohana\Exception.php [ 84 ] in file:line
2023-09-10 05:14:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2023-09-10 05:29:53 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 158 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:29:53 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(158): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 158, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:08 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 158 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:08 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(158): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 158, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:16 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 158 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:16 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(158): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 158, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:50 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 158 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:30:50 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(158): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 158, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:31:02 --- CRITICAL: ErrorException [ 2 ]: count(): Parameter must be an array or an object that implements Countable ~ APPPATH\classes\Controller\Index\Tests.php [ 158 ] in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:31:02 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php(158): Kohana_Core::error_handler(2, 'count(): Parame...', 'D:\\soft\\OSPanel...', 158, Array)
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(84): Controller_Index_Tests->action_check()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index_Tests))
#4 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#7 {main} in D:\soft\OSPanel\domains\tn\application\classes\Controller\Index\Tests.php:158
2023-09-10 05:32:43 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\index\tests\v_check.php [ 1 ] in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php:1
2023-09-10 05:32:43 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\soft\\OSPanel...', 1, Array)
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
2023-09-10 05:33:05 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\index\tests\v_check.php [ 1 ] in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php:1
2023-09-10 05:33:05 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\soft\\OSPanel...', 1, Array)
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
2023-09-10 05:34:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\index\tests\v_check.php [ 1 ] in D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php:1
2023-09-10 05:34:18 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\application\views\index\tests\v_check.php(1): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\soft\\OSPanel...', 1, Array)
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