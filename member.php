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
define('SCRIPT',member);
require dirname(__FILE__).'\includes\common-inc.php';
$getusername = $_COOKIE['username'];
if (!isset($_COOKIE['username'])){
      _callBack('请先登录！');
}
session_start();

      $con = sqllink();
      $query = mysqli_query($con,"SELECT username,sex,face,email,url,qq,reg_time,level FROM user WHERE username='$getusername'") or die(mysqli_error($con));
      $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
      $username = $result['username'];
      $sex = $result['sex'];
      $face = $result['face'];
      $email = $result['email'];
      $url = $result['url'];
      $qq = $result['qq'];
      $reg_time = $result['reg_time'];
      $level = $result['level'];
      if ($sex=='man'){
            $sex = '男';
      }else{
            $sex = '女';
      }
      if ($level == 1){
            $level = '管理员';
      }else{
            $level = '普通会员';
      }

      if ($_GET['action'] == 'submit'){

      }

      if ($_GET['action'] == 'edit'){
            checkcode($_POST['valid'],$_SESSION['code']);
            $username=$_POST['username'];
            $password=sha1($_POST['password']);
            $sex=$_POST['sex'];
            $face=$_POST['face'];
            $email=$_POST['email'];
            $qq=$_POST['qq'];
            $url=$_POST['url'];
            if ($_GET['password'] == ''){
                  mysqli_query($con,"UPDATE user SET
                                              username='$username',
                                              sex='$sex',
                                              face='$face',
                                              email='$email',
                                              qq='$qq',
                                              url='$url'
                                              WHERE username='$getusername'");
            }else{
                  mysqli_query($con,"UPDATE user SET
                                              username='$username',
                                              password='$password',
                                              sex='$sex',
                                              face='$face',
                                              email='$email',
                                              qq='$qq',
                                              url='$url'
                                              WHERE username='$getusername'");
            }
                  if (mysqli_affected_rows($con) != 1){
                        _callBack('对不起，您未修改任何数据！');
                  }
            header("Location:member.php?action=information");
      }

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>会员中心</title>
      <script type="text/javascript" src="js/modify.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>

      <div id="member">
            <div id="list">
                  <h2>导航</h2>
                  <dl>
                        <dt>账号管理</dt>
                        <dd><a href="member.php?action=information">个人信息</a></dd>
                        <dd><a href="member.php?action=modify">资料修改</a></dd>
                        <dt>其他管理</dt>
                        <dd><a href="message_view.php">短信查阅</a></dd>
						<dd><a href="leave_view.php">留言预览</a></dd>
                        <dd><a href="friend_view.php">好友设置</a></dd>
                        <dd><a href="flower_view.php">查询花朵</a></dd>
                        <dd><a href="photo.php">个人相册</a></dd>
                  </dl>
            </div>

            <div id="content">
                  <h2>会员管理中心</h2>
                  <?php if ($_GET['action'] == 'information'){?>
                        <dl class="left">
                              <dd>用户名:</dd>
                              <dd>性 别:</dd>
                              <dd>头 像:</dd>
                              <dd>电子邮件:</dd>
                              <dd>Q Q:</dd>
                              <dd>主 页:</dd>
                              <dd>注册时间:</dd>
                              <dd>身 份:</dd>
                        </dl>
                        <dl class="right">
                              <dd><?php echo $username;?></dd>
                              <dd><?php echo $sex;?></dd>
                              <dd><img src="<?php echo $face;?>" alt=""></dd>
                              <dd><?php echo $email;?></dd>
                              <dd><?php echo $qq;?></dd>
                              <dd><?php echo $url;?></dd>
                              <dd><?php echo $reg_time;?></dd>
                              <dd><?php echo $level;?></dd>
                        </dl>
                  <?php }?>
                  <?php if ($_GET['action'] == 'modify'){?>
                        <dl class="left">
                              <dd>用户名：</dd>
                              <dd>密码：</dd>
                              <dd>性别：</dd>
                              <dd>头像：</dd>
                              <dd>电子邮件：</dd>
                              <dd>QQ：</dd>
                              <dd>主页：</dd>
                              <dd>验证码：</dd>
                        </dl>
                        <dl class="right">
                              <form id="form" action="member.php?action=edit" method="post">
                                    <dd><input type="text" name="username" class="text" value="<?php echo $username;?>"></dd>
                                    <dd><input type="password" name="password" class="text"></dd>
                                    <dd>
                                          <?php if ($sex == '男'){
                                                echo '<input type="radio" name="sex" value="man" checked="checked">男<input type="radio" name="sex" value="femal">女';
                                          }
                                          if ($sex == '女'){
                                                echo '<input type="radio" name="sex" value="man">男<input type="radio" name="sex" value="femal" checked="checked">女';
                                          }
                                          ?>
                                    </dd>
                                    <dd><select name="face">
                                                <?php foreach(range(1,9) as $num) {
                                                      echo '<option value="face/m0' . $num . '.gif">face/m0' . $num . '.gif</option>';
                                                }
                                                foreach(range(10,64) as $num) {
                                                      echo '<option value="face/m' . $num . '.gif">face/m' . $num . '.gif</option>';
                                                }
                                                ?>

                                          </select></dd>
                                    <dd><input type="text" name="email" class="text" value="<?php echo $email;?>"></dd>
                                    <dd><input type="text" name="qq" class="text" value="<?php echo $qq;?>"></dd>
                                    <dd><input type="text" name="url" class="text" value="<?php echo $url;?>"></dd>
                                    <dd id="valid"><input type="text" name="valid" style="width: 100px;height: 20px;">&nbsp<img src="code.php" style="width: 75px;" name="code" alt="" id="code"></dd>
                                    <dd class="button"><input type="submit" id="submit" value="修改"></dd>
                              </form>
                        </dl>
                  <?php }?>
            </div>

      </div>

      <?php
      require ROOT_PATH.'includes/footer-inc.php';

      mysqli_close($con);
      ?>
</body>