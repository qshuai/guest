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
define('SCRIPT',artical_publish);
require dirname(__FILE__).'\includes\common-inc.php';
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录');location.href='login.php'</script>";
}
session_start();

if ($_GET['action'] == 'send'){
      checkcode($_POST['valid'],$_SESSION['code']);
      $username = $_COOKIE['username'];
      $type = $_POST['type'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      $con = sqllink();
      mysqli_query($con,"INSERT INTO artical (username,type,title,content,date) VALUES ('$username','$type','$title','$content',NOW())");
      if (mysqli_affected_rows($con) == 1){
            $id = mysqli_insert_id($con);
//            echo "<script type='text/javascript'>alert('帖子发布成功');location.href='artical.php?id='.$id.''</script>";
            header("location:artical.php?id=$id");
      }else{
            _callBack('出现异常，请重新发表！');
      }
}

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>发表帖子</title>
<!--      <script type="text/javascript" src="ueditor/ueditor.config.js"></script>-->
<!--      <script type="text/javascript" src="ueditor/ueditor.all.min.js"></script>-->
      <script type="text/javascript" src="kindeditor/kindeditor-min.js"></script>
      <script type="text/javascript">
            window.onload = function(){
                  var code=document.getElementById('code');
                  code.onclick = function(){
                        this.src='code.php?tm='+Math.random();
                  };
            };
            var editor;
            KindEditor.ready(function(K) {
                  editor = K.create('textarea[name="content"]', {
                        allowFileManager : true
                  });
            });
      </script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>

      <div id="art">
            <h2>发表帖子</h2>
            <form action="?action=send" method="post">
                  <dl>
                  <dd><select name="type" id="">
                              <option value="经验贴">经验贴</option>
                              <option value="求助帖">求助帖</option>
                              <option value="资源帖">资源帖</option>
                              <option value="投票贴">投票贴</option>
                        </select>
                        标题： <input class="text" type="text" name="title"> (* 必填字段)
                  </dd>
                  <dd><textarea name="content" rows="20"></textarea></dd>
                  <dd>&nbsp验&nbsp证&nbsp码：<input class="text code" type="text" name="valid" style="width: 100px;">&nbsp<img src="code.php" name="code" alt="" id="code"><input class="button" type="submit" value="立即发表"></dd>
                  </dl>
            </form>
      </div>

      <script type="text/javascript">
            var ue = UE.getEditor('content');
      </script>

</body>