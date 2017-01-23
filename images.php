<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */
define('INC',100);            //防止恶意调用
require dirname(__FILE__).'\includes\common-inc.php';
if (isset($_GET['select']) && isset($_GET['album'])){
      imagecropper(iconv('utf-8','gbk','photo/'.$_GET['album'].'/'.$_GET['select']), 600, 600);
}
?>