<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */
if(!defined('INC')){                            //防止恶意调用
      exit('1191 Access rejected!');
}
if(!defined('SCRIPT')){
      exit('Script Error!');
}
?>
<link rel="shortcut icon" href="./images/icon.ico">
<link rel="stylesheet" href="styles/1/basic.css">
<!--为什么需要写echo？-->
<link rel="stylesheet" href="styles/1/<?php echo SCRIPT?>.css">