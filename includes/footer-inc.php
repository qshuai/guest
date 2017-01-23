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
if(!defined('INC')){                            //防止恶意调用
      exit('1191 Access rejected!');
}
?>

<div id="footer">
      <p class="time">网页加载时间为:<?php echo round( runtime()-START_TIME,7)?></p>
      <p class="copy">版权所有，翻版必究</p>
      <p>本网页由<span>Andy多用户留言系统</span>提供 欢迎加入(c) qs_edu2009@163.com</p>
</div>
