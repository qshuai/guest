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
define('SCRIPT',message_view);
require dirname(__FILE__).'\includes\common-inc.php';
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录！');</script>";
      header("Location:login.php");
}
$sum = 0;
pagingParam(10,"message WHERE user_to='{$_COOKIE['username']}'");
$result = mysqli_query($con,"SELECT id,user_from,content,num,date FROM flower WHERE user_to='{$_COOKIE['username']}' LIMIT $cite,$pagesize");

//如果在提交或者其他操作时，发现后面的数据把前面的数据覆盖了，那么把接受数据的变量类型设置为数组，就可以解决
if ($_GET['action'] == 'delete' && isset($_POST['ids'])){
      $str = implode(',',$_POST['ids']);
      mysqli_query($con,"DELETE FROM message WHERE id IN ($str)");
      if (mysqli_affected_rows($con) >=1){
            echo "<script type='text/javascript'>alert('消息删除成功');</script>";
            header("Location:message_view.php");
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>花朵管理中心</title>
      <script type="text/javascript" src="js/blog.js"></script>
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
            <h2>消息管理中心</h2>
            <table>
                  <form action="?action=delete" method="post">
                        <tr><td>赠送</td><td>祝福消息</td><td>发送时间</td><td>数量</td><td>回赠</td></tr>
                        <?php while($query = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                              <tr><td><?php echo $query['user_from'];?></td><td style="cursor: pointer;" title="<?php echo $query['content'];?>"><?php echo strsplic($query['content'],8);?></td><td><?php echo $query['date'];?></td><td><?php echo $query['num'];?></td><td style="padding: 1px;"><input title="<?php echo $query['user_from']?>" type="button" name="ids[]" value="回赠" style="margin: 5px;"></td></tr>
                        <?php $sum += $query['num'];}?>
                        <tr><td colspan="5">总共收到：<?php echo $sum;?> 个花朵！</td></tr>
                  </form>
            </table>

            <?php
            paging(2,'消息');        //调用分页函数
            ?>
      </div>

</div>

<?php
require ROOT_PATH.'includes/footer-inc.php';
?>
</body>