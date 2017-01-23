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
define('SCRIPT',login);
require dirname(__FILE__).'\includes\common-inc.php';

if (isset($_COOKIE['username'])){
      _callBack('您已经登陆成功了，请勿重复操作！');
}
session_start();
if ($_GET['action'] == 'login'){
      checkcode($_POST['valid'],$_SESSION['code']);
      session_destroy();
      $con = sqllink();
      $username = $_POST['username'];
      $password = sha1($_POST['password']);
      $time = $_POST['time'];
      $query = mysqli_query($con,"SELECT username,uniqid,login_count FROM user WHERE username = '{$username}'and password='{$password}'and active=''") or die(mysqli_error($con));
      if ($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
            mysqli_query($con,"UPDATE user SET last_load_time=NOW(),last_load_ip='{$_SERVER['REMOTE_ADDR']}',login_count=login_count + 1 WHERE username='$username'");
            echo "<script type='text/javascript'>location.href='index.php'</script>";
            _setCookie($username,$result['uniqid'],$time);
            mysqli_close($con);
            }else{
            mysqli_close($con);
            echo "<script type='text/javascript'>alert('用户名密码不正确或账户未激活！');location.href='login.php';</script>";
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>会员登录</title>
      <script type="text/javascript" src="js/login.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
<?php
require ROOT_PATH.'includes/header-inc.php';
?>

<div id="login">
      <h2>会员登录</h2>
      <form action="login.php?action=login" method="post">
            <dl>
                  <dt></dt>
                  <dd>用户名:<input type="text" name="username"></dd>
                  <dd>密 码:<input type="password" name="password"></dd>
                  <dd>保 留:<input type="radio" value="0" name="time" class="radio" checked="checked">NO<input type="radio" value="1" name="time" class="radio">1天<input type="radio" value="2" name="time" class="radio">1周<input type="radio" value="3" name="time" class="radio">一月</dd>
                  <dd>验证码:<input type="text" name="valid" style="width: 120px;">&nbsp<img src="code.php" name="code" alt="" id="code"></dd>
                  <dd class="but"><input type="submit" value="登陆" class="button"><input type="button" value="注册" class="button register"></dd>
            </dl>
      </form>

</div>

<?php
require ROOT_PATH.'includes/footer-inc.php';
?>
</body>