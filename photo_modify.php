<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */
//本页功能创建相册

define('INC',100);            //防止恶意调用
define('SCRIPT',photo_album);
require dirname(__FILE__).'\includes\common-inc.php';
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录');location.href='login.php'</script>";
}

if (isset($_GET['album'])){
	$con = sqllink();
	$que = mysqli_query($con,"SELECT * FROM album WHERE title= '{$_GET['album']}'");
      $res = mysqli_fetch_array($que,MYSQLI_ASSOC);
	if ($res['owner'] != $_COOKIE['username']){
		_call('对不起，您无权修改此相册信息！','photo.php');
	}
}
if ($_GET['action'] == 'modify'){
	$con = sqllink();
	$album = array();
	$album['title'] = $_POST['title'];
	$album['type'] = $_POST['type'];
	$album['brief'] = $_POST['brief'];
	if ($_POST['cover'] == ''){
		$album['cover'] = $res['cover'];
	}else{
		$album['cover'] = $_POST['cover'];
	}
	
	if ($_POST['password'] != ''){
		$album['password'] = sha1($_POST['password']);
		mysqli_query($con,"UPDATE album SET title = '{$album['title']}',type = '{$album['type']}',password = '{$album['password']}',brief = '{$album['brief']}',cover = '{$album['cover']}' WHERE title = '{$_GET['album']}' LIMIT 1") or die(mysqli_error($con));
	}else{
		mysqli_query($con,"UPDATE album SET title = '{$album['title']}',type = '{$album['type']}',brief = '{$album['brief']}',cover = '{$album['cover']}' WHERE title = '{$_GET['album']}' LIMIT 1");
	}
	if (mysqli_affected_rows($con) == 1){
		_call('相册修改成功！','photo.php');
	}else{
		_callClose('系统异常，请重新创建');
	}
}

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>创建相册</title>
      <script type="text/javascript" src="js/photo_modify.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>
      <div id="album">
            <h2>创建相册</h2>
            <form action="?action=modify&album=<?php echo $_GET['album']?>" method="post">
                  <dl>
                        <dt></dt>
                        <dd>相册名称：<input type="text" name="title" class="text" value=<?php echo $res['title']?>></dd>
                        <?php if($res['type'] == 0){?>
                              <dd>相册类型：<input type="radio" name="type" value="0" id="type1" checked> <label for="type1">公开</label> 
											<input type="radio" name="type" value="1"  id="type2"> <label for="type2">私密</label></dd>
                        <?php }?>
                        <?php if($res['type'] == 1){?>
                              <dd>相册类型：<input type="radio" name="type" value="0" id="type"> <label for="type">公开</label> 
											<input type="radio" name="type" value="1"  id="type" checked> <label for="type">私密</label></dd>
                        <?php }?>
                        <dd id="password" style="display: none">相册密码：<input type="password" name="password" class="text"</dd>
                        <dd>相册封面：<input type="file" name="cover" <?php echo $res['cover']?>></dd>
                        <dd><span class="brief">相册简介：</span><textarea name="brief"><?php echo $res['brief']?></textarea></dd>
                        <dd class="submit"><input type="submit" value="提交"></dd>
                  </dl>
            </form>
      </div>

      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
