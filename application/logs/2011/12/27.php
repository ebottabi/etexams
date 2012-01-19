<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-12-27 12:39:21 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL welcomecd was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2011-12-27 12:39:21 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL welcomecd was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/fed/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/fed/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/fed/index.php(109): Kohana_Request->execute()
#3 {main}
2011-12-27 15:01:49 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL g was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2011-12-27 15:01:49 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL g was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /var/www/fed/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /var/www/fed/system/classes/kohana/request.php(1138): Kohana_Request_Client->execute(Object(Request))
#2 /var/www/fed/index.php(109): Kohana_Request->execute()
#3 {main}