<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-07 23:54:51 --- EMERGENCY: Kohana_Exception [ 0 ]: The username property does not exist in the Model_User class ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 760 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702
2013-11-07 23:54:51 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(702): Kohana_ORM->set('username', '')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(804): Kohana_ORM->__set('username', '')
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
2013-11-07 23:55:00 --- EMERGENCY: Kohana_Exception [ 0 ]: The username property does not exist in the Model_User class ~ DOCROOT/modules/orm/classes/Kohana/ORM.php [ 760 ] in /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php:702
2013-11-07 23:55:00 --- DEBUG: #0 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(702): Kohana_ORM->set('username', '')
#1 /Users/imacmb325/Development/snowqueen/src/kohana/modules/orm/classes/Kohana/ORM.php(804): Kohana_ORM->__set('username', '')
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