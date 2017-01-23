<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */

//-----------------屏蔽低版本php
if(PHP_VERSION<5.0){
      exit('PHP version is too old. Please update your browser!');
}

//-----------------定义一个路径常量：C:\AppServ\www\PHP\workspace
define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','64668990');
define('DB_NAME','guest');





require ROOT_PATH.'includes\global_func.php';
require ROOT_PATH.'includes\mysql-inc.php';













?>