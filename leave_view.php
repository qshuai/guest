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
define('SCRIPT',leave_view);
require dirname(__FILE__).'\includes\common-inc.php';
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录！');</script>";
      header("Location:login.php");
}

pagingParam(9,"msg WHERE user_to = '{$_COOKIE['username']}'");
$result = mysqli_query($con,"SELECT id,user_from,content,date,status FROM msg WHERE user_to='{$_COOKIE['username']}' LIMIT $cite,$pagesize");

//如果在提交或者其他操作时，发现后面的数据把前面的数据覆盖了，那么把接受数据的变量类型设置为数组，就可以解决
if ($_GET['action'] == 'delete' && isset($_POST['ids'])){
      $str = implode(',',$_POST['ids']);
       mysqli_query($con,"DELETE FROM msg WHERE id IN ($str)");
      if (mysqli_affected_rows($con) >=1){
            echo "<script type='text/javascript'>alert('消息删除成功');</script>";
            header("Location:leave_view.php");
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>会员中心</title>
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
            <h2>消息管理中心</h2>
                  <table>
                        <form action="?action=delete" method="post">
                              <tr><td>发信人</td><td>消息内容</td><td>发送时间</td><td>状态</td><td>操作</td></tr>
                              <?php while($query = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                                    <?php if (($query['status']) == 0){
                                          $img = '<img src="images/noread.gif" title="未读"/>';
                                          $str = strsplic($query['content'],12);
                                          $read = '<strong>'.$str.'</strong>';
                                    }else{
                                          $img = '<img src="images/read.gif" title="已读"/>';
                                          $read = strsplic($query['content'],12);
                                    }?>
                                    <tr><td><?php echo $query['user_from'];?></td><td><a href="leave_detail.php?action=<?php echo $query['id'];?>"><?php echo $read;?></a></td><td><?php echo $query['date'];?></td><td><?php echo $img;?></td><td><input type="checkbox" name="ids[]" value="<?php echo $query['id']?>"></td></tr>
                              <?php }?>
                              <tr><td colspan="5"><input id="delete" type="submit" value="批量删除">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="select">全选&nbsp;&nbsp;<input type="checkbox" id="select"></label></td></tr>
                        </form>
                  </table>

            <?php
            paging(2,'留言');        //调用分页函数
            ?>

      </div>

</div>

      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>