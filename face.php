<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:
 */
define('INC',100);            //防止恶意调用
define('SCRIPT',face);
require dirname(__FILE__).'\includes\common-inc.php';
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>Andy多用户留言系统-注册</title>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
      <script type="text/javascript" src="js/faceselect.js"></script>
</head>
<body>
      <div id="face">
            <h3>头像选择</h3>
            <dl>
                  <?php foreach (range(1,9) as $num) {?>
                         <dd><img src="face/m0<?php echo $num?>.gif" alt="face/m0<?php echo $num?>.gif" title="头像<?php echo $num?>"></dd>
                  <?php }?>

            </dl>
            <dl>
                  <?php foreach (range(10,63) as $num) {?>
                        <dd><img src="face/m<?php echo $num?>.gif" alt="face/m<?php echo $num?>.gif" title="头像<?php echo $num?>"></dd>
                  <?php }?>

            </dl>
      </div>
</body>