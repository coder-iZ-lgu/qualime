<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2023-09-22 20:50:45 --- CRITICAL: ErrorException [ 8192 ]: array_key_exists(): Using array_key_exists() on objects is deprecated. Use isset() or property_exists() instead ~ SYSPATH\classes\Kohana\Arr.php [ 104 ] in D:\soft\OSPanel\domains\tn\system\classes\Kohana\Arr.php:104
2023-09-22 20:50:45 --- DEBUG: #0 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Arr.php(104): Kohana_Core::error_handler()
#1 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Config.php(116): Kohana_Arr::path()
#2 D:\soft\OSPanel\domains\tn\application\classes\Widget.php(64): Kohana_Config->load()
#3 D:\soft\OSPanel\domains\tn\application\classes\Widget.php(37): Widget->render()
#4 D:\soft\OSPanel\domains\tn\application\classes\Controller\Index.php(15): Widget::load()
#5 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Controller.php(69): Controller_Index->before()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke()
#8 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request()
#9 D:\soft\OSPanel\domains\tn\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute()
#10 D:\soft\OSPanel\domains\tn\index.php(118): Kohana_Request->execute()
#11 {main} in D:\soft\OSPanel\domains\tn\system\classes\Kohana\Arr.php:104