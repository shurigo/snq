<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-04 02:08:54 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-04 02:08:54 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('pwd')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('dummy', 'pwd', false)
#2 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/Welcome.php(12): Kohana_Auth->login('dummy', 'pwd')
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_Welcome->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-04 02:09:59 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-04 02:09:59 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('pwd')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('dummy', 'pwd', false)
#2 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/Welcome.php(12): Kohana_Auth->login('dummy', 'pwd')
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_Welcome->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-04 02:49:32 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 02:49:32 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 02:50:45 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 02:50:45 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 02:51:39 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 02:51:39 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:16:02 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:16:02 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:03 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:03 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:05 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:05 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:21 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:21 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:22 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:17:22 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:18:38 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:18:38 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:21:40 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 03:21:40 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/urlrewrite.php(2): require_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(30): include('/Users/imacmb32...')
#4 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#5 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:49:01 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:49:01 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#4 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:49:58 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:49:58 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#4 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:53:04 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:53:04 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#4 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:58:23 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:58:23 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#4 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:58:40 --- EMERGENCY: Kohana_Exception [ 0 ]: Attempted to load an invalid or missing module 'auth' at 'MODPATH/auth' ~ SYSPATH/classes/Kohana/Core.php [ 579 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136
2013-11-04 23:58:40 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php(136): Kohana_Core::modules(Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(102): require('/Users/imacmb32...')
#2 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#3 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#4 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/bootstrap.php:136