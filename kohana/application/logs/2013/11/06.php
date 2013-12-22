<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-06 02:43:47 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: ORM_Validation_Exception::$errors ~ APPPATH/classes/Controller/User.php [ 46 ] in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:46
2013-11-06 02:43:47 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(46): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/imacmb32...', 46, Array)
#1 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#4 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#7 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#8 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#9 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php:46
2013-11-06 03:34:56 --- EMERGENCY: Kohana_Exception [ 0 ]: The username property does not exist in the Model_User class ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 760 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702
2013-11-06 03:34:56 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(702): Kohana_ORM->set('username', 'test2@test.ru')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(804): Kohana_ORM->__set('username', 'test2@test.ru')
#2 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_ORM->values(Array, Array)
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#9 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#10 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#11 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702
2013-11-06 03:36:59 --- EMERGENCY: Kohana_Exception [ 0 ]: The username property does not exist in the Model_User class ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 760 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702
2013-11-06 03:36:59 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(702): Kohana_ORM->set('username', 'test2@test.ru')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(804): Kohana_ORM->__set('username', 'test2@test.ru')
#2 /Users/imacmb325/Development/snowqueen/src/kohana/application/classes/Controller/User.php(32): Kohana_ORM->values(Array, Array)
#3 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Controller.php(84): Controller_User->action_create()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_User))
#6 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/imacmb325/Development/snowqueen/src/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/imacmb325/Development/snowqueen/src/kohana/index.php(118): Kohana_Request->execute()
#9 /Users/imacmb325/Development/snowqueen/src/bitrix/modules/main/include/urlrewrite.php(85): include_once('/Users/imacmb32...')
#10 /Users/imacmb325/Development/snowqueen/src/bitrix/urlrewrite.php(2): include_once('/Users/imacmb32...')
#11 {main} in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702