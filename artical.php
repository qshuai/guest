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
define('SCRIPT',artical);
require dirname(__FILE__).'\includes\common-inc.php';
$n = 1;
$id = $_GET['id'];
//if (!$id){
//      _callBack('帖子不存在！');
//}
session_start();
$con = sqllink();
pagingParam(10,"artical WHERE re_id ='{$_GET['id']}'");        //设置分页参数
//WHERE 将登陆的本人信息从博友中剔除，比较符合逻辑
$res = mysqli_query($con,"SELECT username,type,title,content,date,edit_date,read_num,comment_num FROM artical WHERE id ='{$_GET['id']}'") or  die(mysqli_error($con));
$que = mysqli_fetch_array($res,MYSQLI_ASSOC);
$result = mysqli_query($con,"SELECT username,sex,face,email,url FROM user WHERE username ='{$que['username']}'");
$query = mysqli_fetch_array($result,MYSQLI_ASSOC);
$read_num = $que['read_num'];
mysqli_query($con,"UPDATE artical SET read_num=$read_num+1 WHERE id='{$_GET['id']}'");
//以下为回帖人信息
$re = mysqli_query($con,"SELECT username,title,content,date FROM artical WHERE re_id ='{$_GET['id']}' LIMIT $cite,$pagesize");




if ($_GET['action'] == 're'){
      if (!isset($_COOKIE['username'])){
            echo "<script type='text/javascript'>alert('请先登录');location.href='login.php'</script>";
      }
      checkcode($_POST['valid'],$_SESSION['code']);
      $username = $_COOKIE['username'];
      $content = $_POST['content'];
      $re_id = $_POST['re_id'];
      $title = $_POST['title'];
      $comment_num = $_POST['comment_num'];
      mysqli_query($con,"INSERT INTO artical (username,re_id,title,content,date) VALUES ('$username','$re_id','$title','$content',NOW())");
      if (mysqli_affected_rows($con) == 1){
            mysqli_query($con,"UPDATE artical SET comment_num=($comment_num+1) WHERE id='{$_GET['re_id']}'");
            echo "<script type='text/javascript'>alert('回复成功！');history.back();</script>";
      }else {
            echo "<script type='text/javascript'>alert('系统异常，请重新回复！');history.back();</script>";
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>博友交流</title>
      <script type="text/javascript" src="js/artical.js"></script>
      <script type="text/javascript" src="kindeditor/kindeditor-min.js"></script>
      <script type="text/javascript">
            var editor;
            KindEditor.ready(function(K) {
                  editor = K.create('textarea[name="content"]', {
                        allowFileManager : true
                  })
            });
      </script>

      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>
      <h2>博友中心</h2>
      <div id="artical">
            <div id="info">
                  <dl>
                        <dd class="name"><?php echo $query['username'];?></dd>
                        <dt><img src="<?php echo $query['face'];?>" alt=""></dt>
                        <!--href= "javascript:;"表示不执行任何javascript代码，和href="javascript:void(0);这样做本身没有任何作用，但是在网址栏不会显示任何后缀，比较好-->
                        <dd class="message"><a href="javascript:;" name="message"
                                               title="<?php echo $query['username'];?>">消息</a></dd>
                        <dd class="friend"><a href="javascript:;" name="friend"
                                              title="<?php echo $query['username'];?>">加好友</a></dd>
                        <dd class="leave">留言</dd>
                        <dd class="flower"><a href="javascript:;" name="flower"
                                              title="<?php echo $query['username'];?>">送花朵</a></dd>
                        <dd class="text"><a href="mailto:">邮件：<?php echo $query['email']?></a></dd>
                        <dd class="text"><a href="<?php echo $query['url']?>"
                                            target="_blank">主页：<?php echo $query['url']?></a></dd>
                  </dl>
            </div>
            <div id="detail">
                  <div id="tt">
                        <dl>
                              <dt><?php echo $que['title']?></dt>
                              <dd class="info">作者：<?php echo $que['username']?> 发表时间：<?php echo $que['date']?> <span><a
                                              href="artical_modify.php?id=<?php echo $id;?>" style="color: #f60">修改</a>&nbsp;&nbsp;阅读量：<?php echo $que['read_num']?>
                                          评论：<?php echo $que['comment_num']?>&nbsp;&nbsp;#1</span></dd>
                              <dd class="content"><?php echo $que['content']?></dd>
                              <?php if ($que['edit_date'] == '0000-00-00 00:00:00'){?>
                              <dd>发表时间：<?php echo $que['date']?></dd>
                              <?php }else{?>
                              <dd>该贴最后修改时间：<?php echo $que['edit_date']?></dd>
                              <?php }?>
                        </dl>
                  </div>

            </div>
      </div>
      <div>

            <?php while(!!$qu = mysqli_fetch_array($re,MYSQLI_ASSOC)){
            $user = mysqli_query($con,"SELECT username,sex,face,email,url FROM user WHERE username ='{$qu['username']}'");
            while($info = mysqli_fetch_array($user,MYSQLI_ASSOC)){$n++;?>
            <div id="reartical">
                  <div id="info">
                        <dl>
                              <dd class="name"><?php echo $info['username'];?></dd>
                              <dt><img src="<?php echo $info['face'];?>" alt=""></dt>
                              <!--href= "javascript:;"表示不执行任何javascript代码，和href="javascript:void(0);这样做本身没有任何作用，但是在网址栏不会显示任何后缀，比较好-->
                              <dd class="message"><a href="javascript:;" name="message"
                                                     title="<?php echo $info['username'];?>">消息</a></dd>
                              <dd class="friend"><a href="javascript:;" name="friend"
                                                    title="<?php echo $info['username'];?>">加好友</a></dd>
                              <dd class="leave">留言</dd>
                              <dd class="flower"><a href="javascript:;" name="flower"
                                                    title="<?php echo $info['username'];?>">送花朵</a></dd>
                              <dd class="text"><a href="mailto:">邮件：<?php echo $info['email']?></a></dd>
                              <dd class="text"><a href="<?php echo $info['url']?>"
                                                  target="_blank">主页：<?php echo $info['url']?></a></dd>
                        </dl>
                  </div>
                  <div id="detail">
                        <div id="tt">
                              <dl>
                                    <dt><?php echo $qu['title']?></dt>
                                    <dd class="info">作者：<?php echo $qu['username']?> 回复时间：<?php echo $qu['date']?><span>#<?php echo $n + $pagesize * ($page - 1);?></span>
                                    </dd>
                                    <dd class="content"><?php echo $qu['content']?></dd>
                                    <dd>回复时间：<?php echo $qu['date'];?></dd>
                              </dl>
                        </div>
                  </div>
            </div>
            <?php }}?>
            <div style="padding: 0 0 0 150px;">
                  <?php
                  paging(2,'回复',$id);        //调用分页函数
                  ?>
            </div>
            <div id="art">
                  <form action="?action=re&re_id=<?php echo $_GET['id']?>" method="post">
                        <input type="hidden" name="re_id" value="<?php echo $_GET['id']?>">
                        <input type="hidden" name="title" value="RE: <?php echo $que['title']?>">
                        <input type="hidden" name="comment_num" value="<?php echo $que['comment_num']?>">
                        <input type="hidden" name="id" value="<?php echo $que['id']?>">
                        <table>
                              <tr><span class="text" type="text" name="title">RE: <?php echo $que['title']?><br></span>
                              </tr>
                              <div><textarea name="content"></textarea></div>
                              <tr class="bottom">&nbsp验&nbsp证&nbsp码：<input class="text code" type="text" name="valid"
                                                                           style="width: 100px;">&nbsp<img
                                        src="code.php" name="code" alt="" id="code"><input class="button" type="submit"
                                                                                           value="回复"></tr>
                        </table>
                  </form>
            </div>

      </div>


      <script type="text/javascript">
            var ue = UE.getEditor('content');
      </script>
      <?php
      mysqli_close($con);
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
