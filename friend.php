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
	_callClose('不能添加自己为好友！');
}
session_start();
if($_GET['action']== 'add') {
      checkcode($_POST['valid'], $_SESSION['code']);
      session_destroy();
      $user_from = $_COOKIE['username'];
      $user_to = $_POST['user_to'];
      $content =addslashes( $_POST['content']);
      $con = sqllink();
      //判断数据库是否已经有添加请求，或者已经添加成功
      $check = mysqli_query($con,"SELECT id FROM friend WHERE (user_from='{$_COOKIE['username']}' AND user_to='$user_to') OR user_from='$user_to'AND user_to='{$_COOKIE['username']}' LIMIT 1");
       if (mysqli_fetch_array($check,MYSQLI_ASSOC)>=1){
             _callClose('请勿重复添加');
       }else {
             mysqli_query($con, "INSERT INTO friend(
                                        user_from,
                                        user_to,
                                        content,
                                        date
                                        ) VALUES (
                                        '$user_from',
                                        '$user_to',
                                        '$content',
                                          NOW()
                                        )") or die(mysqli_error($con));
             if (mysqli_affected_rows($con) == 1) {
                   mysqli_close($con);
                   _callClose('添加好友成功！等待对方验证');
             } else {
                   mysqli_close($con);
                   _callBack('添加失败');
             }
             exit();
       }
}






?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>加好友</title>
      <script type="text/javascript" src="js/message.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>

      <div id="message">
            <h3>加好友</h3>
            <form action="?action=add" method="post">
                  <dl>
                        <input type="hidden" name="user_to" value="<?php echo $_GET['username']?>">
                        <dd><input type="text" class="text" readonly value="TO:<?php echo $_GET['username']?>"></dd>
                        <dd><textarea class="text" name="content" cols="29" rows="10" style="font-weight: bold;">添加理由： 非常欣赏您，希望能够成为您的好朋友！</textarea></dd>
                        <dd>验证码:<input type="text" class="text" name="valid" style="width: 80px;">&nbsp<img src="code.php" name="code" id="code">&nbsp&nbsp&nbsp&nbsp<input type="submit" class="button" value="发送"></dd>
                  </dl>
            </form>
      </div>


</body>