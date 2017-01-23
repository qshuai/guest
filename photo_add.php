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
require dirname(__FILE__).'\includes\common-inc.php';
if (!isset($_COOKIE['username'])){
      echo "<script type='text/javascript'>alert('请先登录');location.href='login.php'</script>";
}

if ($_GET['action'] == 'add' && isset($_GET['album'])){
      $time = time();
      $imgtype=array('image/png','image/jpeg','image/gif','image/tiff');
      if(!in_array($_FILES['userfile']['type'],$imgtype)){
            echo "<script>alert('警告：只能上传png/jgp/gif/tif格式文件！');history.back();</script>";
            exit;
      }
      if($_FILES['userfile']['error']>0){
            switch($_FILES['userfile']['error']){
                  case 1:{
                        echo "<script>alert('上传文件过大！');history.back();</script>";
                        exit;
                  }
                  case 2:{
                        echo "<script>alert('上传文件过大！');history.back();</script>";
                        exit;
                  }
                  case 3:{
                        echo "<script>alert('文件只有部分上传！');history.back();</script>";
                        exit;
                  }
                  case 4:{
                        echo "<script>alert('请选择文件！');history.back();</script>";
                        exit;
                  }
            }
      }

      if(!is_dir(iconv('utf-8','gbk','photo/'))){
            mkdir(iconv('utf-8','gbk','photo/'),0777);
      }
      if(!is_dir(iconv('utf-8','gbk','photo/'.$_GET['album']))){
            mkdir(iconv('utf-8','gbk','photo/'.$_GET['album']),0777);
      }
      if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
            $dir = iconv('utf-8','gbk','photo/'.$_GET['album']);
            if ($_FILES['userfile']['type'] == 'image/png') {
                  move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . '/' . $time . '.png');
                  $name = $time.'.png';
            }
            if ($_FILES['userfile']['type'] == 'image/jpeg') {
                  move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . '/' . $time . '.jpg');
                  $name = $time.'.jpg';
            }
            if ($_FILES['userfile']['type'] == 'image/tiff') {
                  move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . '/' . $time . '.tif');
                  $name = $time.'.tif';
            }
            if ($_FILES['userfile']['type'] == 'image/gif') {
                  move_uploaded_file($_FILES['userfile']['tmp_name'], $dir . '/' . $time . '.gif');
                  $name = $time.'.gif';
            }
            //echo "<script>alert('图片上传成功!');location.href='photo_view.php';window.close()</script>";  //在没有指名具体目录的情况下，怎么可能找得到
      }else{
            echo '上传失败！';
      }
      $owner = $_COOKIE['username'];
      $album = $_GET['album'];
      $con = sqllink();
      mysqli_query($con,"INSERT INTO photo (owner,album,name,date) VALUES ('$owner','$album','$name',NOW())");

}

?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>上传图片</title>
      <script type="text/javascript" src="js/photo_album.js"></script>
<body>
      <div style="text-align: center">
            <h2>请选择图片上传</h2>
            <form  enctype="multipart/form-data" action="?action=add&album=<?php echo $_GET['album']?>" method="post">
                        <input type="file" name="userfile"><input type="submit" value="上传图片">
            </form>
      </div>
</body>
