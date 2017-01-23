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

$con = sqllink();
$res = mysqli_query($con,"SELECT username,type,title,content FROM artical WHERE id ='{$_GET['id']}'");
$que = mysqli_fetch_array($res,MYSQLI_ASSOC);

session_start();

if ($_COOKIE['username'] == $que['username']){
      if ($_GET['action'] == 'modify') {
            checkcode($_POST['valid'], $_SESSION['code']);
            $type = $_POST['type'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $connect = sqllink();
            mysqli_query($connect, "UPDATE artical SET title='$title',type='$type',content='$content',edit_date=NOW() WHERE id='{$_GET['id']}' LIMIT 1") or die(mysqli_error($connect));
      //      mysqli_query($connect,"UPDATE artical SET type=$type,title=$title,content=$content WHERE id='{$_GET['id']}'");
            if (mysqli_affected_rows($connect) == 1) {
                  header("location:artical.php?id={$_GET['id']}");
            } else {
                  _callBack('出现异常，请重新发表！');
            }
      }
} else{
      _callClose('您无权修改！');
}



?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>修改帖子</title>
      <script type="text/javascript" src="kindeditor/kindeditor-min.js"></script>
      <script type="text/javascript" src="js/artical_modify.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>

      <div id="art">
            <form action="?action=modify&id=<?php echo $_GET['id']?>" method="post">
                  <dl>
                  <dd><select name="type" id="select" title="<?php echo $que['type']?>">
                              <option value="经验贴">经验贴</option>
                              <option value="求助帖">求助帖</option>
                              <option value="资源帖">资源帖</option>
                              <option value="投票贴">投票贴</option>
                        </select>
                        标题： <input class="text" type="text" name="title" value="<?php echo $que['title']?>"> (* 必填字段)
                  </dd>
                  <dd><textarea name="content" rows="20"><?php echo $que['content']?></textarea></dd>
                  <dd>&nbsp验&nbsp证&nbsp码：<input class="text code" type="text" name="valid" style="width: 100px;">&nbsp<img src="code.php" name="code" alt="" id="code"><input class="button" type="submit" value="立即发表"></dd>
                  </dl>
            </form>
      </div>

      <script type="text/javascript">
            var ue = UE.getEditor('content');
      </script>

</body>