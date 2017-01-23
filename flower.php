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
define('SCRIPT',message);
require dirname(__FILE__).'\includes\common-inc.php';

if (!isset($_COOKIE['username'])){
     _callClose('请先登录！');
}
if ($_GET['username'] == $_COOKIE['username']){
	_callClose('不能给自己送花朵！');
}
session_start();
if($_GET['action']== 'send') {
      checkcode($_POST['valid'], $_SESSION['code']);
      session_destroy();
      $user_from = $_COOKIE['username'];
      $user_to = $_POST['user_to'];
      $num = $_POST['num'];
      $content =addslashes( $_POST['content']);
      $con = sqllink();

      mysqli_query($con,"INSERT INTO flower(
                                        user_from,
                                        user_to,
                                        num,
                                        content,
                                        date
                                        ) VALUES (
                                        '$user_from',
                                        '$user_to',
                                        '$num',
                                        '$content',
                                          NOW()
                                        )")or die(mysqli_error($con));
      if (mysqli_affected_rows($con) == 1){
            mysqli_close($con);
            _callClose('发送成功！');
      }else{
            mysqli_close($con);
            _callBack('发送失败');
      }
      exit();
}






?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>送花朵</title>
      <script type="text/javascript" src="js/message.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>

      <div id="message">
            <h3>送花朵</h3>
            <form action="?action=send" method="post">
                  <dl>
                        <input type="hidden" name="user_to" value="<?php echo $_GET['username']?>">
                        <dd><input type="text" class="text" readonly value="For: <?php echo $_GET['username']?>"></dd>
                        <dd>送 <input type="number" class="text" name="num" style="width: 100px;" value="88">  朵花</dd>
                        <dd><textarea class="text" name="content" cols="26" rows="5" style="font-weight: bold;">非常喜欢您，送给你一些花朵吧！</textarea></dd>
                        <dd>验证码:<input type="text" class="text" name="valid" style="width: 80px;">&nbsp<img src="code.php" name="code" id="code">&nbsp&nbsp&nbsp&nbsp<input type="submit" class="button" value="发送"></dd>
                  </dl>
            </form>
      </div>


</body>