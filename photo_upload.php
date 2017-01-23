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
define('SCRIPT',blog);
require dirname(__FILE__).'\includes\common-inc.php';


?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>照片上传</title>
      <?php
             require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
             require ROOT_PATH.'includes/header-inc.php';
      ?>
      <h2>相片上传</h2>
      <div id="upload">



      </div>



      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
