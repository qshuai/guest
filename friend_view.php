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
$getusername = $_COOKIE['username'];
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录！');</script>";
      header("Location:login.php");
}

pagingParam(10,"friend WHERE user_to='$getusername' OR user_from='$getusername'");
$result = mysqli_query($con,"SELECT id,user_from,user_to,content,date,status FROM friend WHERE user_to='{$_COOKIE['username']}' OR user_from='{$_COOKIE['username']}' LIMIT $cite,$pagesize") or die(mysqli_error($con));

//如果在提交或者其他操作时，发现后面的数据把前面的数据覆盖了，那么把接受数据的变量类型设置为数组，就可以解决
if ($_GET['action'] == 'delete' && isset($_POST['ids'])){
      $str = implode(',',$_POST['ids']);
      mysqli_query($con,"DELETE FROM friend WHERE id IN ($str)");
      if (mysqli_affected_rows($con) >=1){
            echo "<script type='text/javascript'>alert('消息删除成功');</script>";
            header("Location:friend_view.php");
      }
}
if ($_GET['action'] == 'query'&& !empty($_GET['id'])){
      mysqli_query($con,"UPDATE friend SET status=1 WHERE id='{$_GET['id']}'");
      header("Location:friend_view.php");
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>好友管理中心</title>
      <script type="text/javascript" src="js/message_view.js"></script>
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
            <h2>好友管理中心</h2>
            <table>
                  <form action="?action=delete" method="post">
                        <tr><td>好友</td><td>请求内容</td><td>发送时间</td><td>状态</td><td>删除好友</td></tr>
                        <?php while($query = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                              <?php if (($query['status']) == 0 && $query['user_to'] == $_COOKIE['username']){
                                    $sta = '请求您通过';
                                    $user = $query['user_from'];
                              }elseif (($query['status']) == 0 && $query['user_from'] == $_COOKIE['username']){
                                    $sta = '等待对方验证';
                                    $user = $query['user_to'];
                              }elseif($query['status'] == 1 && $query['user_to'] == $_COOKIE['username']){
                                    $sta = '通过';
                                    $user = $query['user_from'];
                              }elseif($query['status'] == 1 && $query['user_from'] == $_COOKIE['username']){
                                    $sta = '通过';
                                    $user = $query['user_to'];
                              }
                              ?>
                              <tr><td><?php echo $user;?></td><td style="cursor: pointer;" title="<?php echo $query['content'];?>"><?php echo strsplic($query['content'],5);?></td><td title="<?php echo $query['id']?>"><?php echo $query['date'];?></td><td id="check" title="<?php echo $user;?>" style="cursor: pointer;"><?php echo $sta;?></td><td><input type="checkbox" name="ids[]" value="<?php echo $query['id']?>"></td></tr>
                        <?php }?>
                        <tr><td colspan="5"><input id="delete" type="submit" value="批量删除">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="select">全选&nbsp;&nbsp;<input type="checkbox" id="select"></label></td></tr>
                  </form>
            </table>

            <?php
            paging(2,'消息');        //调用分页函数
            ?>

      </div>


</div>

<?php
require ROOT_PATH.'includes/footer-inc.php';
echo $query['id'];
?>
</body>