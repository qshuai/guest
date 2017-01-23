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
define('SCRIPT',active);
require dirname(__FILE__).'\includes\common-inc.php';

if (isset($_GET['action']) && $_GET['action'] == 'ok' && isset($_GET['active'])){
      $active = $_GET['active'];
      $con= sqllink();
      $query= mysqli_query($con,"select active FROM user WHERE active ='$active'");
      if(mysqli_fetch_array($query,MYSQLI_ASSOC)){
            mysqli_query($con,"UPDATE user SET active=NULL WHERE active ='$active'LIMIT 1");
            if (mysqli_affected_rows($con) == 1){
                  mysqli_close($con);
                  echo "<script type='text/javascript'>alert('账户激活成功！');location.href = 'login.php'</script>";
            }
      }
      else{
            echo '非法操作！';
      }
}

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>激活页面</title>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
<?php
require ROOT_PATH.'includes/header-inc.php';
?>
<div id="active">
      <h2>会员激活</h2>
      <p>邮件验证系统，请点击以下链接完成激活过程，成为正式会员！</p>
      <p><a href="active.php?action=ok&amp;active=<?php echo $_GET['active']?>"><?php echo 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]?>active.php?action=ok&amp;active=<?php echo $_GET['active']?></a></p>
</div>


<?php
require ROOT_PATH.'includes/footer-inc.php';
?>
</body>
