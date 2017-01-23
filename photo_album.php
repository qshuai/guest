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

if ($_GET['action'] == 'add'){
      $album = array();
      $album['owner'] = $_COOKIE['username'];
      $album['title'] = $_POST['title'];
      $con = sqllink();
      $query = mysqli_query($con,"SELECT id FROM album WHERE title= '{$album['title']}'");
      $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
      if ($result['id']){
            _callBack('此相册已经存在，请勿重复添加');
      }

      $album['type'] = $_POST['type'];
      
      $album['dir'] = time();
      $album['brief'] = $_POST['brief'];
      $album['cover'] = $_POST['cover'];
	  if ($_POST['password'] != ''){
		$album['password'] = sha1($_POST['password']);  
		mysqli_query($con,"INSERT INTO album (owner,
                                            title,
                                            type,
                                            password,
                                            brief,
                                            cover,
                                            date
                                  ) VALUES (
                                             '{$album['owner']}',
                                             '{$album['title']}',
                                             '{$album['type']}',
                                             '{$album['password']}',
                                             '{$album['brief']}',
                                              '{$album['cover']}',
                                             NOW()
                                   )
      ")or die(mysqli_error($con));
	  }else{
		  mysqli_query($con,"INSERT INTO album (owner,
                                            title,
                                            type,
                                            brief,
                                            cover,
                                            date
                                  ) VALUES (
                                             '{$album['owner']}',
                                             '{$album['title']}',
                                             '{$album['type']}',
                                             '{$album['brief']}',
                                              '{$album['cover']}',
                                             NOW()
                                   )
      ")or die(mysqli_error($con));
	  }
      if (mysqli_affected_rows($con) == 1){
            if (is_dir(iconv('utf-8','gbk','photo/'.$album['title']))){
                  _callClose('此相册已经存在！');
            }else{
                  mkdir(iconv('utf-8','gbk','photo/'.$album['title']),0777);
            }
            _call('相册目录创建成功！','photo.php');
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
      <script type="text/javascript" src="js/photo_album.js"></script>
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
            <form action="?action=add" method="post">
                  <dl>
                        <dd>相册名称：<input type="text" name="title" class="text"></dd>
                        <dd>相册类型：<input type="radio" name="type" value="0" checked> 公开 <input type="radio" name="type" value="1"> 私密</dd>
                        <dd style="display: none" id="pas">相册密码：<input type="password" name="password" class="text"></dd>
                        <dd>相册封面：<input type="file" name="cover"></dd>
                        <dd><span class="brief">相册简介：</span><textarea name="brief"></textarea></dd>
                        <dd class="submit"><input type="submit" value="提交"></dd>
                  </dl>
            </form>
      </div>

      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
