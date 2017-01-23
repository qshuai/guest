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
define('SCRIPT',photo);
require dirname(__FILE__).'\includes\common-inc.php';

$con = sqllink();
$query = mysqli_query($con,"SELECT * FROM album ORDER BY date DESC");

if ($_GET['action'] == 'delete' && isset($_GET['album'])){
	$con = sqllink();
	$query = mysqli_query($con,"SELECT owner FROM album WHERE title = '{$_GET['album']}'");
	$result =mysqli_fetch_array($query,MYSQLI_ASSOC);
	if ($_COOKIE['username'] != $result['owner']){
		_call('您无权修改此相册！','photo.php');
	}
	mysqli_query($con,"DELETE FROM album WHERE title = '{$_GET['album']}' LIMIT 1");
	if (mysqli_affected_rows != 1){
		_callBack('系统异常');
	}
	mysqli_query($con,"DELETE FROM photo WHERE album = '{$_GET['album']}'");
	if (mysqli_affected_rows != 1){
		_callBack('系统异常');
	}
	if (deleteFile('photo/'.$_GET['album'])){
		_call('相册删除成功','photo.php');
	}
}


?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>相册中心</title>
      <script type="text/javascript" src="js/photo.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>
      <h2>相册中心</h2>
      <div id="photo">
            <div id="show">
                        <?php while(!!$result = mysqli_fetch_array($query,MYSQLI_ASSOC)){?>
                        <div class="block">
                              <a href="photo_view.php?album=<?php echo $result['title']?>">
                                    <dl title="作者：<?php echo $result['owner']?>

描述：<?php echo $result['brief']?>" style="background: url(photo_thumbnail.php?cover=<?php echo $result['title']?>/<?php echo $result['cover']?>) no-repeat;">
                                            <div class="background"></div>
                                            <div class="info">
                                                   <dd><?php echo $result['title']?></dd>
                                                  <dd><?php echo $result['date']?></dd>
                                            </div>
                                    </dl>
                              </a>
                                    <input class="first" type="button" value="Edit" name="<?php echo $result['title']?>"><input type="button" value="Add" name="<?php echo $result['title']?>"><input type="button" value="Delete" name="<?php echo $result['title']?>">
                        </div>
                        <?php }?>
            </div>
            <p class="link"><a href="photo_album.php">创建相册</a></p>
      </div>



      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
