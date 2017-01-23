<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */

setcookie('username','',time()-1);
setcookie('uniqid','',time()-1);
header("Location:index.php");



?>