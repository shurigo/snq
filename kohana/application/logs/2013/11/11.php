<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-11 01:33:54 --- EMERGENCY: ErrorException [ 2 ]: array_keys() expects parameter 1 to be array, null given ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 414 ] in file:line
2013-11-11 01:33:54 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'array_keys() ex...', '/Users/imacmb32...', 414, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(414): array_keys(NULL)
#2 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(1269): Kohana_ORM->_validation()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#4 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(34): Kohana_ORM->create()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#11 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#12 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#13 {main} in file:line
2013-11-11 02:52:01 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '[', expecting :: (T_PAAMAYIM_NEKUDOTAYIM) ~ APPPATH/classes/Controller/User.php [ 33 ] in file:line
2013-11-11 02:52:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-11 03:22:53 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '(' ~ APPPATH/classes/Controller/User.php [ 32 ] in file:line
2013-11-11 03:22:53 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-11 03:23:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: rules ~ APPPATH/classes/Controller/User.php [ 32 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 03:23:43 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/imacmb32...', 32, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#7 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#8 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 03:24:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: _rules ~ APPPATH/classes/Controller/User.php [ 32 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 03:24:00 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/imacmb32...', 32, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#7 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#8 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 03:24:11 --- EMERGENCY: Kohana_Exception [ 0 ]: The rules property does not exist in the Model_User class ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 687 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:603
2013-11-11 03:24:11 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(603): Kohana_ORM->get('rules')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_ORM->__get('rules')
#2 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#8 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#9 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#10 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:603
2013-11-11 23:20:56 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: username ~ APPPATH/classes/Controller/User.php [ 32 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 23:20:56 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/imacmb32...', 32, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#7 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#8 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:32
2013-11-11 23:22:55 --- EMERGENCY: Database_Exception [ 1062 ]: Duplicate entry '' for key 'uniq_email' [ INSERT INTO `users` (`password`, `email`) VALUES ('', '') ] ~ DOCROOT/modules/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-11-11 23:22:55 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `us...', false, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(1324): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_ORM->create()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#9 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#10 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#11 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-11-11 23:58:39 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined function action_login() ~ APPPATH/classes/Controller/User.php [ 42 ] in file:line
2013-11-11 23:58:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line