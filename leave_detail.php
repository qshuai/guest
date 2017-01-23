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
define('SCRIPT',message_detail);
require dirname(__FILE__).'\includes\common-inc.php';
//if (!isset($_COOKIE['username'])){
//      _callBack('请先登录！');
//}

$con = sqllink();
$query = mysqli_query($con,"SELECT id,user_from,date,content FROM msg WHERE id = '{$_GET['action']}' LIMIT 1");
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
mysqli_query($con,"UPDATE msg SET status=1 WHERE id='{$_GET['action']}'LIMIT 1");

if ($_GET['id']){
      mysqli_query($con,"DELETE FROM msg WHERE id = '{$_GET['id']}'");
      if (mysqli_affected_rows($con) == 1){
            header("Location:leave_view.php");
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>留言详情</title>
      <script type="text/javascript" src="js/leave_detail.js"></script>
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
            <h2>留言管理中心</h2>
            <table>
                  <tr><td>发件人:</td><td><?php echo $result['user_from']?></td></tr>
                  <tr><td>发送时间:</td><td><?php echo $result['date']?></td></tr>
                  <tr><td>消息内容:</td><td><textarea name="" id="" cols="45" rows="4"><?php echo $result['content']?></textarea></td></tr>
            </table>
            <div class="button">
                  <input id="delete" name="<?php echo $result['id']?>" type="submit" value="删除"><input id="back" type="button" value="返回">
            </div>
      </div>

</div>

<?php
require ROOT_PATH.'includes/footer-inc.php';
?>
</body>