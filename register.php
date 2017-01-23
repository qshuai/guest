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
define('SCRIPT',register);
session_start();
require dirname(__FILE__).'\includes\common-inc.php';
if (isset($_COOKIE['username'])){
      _callBack('您已经登陆成功了，请勿重复操作！');
}
if($_GET['action']== 'register'){
      checkcode($_POST['valid'],$_SESSION['code']);
      session_destroy();
//      $user=array();
      $uniqid = checkUniqid($_POST['uniqid'],$_SESSION['uniqid']);
      //登陆激活
      $active= sha1Uniqid();
      $username = username($_POST['username'],2,20);
      $password=password($_POST['password'],$_POST['repassword'],6);
      $tip=tip($_POST['tip'],2,8);
      $ans=ans($_POST['tip'],$_POST['ans'],2,8);
      $sex=$_POST['sex'];
      $face=$_POST['img'];
      $email=email($_POST['email']);
      $qq=qq($_POST['qq']);
      $url=url($_POST['url']);
      $ip=$_SERVER['REMOTE_ADDR'];

      //检验用户名时候已经注册
      $con= sqllink();
      $query= mysqli_query($con,"select username FROM user WHERE username ='$username'") or die('SQL错误');
      if(mysqli_fetch_array($query,MYSQLI_ASSOC)){
            _callBack('此用户名已经被注册！');
            exit();
      }

      //提交到数据库
      mysqli_query($con,"INSERT INTO user(
                                        uniqid,
                                        active,
                                        username,
                                        password,
                                        tip,
                                        ans,
                                        sex,
                                        face,
                                        email,
                                        qq,
                                        url,
                                        reg_time,
                                        last_load_time,
                                        last_load_ip
                              ) VALUES (
                                        '$uniqid',
                                        '$active',
                                        '$username',
                                        '$password',
                                        '$tip',
                                        '$ans',
                                        '$sex',
                                        '$face',
                                        '$email',
                                        '$qq',
                                        '$url',
                                          NOW(),
                                          NOW(),
                                          '$ip'
                                        )")or die(mysqli_error($con));

      echo "<script type='text/javascript'>alert('请激活您的账户！');location.href='active.php?active=$active';</script>";
      mysqli_close($con);
}
  $uniqid= $_SESSION['uniqid']= sha1Uniqid();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <title>Andy多用户留言系统-注册</title>
  <?php
  require ROOT_PATH.'includes/style-inc.php';
  ?>
  <script type="text/javascript" src="js/register.js"></script>
</head>
<body>
  <?php
  require ROOT_PATH.'includes/header-inc.php';
  ?>

  <div id="reg">
    <h2 class="reg">会员注册</h2><br>
      <form action="register.php?action=register" method="post" name="register">
            <input type="hidden" name="uniqid" value="<?php echo $uniqid ?>">
          <dl>
            <dt>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp请认真填写以下注册信息！</dt><br>
            <dd>账&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp号：<input type="text" name="username"></dd>
            <dd>密&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp码：<input type="password" name="password"></dd>
            <dd>确认密码：<input type="password" name="repassword"></dd>
            <dd>密码提示：<input type="text" name="tip"></dd>
            <dd>密码回答：<input type="text" name="ans"></dd>
            <dd>性别：<input class="sex" type="radio" name="sex" value="man" checked="checked">男<input class="sex" type="radio" name="sex" value="femal">女</dd>
            <dd class="face"><input type="hidden" name="img" value="face/m01.gif"><img src="face/m01.gif" alt="头像选择" id="faceimg"></dd>
            <dd>电子邮箱：<input type="email" name="email"></dd>
            <dd>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspQQ：<input type="text" name="qq"></dd>
            <dd>主页地址：<input type="text" name="url" value="http://"></dd>
            <dd>&nbsp验&nbsp证&nbsp码：<input type="text" name="valid" style="width: 100px;">&nbsp<img src="code.php" name="code" alt="" id="code"></dd>
            <dd class="submit"><input type="submit" value="注册"></dd>
          </dl>
      </form>
  </div>

  <?php
  require ROOT_PATH.'includes/footer-inc.php';
  ?>
</body>