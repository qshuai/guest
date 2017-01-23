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
define('SCRIPT',photo_view);
require dirname(__FILE__).'\includes\common-inc.php';

$con = sqllink();
$que = mysqli_query($con,"SELECT password FROM album WHERE title ='{$_GET['album']}' LIMIT 1");
$res = mysqli_fetch_array($que,MYSQLI_ASSOC);	
if ($res['password'] != '' && !isset($_POST['confirm'])){
	_call('请输入密码','photo_confirm.php?album='.$_GET['album']);
}
if ($res['password'] != '' && isset($_POST['confirm'])){
	if (sha1($_POST['confirm']) != $res['password']){
		_call('您输入的密码不正确','photo.php');
	}
}
$query = mysqli_query($con,"SELECT name FROM photo WHERE album ='{$_GET['album']}' ORDER BY date DESC ");
$all = array();
while($result = mysqli_fetch_array($query,MYSQLI_NUM)){
      $all[] = $result[0];
}
//print_r($all);

if (isset($_POST['ajax'])){
      $i = $_POST['ajax'];
}
if ($i==''|| $i>count($all)){
      $i = 0;
}
if ($i<0){
      $i = 0;
      _callBack('已经是第一张了');
}
if ($i>count($all)){
      _callClose('已经是最后一张了');
}
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="utf-8">
      <title>相册中心</title>
      <script type="text/javascript" src="js/photo_view.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>

      <div id="pic">
            <h2>图片浏览</h2>
            <div id="img" title="<?php echo $result[1]?>">
                  <img src="images.php?album=<?php echo $_GET['album']?>&select=<?php echo $all[$i]?>" alt="">
                  <div id="left"></div>
                  <div id="right"></div>
            </div>
      </div>
      <form action="" method="post">
            <input type="hidden" name="ajax" value="<?php echo $i?>">
      </form>


      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
